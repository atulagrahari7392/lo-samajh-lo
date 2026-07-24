<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() { $posts = Blog::latest()->paginate(15); return view('admin.blog.index', compact('posts')); }
    public function create() { return view('admin.blog.create'); }
    public function store(Request $request) { return redirect()->route('admin.blog.index')->with('success','Blog post created!'); }
    public function show(Blog $blog) { return view('admin.blog.show', compact('blog')); }
    public function edit(Blog $blog) { return view('admin.blog.edit', compact('blog')); }
    public function update(Request $request, Blog $blog) { $blog->update($request->except('_token','_method')); return redirect()->route('admin.blog.index')->with('success','Post updated!'); }
    public function destroy(Blog $blog) { $blog->delete(); return redirect()->route('admin.blog.index')->with('success','Post deleted.'); }
}
