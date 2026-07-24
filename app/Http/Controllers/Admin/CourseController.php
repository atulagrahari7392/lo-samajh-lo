<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('teacher', 'category')->latest()->paginate(15);
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $categories = CourseCategory::where('is_active', true)->get();
        return view('admin.courses.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'          => 'required|string|max:255',
            'description'    => 'nullable|string',
            'category_id'    => 'required|exists:course_categories,id',
            'price'          => 'required|numeric|min:0',
            'exam_type'      => 'required|in:graduation,pg,competitive',
        ]);
        $data['slug']       = \Str::slug($data['title']);
        $data['teacher_id'] = auth()->id();
        $data['is_free']    = $data['price'] == 0;
        Course::create($data);
        return redirect()->route('admin.courses.index')->with('success', 'Course created!');
    }

    public function show(Course $course)
    {
        $course->load('teacher', 'category', 'subjects.lessons');
        return view('admin.courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $categories = CourseCategory::where('is_active', true)->get();
        return view('admin.courses.edit', compact('course', 'categories'));
    }

    public function update(Request $request, Course $course)
    {
        $course->update($request->except('_token', '_method'));
        return redirect()->route('admin.courses.index')->with('success', 'Course updated!');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.courses.index')->with('success', 'Course deleted.');
    }

    public function publish(Course $course)
    {
        $course->update(['is_published' => !$course->is_published]);
        return back()->with('success', 'Course publish status changed.');
    }
}
