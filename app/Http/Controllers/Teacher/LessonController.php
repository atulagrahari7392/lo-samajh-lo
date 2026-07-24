<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index($courseId) { $lessons = Lesson::where('course_id',$courseId)->paginate(20); return view('teacher.lessons.index', compact('lessons','courseId')); }
    public function create($courseId) { return view('teacher.lessons.create', compact('courseId')); }
    public function store(Request $r, $courseId) { $d=$r->validate(['title'=>'required','type'=>'required','order'=>'required|numeric']); $d['course_id']=$courseId; $d['teacher_id']=auth()->id(); Lesson::create($d); return redirect()->route('teacher.courses.lessons.index',$courseId)->with('success','Lesson added!'); }
    public function show($courseId, Lesson $lesson) { return view('teacher.lessons.show', compact('lesson','courseId')); }
    public function edit($courseId, Lesson $lesson) { return view('teacher.lessons.edit', compact('lesson','courseId')); }
    public function update(Request $r, $courseId, Lesson $lesson) { $lesson->update($r->except('_token','_method')); return redirect()->route('teacher.courses.lessons.index',$courseId)->with('success','Updated!'); }
    public function destroy($courseId, Lesson $lesson) { $lesson->delete(); return redirect()->route('teacher.courses.lessons.index',$courseId)->with('success','Deleted.'); }
}
