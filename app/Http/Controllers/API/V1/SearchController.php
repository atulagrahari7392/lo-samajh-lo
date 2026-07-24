<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Test;

class SearchController extends Controller
{
    public function index(Request $r)
    {
        $q = $r->get('q', '');
        if (!$q) return response()->json(['courses' => [], 'tests' => []]);
        $courses = Course::where('title', 'like', "%{$q}%")->where('is_published', true)->take(10)->get(['id','title','slug','price','is_free']);
        $tests   = Test::where('title', 'like', "%{$q}%")->where('is_published', true)->take(10)->get(['id','title','slug','total_questions','is_free']);
        return response()->json(['courses' => $courses, 'tests' => $tests]);
    }
}
