<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CurrentAffairsController;
use App\Http\Controllers\Admin\NoteController;
use App\Http\Controllers\Admin\LiveClassController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\NotificationController;

/*
|--------------------------------------------------------------------------
| Admin Panel Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/analytics', [DashboardController::class, 'analytics'])->name('analytics');

    // Students Management
    Route::resource('students', StudentController::class);
    Route::post('/students/{student}/toggle-status', [StudentController::class, 'toggleStatus'])->name('students.toggle');

    // Teachers Management
    Route::resource('teachers', TeacherController::class);
    Route::post('/teachers/{teacher}/verify', [TeacherController::class, 'verify'])->name('teachers.verify');

    // Courses Management
    Route::resource('courses', CourseController::class);
    Route::post('/courses/{course}/publish', [CourseController::class, 'publish'])->name('courses.publish');

    // Tests Management
    Route::resource('tests', TestController::class);
    Route::resource('tests.questions', \App\Http\Controllers\Admin\QuestionController::class);

    // Notes
    Route::resource('notes', NoteController::class);

    // Live Classes
    Route::resource('live-classes', LiveClassController::class);

    // Blog
    Route::resource('blog', BlogController::class);

    // Current Affairs
    Route::resource('current-affairs', CurrentAffairsController::class);

    // Payments & Orders
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::get('/payments/{payment}', [PaymentController::class, 'show'])->name('payments.show');
    Route::post('/payments/{payment}/refund', [PaymentController::class, 'refund'])->name('payments.refund');

    // Coupons
    Route::resource('coupons', CouponController::class);

    // Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');

    // Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
    Route::post('/notifications/send', [NotificationController::class, 'send'])->name('notifications.send');
});
