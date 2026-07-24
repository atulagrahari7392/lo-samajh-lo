<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CurrentAffairsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\LiveClassController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\GoogleAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes — Lo Samajh Lo Platform
|--------------------------------------------------------------------------
*/

// ══════════════════════════════════
// PUBLIC ROUTES
// ══════════════════════════════════
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'sendContact'])->name('contact.send');
Route::get('/search', [SearchController::class, 'index'])->name('search');

// Courses (Public)
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{slug}', [CourseController::class, 'show'])->name('courses.show');

// Tests (Public listing, attempt requires auth)
Route::get('/tests', [\App\Http\Controllers\TestController::class, 'index'])->name('tests.index');
Route::get('/tests/{slug}', [\App\Http\Controllers\TestController::class, 'show'])->name('tests.show');

// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Current Affairs
Route::get('/current-affairs', [CurrentAffairsController::class, 'index'])->name('current-affairs.index');
Route::get('/current-affairs/{id}', [CurrentAffairsController::class, 'show'])->name('current-affairs.show');

// Notes (Public listing)
Route::get('/notes', [\App\Http\Controllers\NoteController::class, 'index'])->name('notes.index');
Route::get('/notes/{id}', [\App\Http\Controllers\NoteController::class, 'show'])->name('notes.show');

// Leaderboard
Route::get('/leaderboard', [\App\Http\Controllers\LeaderboardController::class, 'index'])->name('leaderboard.index');

// Live Classes (Public schedule)
Route::get('/live-classes', [LiveClassController::class, 'index'])->name('live-classes.index');

// Discussions
Route::get('/discussions', [DiscussionController::class, 'index'])->name('discussions.index');

// ══════════════════════════════════
// AUTHENTICATION ROUTES
// ══════════════════════════════════
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    Route::get('/forgot-password', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'show'])->name('password.request');
    Route::post('/forgot-password', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'send'])->name('password.email');

    // Google Auth
    Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('auth.google');
    Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Language Switcher
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'hi'])) {
        session()->put('locale', $locale);
        app()->setLocale($locale);
    }
    return redirect()->back();
})->name('lang.switch');

// Password Reset
Route::get('/reset-password/{token}', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'showReset'])->name('password.reset');
Route::post('/reset-password', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'reset'])->name('password.update');

// ══════════════════════════════════
// ROLE-BASED PANEL ROUTES
// ══════════════════════════════════
require __DIR__.'/student.php';
require __DIR__.'/teacher.php';
require __DIR__.'/admin.php';
