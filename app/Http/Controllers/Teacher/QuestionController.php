<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index($testId) { $questions = Question::where('test_id',$testId)->paginate(30); return view('teacher.questions.index', compact('questions','testId')); }
    public function create($testId) { return view('teacher.questions.create', compact('testId')); }
    public function store(Request $r, $testId) { $d=$r->validate(['question_text'=>'required','type'=>'required','marks'=>'required|numeric']); $d['test_id']=$testId; $d['created_by']=auth()->id(); Question::create($d); return redirect()->route('teacher.tests.questions.index',$testId)->with('success','Question added!'); }
    public function show($testId, Question $question) { return view('teacher.questions.show', compact('question','testId')); }
    public function edit($testId, Question $question) { return view('teacher.questions.edit', compact('question','testId')); }
    public function update(Request $r, $testId, Question $question) { $question->update($r->except('_token','_method')); return redirect()->route('teacher.tests.questions.index',$testId)->with('success','Updated!'); }
    public function destroy($testId, Question $question) { $question->delete(); return redirect()->route('teacher.tests.questions.index',$testId)->with('success','Deleted.'); }
}
