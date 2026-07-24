<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index($testId) { $questions = Question::where('test_id',$testId)->paginate(30); return view('admin.questions.index', compact('questions', 'testId')); }
    public function create($testId) { return view('admin.questions.create', compact('testId')); }
    public function store(Request $request, $testId) { return redirect()->route('admin.tests.questions.index', $testId)->with('success','Question added!'); }
    public function show($testId, Question $question) { return view('admin.questions.show', compact('question','testId')); }
    public function edit($testId, Question $question) { return view('admin.questions.edit', compact('question','testId')); }
    public function update(Request $request, $testId, Question $question) { return redirect()->route('admin.tests.questions.index', $testId)->with('success','Question updated!'); }
    public function destroy($testId, Question $question) { $question->delete(); return redirect()->route('admin.tests.questions.index', $testId)->with('success','Question deleted.'); }
}
