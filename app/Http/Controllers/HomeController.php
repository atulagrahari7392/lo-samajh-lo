<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Test;
use App\Models\CurrentAffair;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredCourses = Course::where('is_published', true)->take(6)->get();
        $recentBlogs     = Blog::where('is_published', true)->latest('published_at')->take(3)->get();
        $latestAffairs   = CurrentAffair::latest('published_at')->take(5)->get();
        $stats = [
            'students' => '5,000,000+',
            'courses'  => '2,500+',
            'tests'    => '50,000+',
            'teachers' => '500+',
        ];
        return view('home.index', compact('featuredCourses', 'recentBlogs', 'latestAffairs', 'stats'));
    }

    public function about()
    {
        return view('home.about');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string|max:2000',
        ]);
        return redirect()->route('contact')->with('success', 'Your message has been sent! We will reply within 24 hours.');
    }

    public function search(Request $request)
    {
        $q       = $request->get('search', '');
        $courses = $q ? Course::where('title', 'like', "%{$q}%")->where('is_published', true)->take(10)->get() : collect();
        $tests   = $q ? Test::where('title', 'like', "%{$q}%")->where('is_published', true)->take(10)->get() : collect();
        return view('search.index', compact('q', 'courses', 'tests'));
    }
}
