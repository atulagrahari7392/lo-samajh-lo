<?php

namespace App\Http\Controllers;

use App\Models\LeaderboardEntry;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category', 'all');
        $entries = LeaderboardEntry::with('user')
            ->orderBy('score', 'desc')
            ->take(50)->get();
        return view('leaderboard.index', compact('entries', 'category'));
    }
}
