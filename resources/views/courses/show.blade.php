@extends('layouts.app')
@section('title', $course->title . ' — Lo Samajh Lo')
@section('content')
<div class="bg-slate-50 dark:bg-slate-950 min-h-screen">
  <!-- Course Hero -->
  <div class="bg-gradient-to-br from-slate-900 via-slate-950 to-slate-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-12 gap-10 items-start">
        <div class="lg:col-span-8 space-y-4">
          <div class="flex items-center gap-2">
            <span class="px-3 py-1 rounded-full bg-sky-500/20 text-sky-300 border border-sky-500/30 text-xs font-bold">{{ strtoupper($course->exam_type ?? 'COURSE') }}</span>
            <span class="px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold">{{ $course->is_free ? 'FREE' : 'PAID' }}</span>
          </div>
          <h1 class="text-3xl sm:text-4xl font-black text-white leading-tight">{{ $course->title }}</h1>
          <p class="text-slate-300 text-base leading-relaxed">{{ $course->description ?? 'A comprehensive course to help you achieve your exam goals.' }}</p>

          <div class="flex flex-wrap items-center gap-5 text-sm text-slate-300 pt-2">
            <span>📹 {{ $course->total_lessons ?? 0 }} Video Lessons</span>
            <span>⏱ {{ $course->duration_hours ?? 0 }} Hours</span>
            <span>📝 Tests Included</span>
            <span>📄 PDF Notes</span>
            <span>🌐 Hindi + English</span>
          </div>

          <div class="flex items-center gap-3 pt-2">
            <div class="w-9 h-9 rounded-full bg-sky-500/20 flex items-center justify-center text-sm">👨‍🏫</div>
            <div>
              <p class="text-xs text-slate-400">Instructor</p>
              <p class="font-bold text-white text-sm">{{ optional($course->teacher)->name ?? 'Expert Faculty' }}</p>
            </div>
          </div>
        </div>

        <!-- Enroll Card -->
        <div class="lg:col-span-4">
          <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 shadow-2xl border border-slate-200 dark:border-slate-800 space-y-4 sticky top-24">
            <div class="h-40 bg-gradient-to-br from-slate-700 to-slate-900 rounded-2xl flex items-center justify-center">
              <span class="text-5xl">📚</span>
            </div>
            <div>
              @if($course->is_free)
                <span class="text-3xl font-black text-emerald-500">FREE</span>
              @else
                <span class="text-3xl font-black text-slate-900 dark:text-white">₹{{ number_format($course->discounted_price ?? $course->price) }}</span>
                @if($course->price && $course->discounted_price && $course->price > $course->discounted_price)
                  <span class="text-slate-400 line-through ml-2">₹{{ number_format($course->price) }}</span>
                  <span class="ml-2 px-2 py-0.5 bg-emerald-100 text-emerald-700 rounded text-xs font-bold">{{ round((1 - $course->discounted_price/$course->price)*100) }}% OFF</span>
                @endif
              @endif
            </div>

            @if($isEnrolled)
              <a href="{{ route('student.courses.learn', $course->id) }}" class="block w-full text-center py-3.5 rounded-2xl btn-grad text-white font-bold shadow-md">▶ Continue Learning</a>
            @else
              @auth
                <a href="{{ route('student.courses.learn', $course->id) }}" class="block w-full text-center py-3.5 rounded-2xl btn-grad text-white font-bold shadow-md">{{ $course->is_free ? 'Enroll for Free' : 'Buy Now' }}</a>
              @else
                <a href="{{ route('register') }}" class="block w-full text-center py-3.5 rounded-2xl btn-grad text-white font-bold shadow-md">Sign Up to Enroll</a>
              @endauth
            @endif

            <div class="text-xs text-slate-500 dark:text-slate-400 space-y-1.5 pt-2 border-t border-slate-100 dark:border-slate-800">
              <p>✅ Lifetime Access</p>
              <p>✅ Bilingual (Hindi + English)</p>
              <p>✅ Certificate of Completion</p>
              <p>✅ Mobile & Web Access</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Curriculum & Related -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid lg:grid-cols-8 gap-10">
      <div class="lg:col-span-5 space-y-8">
        <!-- Course Content Preview -->
        <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-6 shadow-sm">
          <h2 class="font-black text-slate-900 dark:text-white text-xl mb-4">Course Content / पाठ्यक्रम</h2>
          @if($course->subjects && $course->subjects->count())
            @foreach($course->subjects as $subject)
            <div class="mb-3 border border-slate-100 dark:border-slate-800 rounded-xl overflow-hidden">
              <div class="bg-slate-50 dark:bg-slate-800 px-4 py-3 font-bold text-sm text-slate-800 dark:text-white flex items-center justify-between">
                <span>{{ $subject->name }}</span>
                <span class="text-xs font-normal text-slate-500">{{ $subject->lessons->count() ?? 0 }} lessons</span>
              </div>
              @foreach($subject->lessons->take(3) as $lesson)
              <div class="px-4 py-2.5 border-t border-slate-100 dark:border-slate-800 flex items-center gap-3 text-xs text-slate-600 dark:text-slate-400">
                <span>{{ $lesson->type === 'video' ? '📹' : ($lesson->type === 'pdf' ? '📄' : '📝') }}</span>
                <span>{{ $lesson->title }}</span>
                @if($lesson->is_free_preview)<span class="ml-auto px-2 py-0.5 bg-emerald-100 text-emerald-700 rounded font-bold">FREE</span>@endif
              </div>
              @endforeach
            </div>
            @endforeach
          @else
            <p class="text-slate-500 dark:text-slate-400 text-sm">Course curriculum will be available after enrollment.</p>
          @endif
        </div>
      </div>

      <!-- Related Courses -->
      <div class="lg:col-span-3 space-y-5">
        <h2 class="font-black text-slate-900 dark:text-white text-xl">Related Courses</h2>
        @foreach($relatedCourses as $rel)
        <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-4 shadow-sm flex gap-4 hover:shadow-md transition-all">
          <div class="w-14 h-14 bg-gradient-to-br from-slate-800 to-slate-900 rounded-xl flex items-center justify-center text-xl flex-shrink-0">📚</div>
          <div class="flex-1 min-w-0">
            <h4 class="font-bold text-sm text-slate-900 dark:text-white line-clamp-2">{{ $rel->title }}</h4>
            <p class="text-xs font-bold mt-1 {{ $rel->is_free ? 'text-emerald-500' : 'text-sky-500' }}">{{ $rel->is_free ? 'FREE' : '₹'.number_format($rel->discounted_price ?? $rel->price) }}</p>
            <a href="{{ route('courses.show', $rel->slug) }}" class="text-xs text-sky-500 hover:underline">View Course →</a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
