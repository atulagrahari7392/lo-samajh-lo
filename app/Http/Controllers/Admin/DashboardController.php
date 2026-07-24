<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Course;
use App\Models\Test;
use App\Models\Enrollment;
use App\Models\Payment;
use App\Models\TestAttempt;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_students'  => User::where('role', 'student')->count(),
            'total_teachers'  => User::where('role', 'teacher')->count(),
            'total_courses'   => Course::where('is_published', true)->count(),
            'total_tests'     => Test::where('is_published', true)->count(),
            'total_revenue'   => Payment::where('status', 'success')->sum('amount') / 100,
            'active_enrollments' => Enrollment::where('is_active', true)->count(),
            'today_signups'   => User::whereDate('created_at', today())->count(),
            'attempts_today'  => TestAttempt::whereDate('created_at', today())->count(),
        ];
        $recentStudents = User::where('role', 'student')->latest()->take(8)->get();
        $recentPayments = Payment::with('user')->where('status', 'success')->latest()->take(5)->get();
        return view('admin.dashboard', compact('stats', 'recentStudents', 'recentPayments'));
    }

    public function analytics()
    {
        return view('admin.analytics.index');
    }
}
