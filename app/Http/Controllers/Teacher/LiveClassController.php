<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\LiveClass;
use Illuminate\Http\Request;

class LiveClassController extends Controller
{
    public function index() { $classes = LiveClass::where('teacher_id',auth()->id())->latest()->paginate(10); return view('teacher.live-classes.index', compact('classes')); }
    public function create() { return view('teacher.live-classes.create'); }
    public function store(Request $r) { $d=$r->validate(['title'=>'required','scheduled_at'=>'required','duration_minutes'=>'required|numeric','platform'=>'required']); $d['teacher_id']=auth()->id(); $d['status']='scheduled'; LiveClass::create($d); return redirect()->route('teacher.live-classes.index')->with('success','Class scheduled!'); }
    public function show(LiveClass $liveClass) { return view('teacher.live-classes.show', compact('liveClass')); }
    public function edit(LiveClass $liveClass) { return view('teacher.live-classes.edit', compact('liveClass')); }
    public function update(Request $r, LiveClass $liveClass) { $liveClass->update($r->except('_token','_method')); return redirect()->route('teacher.live-classes.index')->with('success','Updated!'); }
    public function destroy(LiveClass $liveClass) { $liveClass->delete(); return redirect()->route('teacher.live-classes.index')->with('success','Deleted.'); }
    public function attendance(LiveClass $liveClass) { return view('teacher.live-classes.attendance', compact('liveClass')); }
}
