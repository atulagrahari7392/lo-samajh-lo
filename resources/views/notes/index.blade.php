@extends('layouts.app')
@section('title', 'Notes & PDFs — Lo Samajh Lo')
@section('content')
<div class="bg-slate-50 dark:bg-slate-950 min-h-screen">
  <div class="bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-black text-slate-900 dark:text-white">Study Notes / <span class="grad-text">नोट्स</span></h1>
      <p class="text-slate-500 dark:text-slate-400 mt-1">Free & Premium PDF notes for all exams</p>
    </div>
  </div>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
      @forelse($notes ?? [] as $note)
      <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-md transition-all p-5 space-y-3 flex flex-col">
        <div class="w-12 h-12 rounded-xl bg-red-50 dark:bg-red-900/20 flex items-center justify-center text-2xl">📄</div>
        <h3 class="font-bold text-sm text-slate-900 dark:text-white line-clamp-2">{{ $note->title }}</h3>
        <p class="text-xs text-slate-500 dark:text-slate-400">{{ $note->subject ?? 'General' }} · {{ number_format($note->file_size_mb ?? 0, 1) }} MB</p>
        <div class="flex items-center justify-between mt-auto pt-3 border-t border-slate-100 dark:border-slate-800">
          <span class="{{ $note->is_free ? 'text-emerald-500' : 'text-sky-500' }} font-black text-sm">{{ $note->is_free ? 'FREE' : '₹'.number_format($note->price) }}</span>
          <a href="{{ route('notes.show', $note->id) }}" class="px-3 py-1.5 rounded-xl btn-grad text-white font-bold text-xs shadow">Download</a>
        </div>
      </div>
      @empty
      <div class="col-span-4 text-center py-20">
        <span class="text-6xl block mb-4">📄</span>
        <h3 class="text-xl font-bold text-slate-700 dark:text-slate-300">Notes coming soon!</h3>
        <p class="text-slate-500 mt-2">Expert-created PDF notes are being prepared for you.</p>
      </div>
      @endforelse
    </div>
  </div>
</div>
@endsection
