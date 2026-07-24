<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query      = Course::where('is_published', true)->with('teacher');
        $categories = CourseCategory::where('is_active', true)->get();

        if ($request->cat) {
            $query->whereHas('category', fn($q) => $q->where('slug', $request->cat));
        }
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', "%{$request->search}%")
                  ->orWhere('description', 'like', "%{$request->search}%");
            });
        }
        if ($request->type) {
            $query->where('exam_type', $request->type);
        }
        if ($request->price === 'free') {
            $query->where('is_free', true);
        }

        $courses = $query->latest()->paginate(12);
        return view('courses.index', compact('courses', 'categories'));
    }

    public function show($slug)
    {
        $course = Course::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $isEnrolled = false;
        if (auth()->check()) {
            $isEnrolled = auth()->user()->enrollments()->where('course_id', $course->id)->where('is_active', true)->exists();
        }
        $relatedCourses = Course::where('category_id', $course->category_id)
            ->where('id', '!=', $course->id)->where('is_published', true)->take(4)->get();
        return view('courses.show', compact('course', 'isEnrolled', 'relatedCourses'));
    }
}
