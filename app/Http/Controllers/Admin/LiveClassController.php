<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LiveClass;
use Illuminate\Http\Request;

class LiveClassController extends Controller
{
    public function index() { $classes = LiveClass::latest()->paginate(15); return view('admin.live-classes.index', compact('classes')); }
    public function create() { return view('admin.live-classes.create'); }
    public function store(Request $request) { return redirect()->route('admin.live-classes.index')->with('success','Class scheduled!'); }
    public function show(LiveClass $liveClass) { return view('admin.live-classes.show', compact('liveClass')); }
    public function edit(LiveClass $liveClass) { return view('admin.live-classes.edit', compact('liveClass')); }
    public function update(Request $request, LiveClass $liveClass) { $liveClass->update($request->except('_token','_method')); return redirect()->route('admin.live-classes.index')->with('success','Class updated!'); }
    public function destroy(LiveClass $liveClass) { $liveClass->delete(); return redirect()->route('admin.live-classes.index')->with('success','Class deleted.'); }
}
