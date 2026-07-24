<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\UserAchievement;

class AchievementController extends Controller
{
    public function index()
    {
        $all      = Achievement::all();
        $earned   = UserAchievement::where('user_id', auth()->id())->pluck('achievement_id')->toArray();
        return view('student.achievements.index', compact('all', 'earned'));
    }
}
