<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'student');
        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%")
                  ->orWhere('email', 'like', "%{$request->search}%")
                  ->orWhere('phone', 'like', "%{$request->search}%");
            });
        }
        if ($request->status === 'active')   $query->where('is_active', true);
        if ($request->status === 'inactive') $query->where('is_active', false);
        $students = $query->latest()->paginate(20);
        return view('admin.students.index', compact('students'));
    }

    public function show(User $student)
    {
        $student->load('enrollments.course', 'testAttempts.test');
        return view('admin.students.show', compact('student'));
    }

    public function toggleStatus(User $student)
    {
        $student->update(['is_active' => !$student->is_active]);
        return back()->with('success', 'Student status updated.');
    }

    public function destroy(User $student)
    {
        $student->delete();
        return redirect()->route('admin.students.index')->with('success', 'Student deleted.');
    }

    public function create() { return view('admin.students.create'); }
    public function store(Request $request) { return redirect()->route('admin.students.index'); }
    public function edit(User $student) { return view('admin.students.edit', compact('student')); }
    public function update(Request $request, User $student) { return redirect()->route('admin.students.index'); }
}
