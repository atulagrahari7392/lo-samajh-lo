<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index() { return response()->json(['data' => Course::where('is_published', true)->with('teacher', 'category')->latest()->take(20)->get()]); }
    public function show($id) { $c = Course::where('id', $id)->where('is_published', true)->firstOrFail(); return response()->json(['data' => $c]); }
    public function updateProgress(Request $r, $id) { return response()->json(['message' => 'Progress saved']); }
}
