<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AIController extends Controller
{
    /**
     * Show the AI Tutor interface.
     */
    public function tutor()
    {
        return view('student.ai.tutor');
    }

    /**
     * Show the AI Doubt Solver interface.
     */
    public function doubtSolver()
    {
        return view('student.ai.doubt-solver');
    }

    /**
     * Show the AI Study Planner interface.
     */
    public function studyPlanner()
    {
        return view('student.ai.study-planner');
    }

    /**
     * Show the AI Performance Coach interface.
     */
    public function performanceCoach()
    {
        return view('student.ai.performance-coach');
    }
}
