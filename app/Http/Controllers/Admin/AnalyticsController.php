<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Certificate;
use App\Models\Discussion;

class AnalyticsController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalCourses = Course::count();
        
        // Use class_exists check or optional model counts if they don't exist yet for robust implementation
        $totalCertificates = class_exists(Certificate::class) ? Certificate::count() : 0;
        $totalDiscussions = class_exists(Discussion::class) ? Discussion::count() : 0;
        
        $recentEnrollments = class_exists(Enrollment::class) ? 
            Enrollment::with(['user', 'course'])->latest()->take(5)->get() : 
            collect([]);

        return view('admin.analytics.index', compact(
            'totalUsers',
            'totalCourses',
            'totalCertificates',
            'totalDiscussions',
            'recentEnrollments'
        ));
    }
}
