@extends('layouts.app')
@section('title', 'Test Result — Lo Samajh Lo')
@section('content')
<div class="bg-slate-50 dark:bg-slate-950 min-h-screen py-10">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

    <!-- Result Hero Card -->
    <div class="bg-gradient-to-br from-slate-900 to-slate-950 rounded-3xl p-8 text-white shadow-2xl text-center space-y-4">
      <h1 class="text-2xl font-black">{{ $test->title }}</h1>
      <div class="flex items-center justify-center">
        <div class="w-36 h-36 rounded-full border-8 {{ $attempt->percentage >= $test->passing_marks ? 'border-emerald-400' : 'border-red-400' }} flex flex-col items-center justify-center">
          <span class="text-4xl font-black {{ $attempt->percentage >= $test->passing_marks ? 'text-emerald-400' : 'text-red-400' }}">{{ $attempt->percentage }}%</span>
          <span class="text-xs text-slate-400">Score</span>
        </div>
      </div>
      <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full {{ $attempt->percentage >= ($test->passing_marks ?? 60) ? 'bg-emerald-500/20 text-emerald-300' : 'bg-red-500/20 text-red-300' }} font-bold text-sm">
        {{ $attempt->percentage >= ($test->passing_marks ?? 60) ? '🎉 PASSED!' : '😔 Better Luck Next Time' }}
      </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
      @foreach(['Score' => $attempt->score.'/'.$test->total_marks, 'Correct' => $attempt->total_correct, 'Wrong' => $attempt->total_wrong, 'Skipped' => $attempt->total_unattempted] as $label => $val)
      <div class="bg-white dark:bg-slate-900 rounded-2xl p-4 border border-slate-200 dark:border-slate-800 shadow-sm text-center">
        <p class="text-2xl font-black {{ $label=='Correct'?'text-emerald-500':($label=='Wrong'?'text-red-500':'text-slate-900 dark:text-white') }}">{{ $val }}</p>
        <p class="text-xs text-slate-500 mt-1">{{ $label }}</p>
      </div>
      @endforeach
    </div>

    <!-- Answer Review -->
    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm p-6">
      <h2 class="font-black text-slate-900 dark:text-white text-lg mb-5">Answer Review / उत्तर समीक्षा</h2>
      <div class="space-y-5">
        @foreach($test->questions as $qi => $question)
        @php $ans = $answers->get($question->id); @endphp
        <div class="border {{ $ans && $ans->is_correct ? 'border-emerald-200 dark:border-emerald-800 bg-emerald-50 dark:bg-emerald-900/20' : 'border-red-200 dark:border-red-800 bg-red-50 dark:bg-red-900/20' }} rounded-2xl p-5 space-y-3">
          <div class="flex items-start gap-3">
            <span class="{{ $ans && $ans->is_correct ? 'text-emerald-600' : 'text-red-500' }} text-xl flex-shrink-0 mt-0.5">{{ $ans && $ans->is_correct ? '✅' : ($ans ? '❌' : '⬜') }}</span>
            <div class="flex-1">
              <p class="text-xs font-bold text-slate-500 dark:text-slate-400 mb-1">Q{{ $qi+1 }} · {{ $question->marks }} Mark</p>
              <p class="font-medium text-slate-900 dark:text-white text-sm leading-relaxed">{!! $question->question_text !!}</p>
            </div>
          </div>
          <div class="grid sm:grid-cols-2 gap-2 pl-9">
            @foreach($question->options as $option)
            <div class="text-xs px-3 py-1.5 rounded-lg {{ $option->is_correct ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300 font-bold' : 'bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-400' }} border border-slate-200 dark:border-slate-700">
              {{ $option->is_correct ? '✓ ' : '' }}{!! $option->option_text !!}
            </div>
            @endforeach
          </div>
          @if($question->explanation)
          <div class="pl-9 text-xs text-sky-700 dark:text-sky-300 bg-sky-50 dark:bg-sky-900/20 border border-sky-200 dark:border-sky-800 rounded-xl p-3">
            💡 <strong>Explanation:</strong> {!! $question->explanation !!}
          </div>
          @endif
        </div>
        @endforeach
      </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex flex-wrap gap-4">
      <a href="{{ route('tests.show', $test->slug) }}" class="px-6 py-3 rounded-2xl btn-grad text-white font-bold shadow">🔄 Reattempt Test</a>
      <a href="{{ route('tests.index') }}" class="px-6 py-3 rounded-2xl border border-slate-300 dark:border-slate-700 text-slate-700 dark:text-slate-200 font-bold hover:border-sky-400">← All Tests</a>
      @auth <a href="{{ route('student.dashboard') }}" class="px-6 py-3 rounded-2xl border border-slate-300 dark:border-slate-700 text-slate-700 dark:text-slate-200 font-bold hover:border-sky-400">Dashboard</a> @endauth
    </div>

  </div>
</div>
@endsection
