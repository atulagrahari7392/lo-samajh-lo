<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Test;
use App\Models\TestAttempt;
use App\Models\LiveClass;

class DashboardController extends Controller
{
    public function index()
    {
        $user    = auth()->user();
        $courses = Course::where('teacher_id', $user->id)->latest()->take(5)->get();
        $stats   = [
            'total_courses'   => Course::where('teacher_id', $user->id)->count(),
            'total_students'  => Enrollment::whereHas('course', fn($q) => $q->where('teacher_id', $user->id))->distinct('user_id')->count(),
            'total_tests'     => Test::where('created_by', $user->id)->count(),
            'upcoming_lives'  => LiveClass::where('teacher_id', $user->id)->where('status','scheduled')->count(),
        ];
        return view('teacher.dashboard', compact('user', 'courses', 'stats'));
    }
}
