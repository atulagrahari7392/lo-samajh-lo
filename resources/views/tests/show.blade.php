@extends('layouts.app')
@section('title', $test->title . ' — Lo Samajh Lo')
@section('content')
<div class="bg-slate-50 dark:bg-slate-950 min-h-screen">
  <div class="bg-gradient-to-br from-slate-900 to-slate-950 text-white py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
      <span class="px-3 py-1 rounded-full bg-sky-500/20 text-sky-300 text-xs font-bold">{{ strtoupper(str_replace('_',' ',$test->type)) }}</span>
      <h1 class="text-3xl font-black">{{ $test->title }}</h1>
      <p class="text-slate-300">{{ $test->description ?? 'Attempt this test to evaluate your preparation level.' }}</p>
      <div class="flex flex-wrap gap-5 text-sm text-slate-300 pt-2">
        <span>❓ {{ $test->total_questions }} Questions</span>
        <span>📊 {{ $test->total_marks }} Total Marks</span>
        <span>⏱ {{ $test->duration_minutes }} Minutes</span>
        @if($test->negative_marking)<span class="text-red-300">⚠ Negative Marking: -{{ $test->negative_marks_value }}</span>@endif
      </div>
    </div>
  </div>

  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-6">
    <div class="grid md:grid-cols-2 gap-6">
      <!-- Instructions -->
      <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-6 shadow-sm space-y-3">
        <h2 class="font-bold text-slate-900 dark:text-white text-lg">📋 Instructions / निर्देश</h2>
        <ul class="space-y-2 text-sm text-slate-600 dark:text-slate-400">
          <li>• Attempt all questions carefully within the time limit</li>
          <li>• Each correct answer: <strong>+{{ optional($test->questions->first())->marks ?? 1 }}</strong> marks</li>
          @if($test->negative_marking)<li class="text-red-500">• Wrong answer: <strong>-{{ $test->negative_marks_value }}</strong> marks</li>@endif
          <li>• You can mark questions for review</li>
          <li>• Do not refresh the browser during test</li>
        </ul>
        @if($test->instructions)
        <div class="text-sm text-slate-600 dark:text-slate-400 border-t border-slate-100 dark:border-slate-800 pt-3">
          {!! $test->instructions !!}
        </div>
        @endif
      </div>

      <!-- Start Box -->
      <div class="bg-white dark:bg-slate-900 rounded-2xl border border-sky-200 dark:border-sky-900/50 p-6 shadow-sm space-y-4">
        <h2 class="font-bold text-slate-900 dark:text-white text-lg">🚀 Start Test</h2>
        @if($previousAttempts && count($previousAttempts))
        <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-4 space-y-2 text-xs">
          <p class="font-bold text-slate-700 dark:text-slate-200">Previous Attempts:</p>
          @foreach($previousAttempts as $att)
          <div class="flex justify-between">
            <span class="text-slate-500">{{ $att->submitted_at?->format('d M, g:i A') ?? 'In Progress' }}</span>
            <span class="font-bold {{ $att->percentage >= 60 ? 'text-emerald-500' : 'text-red-500' }}">{{ $att->percentage }}%</span>
          </div>
          @endforeach
        </div>
        @endif
        @auth
          <a href="{{ route('student.tests.start', $test->id) }}" class="block w-full text-center py-3.5 rounded-2xl btn-grad text-white font-bold shadow-md" onclick="return confirm('Are you ready to start the test?')">
            ▶ Start Test Now
          </a>
          @if($previousAttempts && count($previousAttempts))
          <a href="{{ route('student.tests.result', [$test->id, $previousAttempts->first()->id]) }}" class="block w-full text-center py-2.5 rounded-2xl border border-sky-300 dark:border-sky-700 text-sky-600 dark:text-sky-400 font-bold text-sm">
            View Last Result
          </a>
          @endif
        @else
          <a href="{{ route('register') }}" class="block w-full text-center py-3.5 rounded-2xl btn-grad text-white font-bold shadow-md">Sign Up to Attempt</a>
          <a href="{{ route('login') }}" class="block w-full text-center py-2.5 rounded-2xl border border-sky-300 text-sky-600 font-bold text-sm">Already registered? Login</a>
        @endauth
      </div>
    </div>
  </div>
</div>
@endsection
