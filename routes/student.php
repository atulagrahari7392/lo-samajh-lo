<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\CourseController;
use App\Http\Controllers\Student\TestController;
use App\Http\Controllers\Student\NoteController;
use App\Http\Controllers\Student\ProfileController;
use App\Http\Controllers\Student\AiTutorController;
use App\Http\Controllers\Student\LiveClassController;
use App\Http\Controllers\Student\LeaderboardController;
use App\Http\Controllers\Student\AchievementController;
use App\Http\Controllers\Student\NotificationController;

/*
|--------------------------------------------------------------------------
| Student Panel Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('student')->name('student.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // My Courses
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/{enrollment}/learn', [CourseController::class, 'learn'])->name('courses.learn');
    Route::get('/courses/{enrollment}/lesson/{lesson}', [CourseController::class, 'lesson'])->name('courses.lesson');
    Route::post('/courses/{enrollment}/progress', [CourseController::class, 'saveProgress'])->name('courses.progress');

    // Tests & Attempts
    Route::get('/tests', [TestController::class, 'index'])->name('tests.index');
    Route::get('/tests/{test}/start', [TestController::class, 'start'])->name('tests.start');
    Route::get('/tests/{test}/attempt/{attempt}', [TestController::class, 'attempt'])->name('tests.attempt');
    Route::post('/tests/{test}/submit', [TestController::class, 'submit'])->name('tests.submit');
    Route::get('/tests/{test}/result/{attempt}', [TestController::class, 'result'])->name('tests.result');
    Route::get('/tests/history', [TestController::class, 'history'])->name('tests.history');

    // Notes & Downloads
    Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
    Route::get('/notes/{note}/download', [NoteController::class, 'download'])->name('notes.download');

    // Live Classes
    Route::get('/live-classes', [LiveClassController::class, 'index'])->name('live-classes.index');
    Route::get('/live-classes/{class}/join', [LiveClassController::class, 'join'])->name('live-classes.join');

    // AI Tutor
    Route::get('/ai-tutor', [AiTutorController::class, 'index'])->name('ai-tutor');
    Route::post('/ai-tutor/ask', [AiTutorController::class, 'ask'])->name('ai-tutor.ask');

    // Leaderboard
    Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard');

    // Achievements & Badges
    Route::get('/achievements', [AchievementController::class, 'index'])->name('achievements');

    // Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
    Route::post('/notifications/{id}/read', [NotificationController::class, 'markRead'])->name('notifications.read');

    // Profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar');
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

    // Study Plan
    Route::get('/study-plan', [DashboardController::class, 'studyPlan'])->name('study-plan');

    // Bookmarks
    Route::get('/bookmarks', [DashboardController::class, 'bookmarks'])->name('bookmarks');

    // Referral
    Route::get('/referral', [DashboardController::class, 'referral'])->name('referral');
});
