<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index() { $tests = Test::latest()->paginate(15); return view('admin.tests.index', compact('tests')); }
    public function create() { return view('admin.tests.create'); }
    public function store(Request $request) { return redirect()->route('admin.tests.index')->with('success', 'Test created!'); }
    public function show(Test $test) { $test->load('questions'); return view('admin.tests.show', compact('test')); }
    public function edit(Test $test) { return view('admin.tests.edit', compact('test')); }
    public function update(Request $request, Test $test) { $test->update($request->except('_token','_method')); return redirect()->route('admin.tests.index')->with('success','Test updated!'); }
    public function destroy(Test $test) { $test->delete(); return redirect()->route('admin.tests.index')->with('success','Test deleted.'); }
}
