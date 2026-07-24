@extends('layouts.app')
@section('title', 'Current Affairs — Lo Samajh Lo')
@section('content')
<div class="bg-slate-50 dark:bg-slate-950 min-h-screen">
  <div class="bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-black text-slate-900 dark:text-white">Current Affairs / <span class="grad-text">समसामयिक</span></h1>
      <p class="text-slate-500 dark:text-slate-400 mt-1">Daily, Monthly & Yearly current affairs for competitive exams</p>
    </div>
  </div>
  <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-4">
    @forelse($affairs ?? [] as $affair)
    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm p-5 hover:shadow-md transition-all">
      <div class="flex items-start gap-4">
        <span class="text-2xl flex-shrink-0">📰</span>
        <div class="flex-1">
          <div class="flex items-center gap-2 mb-1">
            <span class="px-2 py-0.5 bg-sky-50 dark:bg-sky-900/20 text-sky-600 dark:text-sky-400 text-[10px] font-bold rounded-full border border-sky-200 dark:border-sky-800">{{ strtoupper($affair->category ?? 'NEWS') }}</span>
            <span class="text-[10px] text-slate-400">{{ $affair->published_at?->format('d M Y') ?? '' }}</span>
          </div>
          <h3 class="font-bold text-slate-900 dark:text-white">{{ $affair->title }}</h3>
          <p class="text-sm text-slate-500 dark:text-slate-400 mt-1 line-clamp-2">{{ $affair->content ?? '' }}</p>
        </div>
        <a href="{{ route('current-affairs.show', $affair->id) }}" class="flex-shrink-0 text-xs text-sky-500 font-bold hover:underline">Read →</a>
      </div>
    </div>
    @empty
    <div class="text-center py-20">
      <span class="text-6xl block mb-4">🗞️</span>
      <h3 class="text-xl font-bold text-slate-700 dark:text-slate-300">Current affairs coming soon!</h3>
      <p class="text-slate-500 mt-2">Daily updates will be published here. Check back tomorrow!</p>
    </div>
    @endforelse
  </div>
</div>
@endsection
