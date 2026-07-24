@extends('layouts.app')
@section('title', 'Blog — Lo Samajh Lo')
@section('content')
<div class="bg-slate-50 dark:bg-slate-950 min-h-screen">
  <div class="bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-black text-slate-900 dark:text-white">Blog & Study Tips / <span class="grad-text">ब्लॉग</span></h1>
      <p class="text-slate-500 dark:text-slate-400 mt-1">Study strategies, exam tips, and subject guides</p>
    </div>
  </div>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @forelse($posts ?? [] as $post)
      <article class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all overflow-hidden">
        <div class="h-44 bg-gradient-to-br from-slate-700 to-slate-900 flex items-end p-4">
          <span class="px-2.5 py-1 bg-sky-500/20 text-sky-300 border border-sky-500/30 rounded-full text-[10px] font-bold">{{ $post->category ?? 'General' }}</span>
        </div>
        <div class="p-5 space-y-2">
          <h3 class="font-bold text-slate-900 dark:text-white leading-snug line-clamp-2">{{ $post->title }}</h3>
          <p class="text-slate-500 dark:text-slate-400 text-xs line-clamp-2">{{ $post->excerpt ?? Str::limit(strip_tags($post->content ?? ''), 100) }}</p>
          <div class="flex items-center justify-between pt-2">
            <span class="text-[10px] text-slate-400">{{ $post->published_at?->format('d M Y') ?? '' }}</span>
            <a href="{{ route('blog.show', $post->slug) }}" class="text-xs text-sky-500 font-bold hover:underline">Read More →</a>
          </div>
        </div>
      </article>
      @empty
      <div class="col-span-3 text-center py-20">
        <span class="text-6xl block mb-4">📰</span>
        <h3 class="text-xl font-bold text-slate-700 dark:text-slate-300">Blog coming soon!</h3>
        <p class="text-slate-500 mt-2">We are preparing educational articles and study guides for you.</p>
      </div>
      @endforelse
    </div>
  </div>
</div>
@endsection
