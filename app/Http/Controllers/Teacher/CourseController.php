<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index() { $courses = Course::where('teacher_id', auth()->id())->latest()->paginate(10); return view('teacher.courses.index', compact('courses')); }
    public function create() { $categories = CourseCategory::where('is_active',true)->get(); return view('teacher.courses.create', compact('categories')); }
    public function store(Request $request) {
        $data = $request->validate(['title'=>'required','description'=>'nullable','category_id'=>'required','price'=>'required|numeric','exam_type'=>'required']);
        $data['slug'] = \Str::slug($data['title']); $data['teacher_id'] = auth()->id(); $data['is_free'] = $data['price']==0;
        Course::create($data); return redirect()->route('teacher.courses.index')->with('success','Course created!');
    }
    public function show(Course $course) { $course->load('subjects.lessons'); return view('teacher.courses.show', compact('course')); }
    public function edit(Course $course) { $categories = CourseCategory::where('is_active',true)->get(); return view('teacher.courses.edit', compact('course','categories')); }
    public function update(Request $request, Course $course) { $course->update($request->except('_token','_method')); return redirect()->route('teacher.courses.index')->with('success','Course updated!'); }
    public function destroy(Course $course) { $course->delete(); return redirect()->route('teacher.courses.index')->with('success','Course deleted.'); }
    public function publish(Course $course) { $course->update(['is_published'=>!$course->is_published]); return back()->with('success','Publish status changed.'); }
}
