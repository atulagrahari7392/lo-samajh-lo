<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\Lesson;
use App\Models\LessonProgress;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::where('user_id', auth()->id())
            ->where('is_active', true)
            ->with('course.teacher')
            ->latest()->paginate(9);
        return view('student.courses.index', compact('enrollments'));
    }

    public function learn($enrollmentId)
    {
        $enrollment = Enrollment::where('id', $enrollmentId)->where('user_id', auth()->id())->firstOrFail();
        $course     = $enrollment->course()->with('subjects.lessons')->firstOrFail();
        $progress   = LessonProgress::where('user_id', auth()->id())->where('course_id', $course->id)->get()->keyBy('lesson_id');
        return view('student.courses.learn', compact('enrollment', 'course', 'progress'));
    }

    public function lesson($enrollmentId, $lessonId)
    {
        $enrollment = Enrollment::where('id', $enrollmentId)->where('user_id', auth()->id())->firstOrFail();
        $lesson     = Lesson::findOrFail($lessonId);
        return view('student.courses.lesson', compact('enrollment', 'lesson'));
    }

    public function saveProgress(Request $request, $enrollmentId)
    {
        $enrollment = Enrollment::where('id', $enrollmentId)->where('user_id', auth()->id())->firstOrFail();
        LessonProgress::updateOrCreate(
            ['user_id' => auth()->id(), 'lesson_id' => $request->lesson_id],
            ['course_id' => $enrollment->course_id, 'watched_seconds' => $request->seconds, 'completed' => $request->completed]
        );
        return response()->json(['success' => true]);
    }
}
