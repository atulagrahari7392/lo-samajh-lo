@extends('layouts.app')
@section('title', 'Forgot Password — Lo Samajh Lo')
@section('content')
<div class="min-h-[85vh] flex items-center justify-center bg-slate-50 dark:bg-slate-950 px-4 py-12">
  <div class="max-w-md w-full bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 shadow-xl p-8 space-y-6">
    <div class="text-center">
      <span class="text-4xl block mb-3">🔐</span>
      <h1 class="text-2xl font-black text-slate-900 dark:text-white">Forgot Password?</h1>
      <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">Enter your email and we'll send a reset link</p>
    </div>
    @if(session('status'))<div class="p-3 bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-800 rounded-xl text-emerald-700 dark:text-emerald-300 text-sm">{{ session('status') }}</div>@endif
    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
      @csrf
      <div>
        <label class="block text-xs font-bold text-slate-600 dark:text-slate-300 mb-1">Email Address</label>
        <input type="email" name="email" required class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-white text-sm outline-none focus:ring-2 focus:ring-sky-400" placeholder="your@email.com">
      </div>
      <button type="submit" class="w-full py-3.5 rounded-2xl btn-grad text-white font-bold shadow">Send Reset Link 📧</button>
    </form>
    <div class="text-center text-sm">
      <a href="{{ route('login') }}" class="text-sky-500 font-bold hover:underline">← Back to Login</a>
    </div>
  </div>
</div>
@endsection
