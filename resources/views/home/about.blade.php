@extends('layouts.app')
@section('title', 'About Us — Lo Samajh Lo')
@section('content')
<div class="bg-white dark:bg-slate-950">
  <!-- Hero -->
  <div class="bg-gradient-to-br from-slate-900 to-slate-950 text-white py-20 text-center px-4">
    <h1 class="text-4xl sm:text-5xl font-black mb-4">About <span class="grad-text">Lo Samajh Lo</span></h1>
    <p class="text-slate-300 max-w-2xl mx-auto text-lg">India's next-generation learning platform making quality education accessible to every student — from villages to cities, in Hindi and English.</p>
  </div>

  <!-- Mission -->
  <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid md:grid-cols-3 gap-8 mb-16">
      @foreach([['🎯','Our Mission','हमारा उद्देश्य — To make world-class education accessible to every Indian student, regardless of geography or economic background.'],['👁️','Our Vision','हम चाहते हैं कि 2030 तक भारत के 5 करोड़ छात्र Lo Samajh Lo से पढ़ें।'],['💡','Our Approach','AI-powered personalized learning, gamified tests, bilingual content — education that truly makes students understand!']] as [$icon,$title,$desc])
      <div class="text-center space-y-3">
        <span class="text-4xl block">{{ $icon }}</span>
        <h3 class="font-black text-xl text-slate-900 dark:text-white">{{ $title }}</h3>
        <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">{{ $desc }}</p>
      </div>
      @endforeach
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 bg-gradient-to-br from-slate-900 to-slate-950 rounded-3xl p-8">
      @foreach([['5M+','Students'],['2500+','Courses'],['500+','Expert Teachers'],['50,000+','Test Questions']] as [$num,$label])
      <div class="text-center">
        <p class="text-3xl font-black text-sky-400">{{ $num }}</p>
        <p class="text-slate-300 text-sm mt-1">{{ $label }}</p>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
