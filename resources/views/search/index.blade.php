@extends('layouts.app')
@section('title', 'Search — Lo Samajh Lo')
@section('content')
<div class="bg-slate-50 dark:bg-slate-950 min-h-screen py-10">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-black text-slate-900 dark:text-white mb-6">
      @if($q) Search Results for "<span class="text-sky-500">{{ $q }}</span>" @else Search @endif
    </h1>

    <form method="GET" action="{{ route('search') }}" class="mb-8">
      <div class="flex gap-3">
        <input type="text" name="search" value="{{ $q }}" placeholder="Search courses, tests, topics..." class="flex-1 px-5 py-3 rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-slate-800 dark:text-white text-sm outline-none focus:ring-2 focus:ring-sky-400 shadow-sm">
        <button type="submit" class="px-6 py-3 rounded-2xl btn-grad text-white font-bold shadow">🔍 Search</button>
      </div>
    </form>

    @if($q)
      <!-- Courses Results -->
      @if($courses->count())
      <div class="mb-8">
        <h2 class="font-bold text-slate-900 dark:text-white mb-4">📚 Courses ({{ $courses->count() }})</h2>
        <div class="space-y-3">
          @foreach($courses as $course)
          <a href="{{ route('courses.show', $course->slug) }}" class="flex items-center gap-4 bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-4 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all">
            <div class="w-12 h-12 rounded-xl bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-xl">📚</div>
            <div class="flex-1"><p class="font-semibold text-slate-900 dark:text-white">{{ $course->title }}</p><p class="text-xs text-slate-500 mt-0.5">{{ optional($course->category)->name }} · {{ $course->is_free?'FREE':'₹'.number_format($course->price) }}</p></div>
            <span class="text-sky-500 text-sm">→</span>
          </a>
          @endforeach
        </div>
      </div>
      @endif

      <!-- Test Results -->
      @if($tests->count())
      <div class="mb-8">
        <h2 class="font-bold text-slate-900 dark:text-white mb-4">📝 Tests ({{ $tests->count() }})</h2>
        <div class="space-y-3">
          @foreach($tests as $test)
          <a href="{{ route('tests.show', $test->slug) }}" class="flex items-center gap-4 bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-4 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all">
            <div class="w-12 h-12 rounded-xl bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-xl">📝</div>
            <div class="flex-1"><p class="font-semibold text-slate-900 dark:text-white">{{ $test->title }}</p><p class="text-xs text-slate-500 mt-0.5">{{ $test->total_questions }} Questions · {{ $test->duration_minutes }} mins</p></div>
            <span class="text-sky-500 text-sm">→</span>
          </a>
          @endforeach
        </div>
      </div>
      @endif

      @if($courses->count() === 0 && $tests->count() === 0)
      <div class="text-center py-16">
        <span class="text-6xl block mb-4">🔍</span>
        <h3 class="text-xl font-bold text-slate-700 dark:text-slate-300">No results for "{{ $q }}"</h3>
        <p class="text-slate-500 mt-2">Try different keywords or browse all courses</p>
        <a href="{{ route('courses.index') }}" class="mt-4 inline-block px-6 py-2 rounded-xl btn-grad text-white font-bold text-sm">Browse Courses</a>
      </div>
      @endif
    @else
      <div class="text-center py-16">
        <span class="text-6xl block mb-4">🔍</span>
        <p class="text-slate-500">Enter a search term above to find courses, tests, and study material</p>
      </div>
    @endif
  </div>
</div>
@endsection
