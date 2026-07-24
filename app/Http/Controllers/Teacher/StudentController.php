<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;

class StudentController extends Controller
{
    public function index() { $enrollments = Enrollment::whereHas('course', fn($q)=>$q->where('teacher_id',auth()->id()))->with('user','course')->paginate(20); return view('teacher.students.index', compact('enrollments')); }
    public function show($id) { $student = \App\Models\User::findOrFail($id); return view('teacher.students.show', compact('student')); }
}
