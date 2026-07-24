<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\TestAttempt;

class TestController extends Controller
{
    public function index() { return response()->json(['data' => Test::where('is_published', true)->latest()->take(20)->get()]); }
    public function show($id) { $t = Test::where('id', $id)->where('is_published', true)->with('questions.options')->firstOrFail(); return response()->json(['data' => $t]); }
    public function startAttempt(Request $r, $id) { $a = TestAttempt::create(['user_id' => $r->user()->id, 'test_id' => $id, 'started_at' => now(), 'status' => 'in_progress']); return response()->json(['attempt_id' => $a->id]); }
    public function submitAttempt(Request $r, $id) { $a = TestAttempt::findOrFail($id); $a->update(['submitted_at' => now(), 'status' => 'submitted']); return response()->json(['result' => $a]); }
    public function attemptResults($id) { $a = TestAttempt::with('answers')->findOrFail($id); return response()->json(['data' => $a]); }
}
