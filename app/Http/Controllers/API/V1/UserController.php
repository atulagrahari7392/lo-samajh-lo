<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\TestAttempt;

class UserController extends Controller
{
    public function profile(Request $r) { return response()->json(['data' => $r->user()]); }
    public function updateProfile(Request $r) { $r->user()->update($r->only(['name','phone'])); return response()->json(['message' => 'Profile updated', 'data' => $r->user()]); }
    public function myCourses(Request $r) { return response()->json(['data' => Enrollment::where('user_id', $r->user()->id)->with('course')->get()]); }
    public function myTests(Request $r) { return response()->json(['data' => TestAttempt::where('user_id', $r->user()->id)->with('test')->latest()->take(20)->get()]); }
}
