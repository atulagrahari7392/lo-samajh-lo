<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnalyticsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        $courseProgress = $user->enrollments()->with('course')->get()->map(function ($enrollment) {
            // Mock data for completion percentage. In reality, calculate based on completed lessons/modules.
            $enrollment->completion_percentage = rand(0, 100); 
            return $enrollment;
        });

        $totalCourses = $courseProgress->count();
        $completedCourses = $courseProgress->where('completion_percentage', 100)->count();
        $certificatesEarned = $user->certificates()->count() ?? 0;

        return view('student.analytics.index', compact(
            'totalCourses',
            'completedCourses',
            'certificatesEarned',
            'courseProgress'
        ));
    }
}
