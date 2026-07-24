<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\DashboardController;
use App\Http\Controllers\Teacher\CourseController;
use App\Http\Controllers\Teacher\TestController;
use App\Http\Controllers\Teacher\LiveClassController;
use App\Http\Controllers\Teacher\NoteController;
use App\Http\Controllers\Teacher\StudentController;
use App\Http\Controllers\Teacher\EarningsController;

/*
|--------------------------------------------------------------------------
| Teacher Panel Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:teacher,admin'])->prefix('teacher')->name('teacher.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // My Courses
    Route::resource('courses', CourseController::class);
    Route::post('/courses/{course}/publish', [CourseController::class, 'publish'])->name('courses.publish');
    Route::resource('courses.lessons', \App\Http\Controllers\Teacher\LessonController::class);

    // Test Series
    Route::resource('tests', TestController::class);
    Route::resource('tests.questions', \App\Http\Controllers\Teacher\QuestionController::class);

    // Live Classes
    Route::resource('live-classes', LiveClassController::class);
    Route::get('/live-classes/{class}/attendance', [LiveClassController::class, 'attendance'])->name('live-classes.attendance');

    // Notes & PDF Materials
    Route::resource('notes', NoteController::class);

    // My Students
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');

    // Earnings & Payments
    Route::get('/earnings', [EarningsController::class, 'index'])->name('earnings');

    // Profile
    Route::get('/profile', [\App\Http\Controllers\Teacher\ProfileController::class, 'show'])->name('profile');
    Route::post('/profile', [\App\Http\Controllers\Teacher\ProfileController::class, 'update'])->name('profile.update');
});
