<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Blog;
use App\Models\CurrentAffair;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');

        $courses = Course::where('title', 'LIKE', "%{$query}%")
                         ->orWhere('description', 'LIKE', "%{$query}%")
                         ->get();

        $blogs = Blog::published()
                     ->where('title', 'LIKE', "%{$query}%")
                     ->orWhere('content', 'LIKE', "%{$query}%")
                     ->get();

        return view('search.results', compact('courses', 'blogs', 'query'));
    }

    public function suggest(Request $request)
    {
        $query = $request->input('q');

        $courses = Course::where('title', 'LIKE', "%{$query}%")->limit(5)->get(['title', 'slug']);
        
        return response()->json($courses);
    }
}
