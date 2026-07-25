<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\TestAttempt;
use App\Models\Notification;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user          = auth()->user();
        $enrollments   = Enrollment::where('user_id', $user->id)->where('is_active', true)->with('course')->latest()->take(5)->get();
        $recentTests   = TestAttempt::where('user_id', $user->id)->with('test')->latest()->take(5)->get();
        $notifications = Notification::where('user_id', $user->id)->whereNull('read_at')->latest()->take(5)->get();

        $stats = [
            'enrolled_courses'  => Enrollment::where('user_id', $user->id)->where('is_active', true)->count(),
            'tests_attempted'   => TestAttempt::where('user_id', $user->id)->where('status', 'submitted')->count(),
            'avg_score'         => round(TestAttempt::where('user_id', $user->id)->where('status', 'submitted')->avg('percentage') ?? 0, 1),
            'streak_days'       => 7,
        ];

        return view('student.dashboard', compact('user', 'enrollments', 'recentTests', 'notifications', 'stats'));
    }

    public function studyPlan()
    {
        return view('student.study-plan');
    }

    public function bookmarks()
    {
        return view('student.bookmarks');
    }

    public function referral()
    {
        return view('student.referral');
    }
}
