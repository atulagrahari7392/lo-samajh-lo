<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        // Blog model may not exist yet - use empty collection safely
        try {
            $posts = \App\Models\Blog::where('is_published', true)->latest('published_at')->paginate(9);
        } catch (\Exception $e) {
            $posts = collect();
        }
        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        try {
            $post = \App\Models\Blog::where('slug', $slug)->where('is_published', true)->firstOrFail();
        } catch (\Exception $e) {
            abort(404);
        }
        return view('blog.show', compact('post'));
    }
}
