<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function show() { return view('auth.forgot-password'); }
    public function send(Request $request) {
        $request->validate(['email' => 'required|email']);
        return back()->with('status', 'If that email exists, a reset link has been sent.');
    }
    public function showReset($token) { return view('auth.reset-password', compact('token')); }
    public function reset(Request $request) {
        $request->validate(['email'=>'required|email','password'=>'required|min:8|confirmed','token'=>'required']);
        return redirect()->route('login')->with('success', 'Password reset successful. Please login.');
    }
}
