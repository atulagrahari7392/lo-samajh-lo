<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index() { $teachers = User::where('role','teacher')->latest()->paginate(15); return view('admin.teachers.index', compact('teachers')); }
    public function create() { return view('admin.teachers.create'); }
    public function store(Request $request) { return redirect()->route('admin.teachers.index')->with('success','Teacher added!'); }
    public function show(User $teacher) { return view('admin.teachers.show', compact('teacher')); }
    public function edit(User $teacher) { return view('admin.teachers.edit', compact('teacher')); }
    public function update(Request $request, User $teacher) { $teacher->update($request->except('_token','_method')); return redirect()->route('admin.teachers.index')->with('success','Teacher updated!'); }
    public function destroy(User $teacher) { $teacher->delete(); return redirect()->route('admin.teachers.index')->with('success','Teacher removed.'); }
    public function verify(User $teacher) { optional($teacher->teacherProfile)->update(['is_verified' => true]); return back()->with('success','Teacher verified!'); }
}
