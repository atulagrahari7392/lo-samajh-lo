<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\LeaderboardEntry;

class LeaderboardController extends Controller
{
    public function index()
    {
        $entries = LeaderboardEntry::with('user')->orderBy('score', 'desc')->take(50)->get();
        return view('student.leaderboard.index', compact('entries'));
    }
}
