<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\CourseController;
use App\Http\Controllers\API\V1\TestController;
use App\Http\Controllers\API\V1\UserController;
use App\Http\Controllers\API\V1\NoteController;
use App\Http\Controllers\API\V1\LiveClassController;
use App\Http\Controllers\API\V1\NotificationController;
use App\Http\Controllers\API\V1\SearchController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::prefix('v1')->group(function () {
    
    // Auth Routes
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/send-otp', [AuthController::class, 'sendOtp']);
    Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);
    
    // Public Endpoints
    Route::get('/courses', [CourseController::class, 'index']);
    Route::get('/courses/{id}', [CourseController::class, 'show']);
    
    Route::get('/tests', [TestController::class, 'index']);
    Route::get('/tests/{id}', [TestController::class, 'show']);
    
    Route::get('/notes', [NoteController::class, 'index']);
    Route::get('/live-classes', [LiveClassController::class, 'index']);
    Route::get('/search', [SearchController::class, 'index']);
    
    // Protected Endpoints
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        
        // User Profile
        Route::get('/user', [UserController::class, 'profile']);
        Route::put('/user', [UserController::class, 'updateProfile']);
        
        // My Enrollments
        Route::get('/my-courses', [UserController::class, 'myCourses']);
        Route::get('/my-tests', [UserController::class, 'myTests']);
        
        // Test Engine
        Route::post('/tests/{id}/start', [TestController::class, 'startAttempt']);
        Route::post('/tests/attempts/{attempt_id}/submit', [TestController::class, 'submitAttempt']);
        Route::get('/tests/attempts/{attempt_id}/results', [TestController::class, 'attemptResults']);
        
        // Course Progress
        Route::post('/lessons/{id}/progress', [CourseController::class, 'updateProgress']);
        
        // Notifications
        Route::get('/notifications', [NotificationController::class, 'index']);
        Route::post('/notifications/mark-read', [NotificationController::class, 'markAllAsRead']);
    });
});
