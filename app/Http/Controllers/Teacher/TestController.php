<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index() { $tests = Test::where('created_by',auth()->id())->latest()->paginate(10); return view('teacher.tests.index', compact('tests')); }
    public function create() { return view('teacher.tests.create'); }
    public function store(Request $r) { $d=$r->validate(['title'=>'required','description'=>'nullable','total_marks'=>'required|numeric','duration_minutes'=>'required|numeric','type'=>'required']); $d['slug']=\Str::slug($d['title']); $d['created_by']=auth()->id(); Test::create($d); return redirect()->route('teacher.tests.index')->with('success','Test created!'); }
    public function show(Test $test) { $test->load('questions'); return view('teacher.tests.show', compact('test')); }
    public function edit(Test $test) { return view('teacher.tests.edit', compact('test')); }
    public function update(Request $r, Test $test) { $test->update($r->except('_token','_method')); return redirect()->route('teacher.tests.index')->with('success','Test updated!'); }
    public function destroy(Test $test) { $test->delete(); return redirect()->route('teacher.tests.index')->with('success','Test deleted.'); }
}
