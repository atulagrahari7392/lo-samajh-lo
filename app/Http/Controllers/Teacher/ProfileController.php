<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show() { $user = auth()->user()->load('teacherProfile'); return view('teacher.profile.show', compact('user')); }
    public function update(Request $r) { auth()->user()->update($r->only(['name','email','phone'])); return back()->with('success','Profile updated!'); }
}
