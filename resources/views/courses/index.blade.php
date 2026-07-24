@extends('layouts.app')
@section('title', 'All Courses — Lo Samajh Lo')
@section('content')
<div class="bg-slate-50 dark:bg-slate-950 min-h-screen">
  <!-- Header -->
  <div class="bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-black text-slate-900 dark:text-white">All Courses / <span class="grad-text">सभी कोर्स</span></h1>
      <p class="text-slate-500 dark:text-slate-400 mt-1">Expert-crafted courses for every exam & university level</p>
    </div>
  </div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="flex flex-col lg:flex-row gap-8">
      <!-- Sidebar Filters -->
      <aside class="lg:w-64 flex-shrink-0 space-y-6">
        <div class="bg-white dark:bg-slate-900 rounded-2xl p-5 border border-slate-200 dark:border-slate-800 shadow-sm">
          <h3 class="font-bold text-slate-900 dark:text-white mb-4 text-sm uppercase tracking-wider">Filter / फ़िल्टर</h3>

          <form method="GET" action="{{ route('courses.index') }}">
            <!-- Category Filter -->
            <div class="mb-5">
              <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-2">Category</label>
              <select name="cat" onchange="this.form.submit()" class="w-full text-sm rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-white px-3 py-2 outline-none focus:ring-2 focus:ring-sky-400">
                <option value="">All Categories</option>
                @foreach($categories as $cat)
                  <option value="{{ $cat->slug }}" {{ request('cat')==$cat->slug?'selected':'' }}>{{ $cat->name }}</option>
                @endforeach
              </select>
            </div>

            <!-- Exam Type Filter -->
            <div class="mb-5">
              <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-2">Exam Type</label>
              <select name="type" onchange="this.form.submit()" class="w-full text-sm rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-white px-3 py-2 outline-none focus:ring-2 focus:ring-sky-400">
                <option value="">All Types</option>
                <option value="graduation" {{ request('type')=='graduation'?'selected':'' }}>Graduation</option>
                <option value="pg" {{ request('type')=='pg'?'selected':'' }}>Post Graduation</option>
                <option value="competitive" {{ request('type')=='competitive'?'selected':'' }}>Competitive</option>
              </select>
            </div>

            <!-- Price Filter -->
            <div class="mb-5">
              <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-2">Price</label>
              <label class="flex items-center gap-2 text-sm text-slate-600 dark:text-slate-300 cursor-pointer">
                <input type="checkbox" name="price" value="free" {{ request('price')=='free'?'checked':'' }} onchange="this.form.submit()" class="rounded text-sky-500 focus:ring-sky-400">
                Free Courses Only
              </label>
            </div>

            <!-- Search -->
            <div>
              <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-2">Search</label>
              <div class="flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Course name..." class="flex-1 text-sm rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-white px-3 py-2 outline-none focus:ring-2 focus:ring-sky-400">
                <button type="submit" class="px-3 py-2 rounded-xl btn-grad text-white text-sm font-bold">Go</button>
              </div>
            </div>
          </form>
        </div>
      </aside>

      <!-- Course Grid -->
      <div class="flex-1">
        @if($courses->count() === 0)
          <div class="text-center py-20">
            <span class="text-6xl block mb-4">📚</span>
            <h3 class="text-xl font-bold text-slate-700 dark:text-slate-300">No courses found</h3>
            <p class="text-slate-500 mt-2">Try adjusting your filters</p>
            <a href="{{ route('courses.index') }}" class="mt-4 inline-block px-6 py-2 rounded-xl btn-grad text-white font-bold text-sm">Clear Filters</a>
          </div>
        @else
        <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-6 mb-8">
          @foreach($courses as $course)
          <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200/80 dark:border-slate-800 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden flex flex-col">
            <div class="h-40 bg-gradient-to-br from-slate-800 to-slate-900 relative flex items-end p-4">
              <span class="absolute top-3 right-3 {{ $course->is_free ? 'bg-emerald-500' : 'bg-sky-500' }} text-white text-[10px] font-black px-2.5 py-1 rounded-full">
                {{ $course->is_free ? 'FREE' : 'PAID' }}
              </span>
              <div>
                <span class="text-xs font-bold text-sky-400 uppercase tracking-wide">{{ optional($course->category)->name ?? 'Course' }}</span>
                <h3 class="text-sm font-bold text-white leading-snug line-clamp-2 mt-0.5">{{ $course->title }}</h3>
              </div>
            </div>
            <div class="p-4 flex-1 flex flex-col justify-between">
              <div class="space-y-3">
                <div class="flex items-center gap-2 text-xs text-slate-600 dark:text-slate-400">
                  <span>👨‍🏫</span>
                  <span>{{ optional(optional($course)->teacher)->name ?? 'Expert Faculty' }}</span>
                </div>
                <div class="flex items-center gap-3 text-xs text-slate-500 dark:text-slate-400">
                  <span>📹 {{ $course->total_lessons ?? 0 }} Lessons</span>
                  <span>⏱ {{ $course->duration_hours ?? 0 }}h</span>
                </div>
              </div>
              <div class="flex items-center justify-between mt-4 pt-3 border-t border-slate-100 dark:border-slate-800">
                <div>
                  @if($course->is_free)
                    <span class="text-lg font-black text-emerald-500">FREE</span>
                  @else
                    <span class="text-lg font-black text-slate-900 dark:text-white">₹{{ number_format($course->discounted_price ?? $course->price) }}</span>
                    @if($course->price && $course->discounted_price && $course->price > $course->discounted_price)
                      <span class="text-xs text-slate-400 line-through ml-1">₹{{ number_format($course->price) }}</span>
                    @endif
                  @endif
                </div>
                <a href="{{ route('courses.show', $course->slug) }}" class="px-4 py-2 rounded-xl btn-grad text-white font-bold text-xs shadow">View →</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>

        <!-- Pagination -->
        <div class="flex justify-center">
          {{ $courses->links() }}
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
