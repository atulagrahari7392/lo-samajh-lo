<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\TestAttempt;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(Request $request)
    {
        $query = Test::where('is_published', true);
        if ($request->type) {
            $query->where('type', $request->type);
        }
        if ($request->exam) {
            $query->where('exam_type', $request->exam);
        }
        if ($request->free === '1') {
            $query->where('is_free', true);
        }
        $tests = $query->latest()->paginate(12);
        return view('tests.index', compact('tests'));
    }

    public function show($slug)
    {
        $test = Test::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $previousAttempts = [];
        if (auth()->check()) {
            $previousAttempts = TestAttempt::where('user_id', auth()->id())
                ->where('test_id', $test->id)
                ->latest()->take(5)->get();
        }
        return view('tests.show', compact('test', 'previousAttempts'));
    }
}
