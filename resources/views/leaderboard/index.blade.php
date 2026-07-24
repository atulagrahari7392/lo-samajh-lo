@extends('layouts.app')
@section('title', 'Leaderboard — Lo Samajh Lo')
@section('content')
<div class="bg-slate-50 dark:bg-slate-950 min-h-screen">
  <div class="bg-gradient-to-br from-slate-900 to-slate-950 text-white py-12 text-center">
    <h1 class="text-3xl font-black">Leaderboard / <span class="text-yellow-400">लीडरबोर्ड</span></h1>
    <p class="text-slate-300 mt-1">Top performers across all tests · Updated daily</p>
  </div>
  <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <!-- Top 3 Podium -->
    @if($entries->count() >= 3)
    <div class="flex items-end justify-center gap-4 mb-10">
      @foreach([[1,2,'h-24','bg-slate-300 text-slate-700'],[0,1,'h-32','bg-yellow-400 text-yellow-900'],[2,3,'h-20','bg-amber-600 text-white']] as [$idx,$rank,$height,$colors])
      @if($entries->has($idx))
      <div class="flex flex-col items-center gap-2 flex-1 max-w-[130px]">
        <div class="w-14 h-14 rounded-full btn-grad text-white flex items-center justify-center font-black text-xl shadow-lg">{{ substr(optional($entries[$idx]->user)->name ?? '?', 0, 1) }}</div>
        <p class="text-xs font-bold text-slate-900 dark:text-white text-center line-clamp-1">{{ optional($entries[$idx]->user)->name ?? 'Student' }}</p>
        <p class="text-xs text-slate-500">{{ number_format($entries[$idx]->score ?? 0) }} pts</p>
        <div class="{{ $height }} {{ $colors }} rounded-t-2xl w-full flex items-start justify-center pt-2 font-black text-lg">{{ $rank === 1 ? '🥇' : ($rank === 2 ? '🥈' : '🥉') }}</div>
      </div>
      @endif
      @endforeach
    </div>
    @endif

    <!-- Full Rankings Table -->
    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
      <div class="grid grid-cols-12 gap-4 px-5 py-3 bg-slate-50 dark:bg-slate-800 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
        <span class="col-span-1">Rank</span>
        <span class="col-span-7">Student</span>
        <span class="col-span-2 text-right">Score</span>
        <span class="col-span-2 text-right">Tests</span>
      </div>
      @forelse($entries as $i => $entry)
      <div class="grid grid-cols-12 gap-4 px-5 py-3.5 border-t border-slate-100 dark:border-slate-800 {{ auth()->id() == optional($entry->user)->id ? 'bg-sky-50 dark:bg-sky-900/20' : 'hover:bg-slate-50 dark:hover:bg-slate-800' }} transition-colors">
        <span class="col-span-1 font-black text-sm {{ $i===0?'text-yellow-500':($i===1?'text-slate-400':($i===2?'text-amber-600':'text-slate-600 dark:text-slate-400')) }}">{{ $i+1 }}</span>
        <div class="col-span-7 flex items-center gap-3">
          <div class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-700 flex items-center justify-center text-xs font-bold text-slate-700 dark:text-slate-200 flex-shrink-0">{{ substr(optional($entry->user)->name??'?',0,1) }}</div>
          <div>
            <p class="text-sm font-semibold text-slate-900 dark:text-white line-clamp-1">{{ optional($entry->user)->name ?? 'Student' }}</p>
            @if(auth()->id() == optional($entry->user)->id)<span class="text-[10px] bg-sky-100 dark:bg-sky-900 text-sky-600 dark:text-sky-400 font-bold px-1.5 rounded">You</span>@endif
          </div>
        </div>
        <span class="col-span-2 text-right font-black text-slate-900 dark:text-white text-sm">{{ number_format($entry->score ?? 0) }}</span>
        <span class="col-span-2 text-right text-xs text-slate-500">{{ $entry->tests_attempted ?? 0 }}</span>
      </div>
      @empty
      <div class="text-center py-10 text-slate-400">No entries yet. <a href="{{ route('tests.index') }}" class="text-sky-500 font-bold">Attempt a test</a> to get ranked!</div>
      @endforelse
    </div>
  </div>
</div>
@endsection
