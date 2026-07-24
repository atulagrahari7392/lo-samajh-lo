@extends('layouts.app')

@section('content')

<!-- ══════════════════════════════════════════════
     SECTION 1: HERO (Light Clean Glassmorphism)
══════════════════════════════════════════════ -->
<section class="relative min-h-[88vh] flex items-center pt-10 pb-20 overflow-hidden bg-gradient-to-br from-slate-50 via-sky-50/50 to-blue-50 dark:from-slate-950 dark:via-slate-900 dark:to-slate-950">

  <!-- Ambient Light Orbs -->
  <div class="absolute w-[500px] h-[500px] bg-sky-400/20 rounded-full blur-[120px] -top-24 -left-24 pointer-events-none"></div>
  <div class="absolute w-[450px] h-[450px] bg-blue-500/20 rounded-full blur-[100px] bottom-0 right-0 pointer-events-none"></div>

  <!-- Tech Grid Background Pattern -->
  <div class="absolute inset-0 opacity-[0.03] dark:opacity-[0.05] pointer-events-none" style="background-image: radial-gradient(circle, #0F172A 1px, transparent 1px); background-size: 28px 28px;"></div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
    <div class="grid lg:grid-cols-12 gap-12 lg:gap-8 items-center">

      <!-- Left: Headline & Actions (7 cols) -->
      <div class="lg:col-span-7 space-y-7">
        
        <!-- Badge Pill -->
        <div class="inline-flex items-center gap-2.5 px-4 py-2 rounded-full bg-white dark:bg-slate-800 border border-sky-200 dark:border-slate-700 shadow-sm text-xs font-semibold text-sky-700 dark:text-sky-300">
          <span class="flex h-2.5 w-2.5 relative">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-sky-500"></span>
          </span>
          <span>India's Most Advanced AI-Powered Learning Platform · भारत का #1 शिक्षा मंच</span>
        </div>

        <!-- Headline -->
        <h1 class="text-4xl sm:text-6xl lg:text-7xl font-black text-slate-900 dark:text-white tracking-tight leading-[1.08]">
          Learn <span class="grad-text">Smarter</span>,<br>
          Score <span class="grad-text">Higher.</span>
          <span class="block text-xl sm:text-3xl font-bold text-slate-500 dark:text-slate-400 mt-2 font-hindi">स्मार्ट पढ़ें, ऊंचा स्कोर करें</span>
        </h1>

        <!-- Subheading -->
        <p class="text-slate-600 dark:text-slate-300 text-base sm:text-lg max-w-2xl font-normal leading-relaxed">
          Prepare for <span class="text-sky-600 dark:text-sky-400 font-bold">BA · B.Sc · B.Com · MA · UGC NET · SSC · Banking · Railway · UPSC · CTET</span> and all university & competitive exams with top faculty, AI tutor & bilingual notes.
        </p>

        <!-- Search Bar with Quick Filter Tags -->
        <div class="bg-white dark:bg-slate-900 border border-sky-100 dark:border-slate-800 p-2 rounded-2xl shadow-xl max-w-2xl">
          <div class="flex items-center gap-3 px-3 py-1">
            <svg class="w-5 h-5 text-sky-500 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
            <input type="text" id="heroSearchInput" placeholder="Search courses, PYQs, tests, notes (e.g. UGC NET Paper 1)..." class="w-full bg-transparent text-sm text-slate-800 dark:text-white placeholder-slate-400 outline-none border-none focus:ring-0">
            <button onclick="performHeroSearch()" class="px-6 py-3 rounded-xl btn-grad font-bold text-white text-sm shadow-md shadow-sky-500/20 flex-shrink-0">
              Search
            </button>
          </div>
          <!-- Trending Tags -->
          <div class="flex items-center gap-2 px-3 pt-2 text-[11px] text-slate-500 dark:text-slate-400 border-t border-slate-100 dark:border-slate-800 mt-2 overflow-x-auto">
            <span class="font-bold text-slate-400">Trending:</span>
            <button onclick="setHeroSearch('UGC NET Paper 1')" class="hover:text-sky-500 bg-sky-50 dark:bg-slate-800 px-2 py-0.5 rounded text-sky-700 dark:text-sky-300 font-semibold">UGC NET Paper 1</button>
            <button onclick="setHeroSearch('SSC CGL Math')" class="hover:text-sky-500 bg-sky-50 dark:bg-slate-800 px-2 py-0.5 rounded text-sky-700 dark:text-sky-300 font-semibold">SSC CGL Math</button>
            <button onclick="setHeroSearch('BA History Notes')" class="hover:text-sky-500 bg-sky-50 dark:bg-slate-800 px-2 py-0.5 rounded text-sky-700 dark:text-sky-300 font-semibold">BA History</button>
            <button onclick="setHeroSearch('Banking Reasoning')" class="hover:text-sky-500 bg-sky-50 dark:bg-slate-800 px-2 py-0.5 rounded text-sky-700 dark:text-sky-300 font-semibold">IBPS Reasoning</button>
          </div>
        </div>

        <!-- Primary Actions -->
        <div class="flex flex-wrap items-center gap-4 pt-2">
          <a href="{{ route('register') }}" class="px-8 py-4 rounded-2xl font-bold text-white btn-grad shadow-xl shadow-sky-500/25 text-base flex items-center gap-3">
            <span>🚀 Start Free — नि:शुल्क शुरू करें</span>
          </a>
          <a href="#test-demo" class="px-7 py-4 rounded-2xl font-bold text-slate-700 dark:text-slate-200 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hover:border-sky-300 shadow-sm transition-all text-base flex items-center gap-2">
            <span class="w-7 h-7 rounded-full bg-sky-100 dark:bg-sky-900/50 text-sky-600 dark:text-sky-400 flex items-center justify-center text-xs">▶</span>
            <span>Watch Demo / फ्री डेमो</span>
          </a>
        </div>

        <!-- Trust Badges -->
        <div class="grid grid-cols-4 gap-4 pt-4 border-t border-slate-200/80 dark:border-slate-800 max-w-2xl">
          <div>
            <p class="text-2xl sm:text-3xl font-black text-slate-900 dark:text-white grad-text">5M+</p>
            <p class="text-xs text-slate-500 dark:text-slate-400">Students</p>
          </div>
          <div>
            <p class="text-2xl sm:text-3xl font-black text-slate-900 dark:text-white grad-text">50K+</p>
            <p class="text-xs text-slate-500 dark:text-slate-400">Questions</p>
          </div>
          <div>
            <p class="text-2xl sm:text-3xl font-black text-slate-900 dark:text-white grad-text">500+</p>
            <p class="text-xs text-slate-500 dark:text-slate-400">Teachers</p>
          </div>
          <div>
            <p class="text-2xl sm:text-3xl font-black text-emerald-600 dark:text-emerald-400">98.4%</p>
            <p class="text-xs text-slate-500 dark:text-slate-400">Success Rate</p>
          </div>
        </div>

      </div>

      <!-- Right: Interactive Live Studio Mockup (5 cols) -->
      <div class="lg:col-span-5 relative">
        
        <div class="relative bg-white dark:bg-slate-900 border border-sky-100 dark:border-slate-800 rounded-3xl p-6 shadow-2xl space-y-6">

          <!-- Header Bar -->
          <div class="flex items-center justify-between border-b border-slate-100 dark:border-slate-800 pb-4">
            <div class="flex items-center gap-2">
              <span class="w-3 h-3 rounded-full bg-red-500"></span>
              <span class="w-3 h-3 rounded-full bg-yellow-500"></span>
              <span class="w-3 h-3 rounded-full bg-green-500"></span>
              <span class="text-xs font-bold text-slate-700 dark:text-slate-300 ml-2">LSL Studio Live Demo</span>
            </div>
            <div class="flex gap-1 bg-slate-100 dark:bg-slate-800 p-1 rounded-xl text-[11px] font-bold">
              <button onclick="switchHeroTab('ai')" id="tabBtnAi" class="px-3 py-1 rounded-lg bg-sky-500 text-white transition-all">🤖 AI Tutor</button>
              <button onclick="switchHeroTab('test')" id="tabBtnTest" class="px-3 py-1 rounded-lg text-slate-600 dark:text-slate-300 transition-all">📝 Test Engine</button>
            </div>
          </div>

          <!-- TAB 1: Live AI Tutor Chat -->
          <div id="heroTabAi" class="space-y-4">
            <div class="bg-slate-50 dark:bg-slate-950 rounded-2xl p-4 border border-slate-100 dark:border-slate-800 space-y-3 h-64 overflow-y-auto">
              <!-- Student question -->
              <div class="flex gap-2.5 justify-end">
                <div class="bg-sky-500 text-white rounded-2xl rounded-tr-none px-3.5 py-2 text-xs font-medium max-w-[82%] shadow-sm">
                  Explain Teaching Aptitude evaluation types in Hindi?
                </div>
                <div class="w-7 h-7 rounded-full bg-sky-400 text-white flex items-center justify-center font-bold text-xs flex-shrink-0">You</div>
              </div>
              <!-- AI reply -->
              <div class="flex gap-2.5">
                <div class="w-7 h-7 rounded-full btn-grad text-white flex items-center justify-center font-bold text-xs flex-shrink-0">AI</div>
                <div class="bg-white dark:bg-slate-900 border border-sky-100 dark:border-slate-800 text-slate-800 dark:text-slate-200 rounded-2xl rounded-tl-none px-4 py-3 text-xs leading-relaxed max-w-[85%] shadow-sm">
                  <p class="font-bold text-sky-600 dark:text-sky-400 mb-1">🤖 Samajh AI Tutor Response:</p>
                  UGC NET में **Evaluation** 4 प्रकार का होता है:
                  <ul class="list-disc pl-4 mt-1 space-y-0.5">
                    <li><strong>Formative:</strong> क्लास के दौरान फीडबैक (Quiz)</li>
                    <li><strong>Summative:</strong> फाइनल एग्जाम (Marks)</li>
                    <li><strong>Norm-Referenced:</strong> Percentile Rank (तुलना)</li>
                    <li><strong>Criterion-Referenced:</strong> Cutoff Marks</li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="flex items-center gap-2 bg-slate-100 dark:bg-slate-800 rounded-xl p-2">
              <input type="text" placeholder="Ask AI doubt in Hindi or English..." class="w-full bg-transparent text-xs text-slate-800 dark:text-white placeholder-slate-400 outline-none px-2">
              <button class="px-4 py-2 rounded-lg btn-grad text-white font-bold text-xs flex-shrink-0">Ask AI</button>
            </div>
          </div>

          <!-- TAB 2: Live Test Engine Sample -->
          <div id="heroTabTest" class="hidden space-y-4">
            <div class="bg-slate-50 dark:bg-slate-950 rounded-2xl p-4 border border-slate-100 dark:border-slate-800 space-y-4">
              <div class="flex items-center justify-between text-xs text-slate-500 pb-2 border-b border-slate-200 dark:border-slate-800">
                <span class="text-sky-600 dark:text-sky-400 font-bold">Sample Question 1 of 50</span>
                <span class="text-red-500 font-mono font-bold">⏰ 44:52</span>
              </div>
              <p class="text-xs font-semibold text-slate-800 dark:text-white leading-relaxed">
                Which evaluation model focuses on continuous feedback during the instructional process?
              </p>
              <div class="space-y-2">
                <button onclick="selectHeroOption(this, false)" class="w-full text-left p-3 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 hover:border-sky-400 text-xs text-slate-700 dark:text-slate-200 font-medium transition-all flex items-center gap-2">
                  <span class="w-5 h-5 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center font-bold text-[10px]">A</span> Summative Evaluation
                </button>
                <button onclick="selectHeroOption(this, true)" class="w-full text-left p-3 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 hover:border-sky-400 text-xs text-slate-700 dark:text-slate-200 font-medium transition-all flex items-center gap-2">
                  <span class="w-5 h-5 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center font-bold text-[10px]">B</span> Formative Evaluation
                </button>
              </div>
              <div id="heroAnswerFeedback" class="hidden p-3 rounded-xl bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs">
                ✅ <strong>Correct!</strong> Formative evaluation provides continuous feedback.
              </div>
            </div>
          </div>

          <div class="flex items-center justify-between text-xs text-slate-500 pt-1 border-t border-slate-100 dark:border-slate-800">
            <span class="flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-emerald-500"></span> 1,420 Students Live Now</span>
            <span class="text-sky-600 dark:text-sky-400 font-bold">Bilingual EN | HI</span>
          </div>

        </div>

        <!-- Floating Badge -->
        <div class="absolute -bottom-6 -left-6 bg-white dark:bg-slate-800 border border-sky-100 dark:border-slate-700 p-3.5 rounded-2xl shadow-xl flex items-center gap-3 animate-bounce">
          <span class="text-2xl">🏆</span>
          <div>
            <p class="text-xs font-bold text-slate-900 dark:text-white">Badge Unlocked!</p>
            <p class="text-[10px] text-slate-400">Score Ace Rank #38</p>
          </div>
        </div>

      </div>

    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════
     SECTION 2: EXAM CATEGORIES MATRIX (12 Goals)
══════════════════════════════════════════════ -->
<section class="py-20 bg-white dark:bg-slate-950" id="courses">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center max-w-3xl mx-auto mb-14">
      <span class="px-3.5 py-1.5 rounded-full bg-sky-100 dark:bg-sky-900/50 text-sky-600 dark:text-sky-300 text-xs font-bold uppercase tracking-wide">All India Coverage · सभी परीक्षाएं</span>
      <h2 class="text-3xl sm:text-5xl font-black text-slate-900 dark:text-white mt-4">
        Choose Your Goal / <span class="grad-text">अपना लक्ष्य चुनें</span>
      </h2>
      <p class="text-slate-600 dark:text-slate-400 text-base mt-2">Comprehensive learning material structured specifically for your target exam</p>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-5">
      @php
        $cats = [
          ['name' => 'BA / BSc / BCom', 'icon' => '🎓', 'count' => '2.1M Students', 'color' => 'from-blue-400 to-indigo-600'],
          ['name' => 'MA / MSc / MCom', 'icon' => '🏛️', 'count' => '850K Students', 'color' => 'from-purple-400 to-pink-600'],
          ['name' => 'UGC NET / JRF', 'icon' => '📚', 'count' => '1.4M Students', 'color' => 'from-amber-400 to-orange-600'],
          ['name' => 'SSC (CGL/CHSL)', 'icon' => '📊', 'count' => '3.2M Students', 'color' => 'from-emerald-400 to-teal-600'],
          ['name' => 'Banking (IBPS/SBI)', 'icon' => '🏦', 'count' => '1.9M Students', 'color' => 'from-sky-400 to-cyan-600'],
          ['name' => 'Railway (RRB)', 'icon' => '🚂', 'count' => '2.5M Students', 'color' => 'from-rose-400 to-red-600'],
          ['name' => 'Teaching (CTET)', 'icon' => '🏫', 'count' => '1.1M Students', 'color' => 'from-indigo-400 to-blue-600'],
          ['name' => 'UPPSC / PCS', 'icon' => '⚖️', 'count' => '780K Students', 'color' => 'from-yellow-400 to-amber-600'],
          ['name' => 'Police Exams', 'icon' => '👮', 'count' => '920K Students', 'color' => 'from-blue-500 to-slate-700'],
          ['name' => 'CUET Entrance', 'icon' => '🎯', 'count' => '640K Students', 'color' => 'from-teal-400 to-emerald-600'],
          ['name' => 'B.Ed & D.El.Ed', 'icon' => '📖', 'count' => '510K Students', 'color' => 'from-pink-400 to-rose-600'],
          ['name' => 'All Universities', 'icon' => '🌐', 'count' => '4.8M Students', 'color' => 'from-violet-400 to-purple-600'],
        ];
      @endphp

      @foreach($cats as $c)
      <a href="{{ route('courses.index') }}" class="group bg-slate-50 dark:bg-slate-900 rounded-2xl p-5 border border-slate-200/80 dark:border-slate-800 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 text-center flex flex-col items-center justify-between">
        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br {{ $c['color'] }} flex items-center justify-center text-2xl text-white shadow-md group-hover:scale-110 transition-transform duration-300 mb-3">
          {{ $c['icon'] }}
        </div>
        <h3 class="font-bold text-sm text-slate-900 dark:text-white group-hover:text-sky-500 transition-colors leading-tight mb-1">{{ $c['name'] }}</h3>
        <p class="text-[11px] font-semibold text-sky-600 dark:text-sky-400">{{ $c['count'] }}</p>
      </a>
      @endforeach
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════
     SECTION 3: POPULAR COURSES SHOWCASE
══════════════════════════════════════════════ -->
<section class="py-20 bg-slate-50 dark:bg-slate-900">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-12 gap-4">
      <div>
        <h2 class="text-3xl sm:text-4xl font-black text-slate-900 dark:text-white">Popular Courses / <span class="grad-text">लोकप्रिय कोर्स</span></h2>
        <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">Structured video lectures, PDF notes & test series by top faculty</p>
      </div>
      <a href="{{ route('courses.index') }}" class="px-6 py-2.5 rounded-xl border border-sky-400 text-sky-600 dark:text-sky-400 hover:bg-sky-50 dark:hover:bg-slate-800 font-bold text-sm transition-colors">
        View All Courses →
      </a>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
      @php
        $courses = [
          ['title' => 'UGC NET Paper 1 Complete Foundation 2025', 'category' => 'UGC NET', 'teacher' => 'Dr. Priya Sharma', 'rating' => '4.9', 'reviews' => '14,280', 'videos' => '160', 'tests' => '45', 'price' => 'FREE', 'origPrice' => '', 'tag' => 'FREE BATCH', 'tagBg' => 'bg-emerald-500'],
          ['title' => 'SSC CGL Tier 1 + Tier 2 Complete Master Class', 'category' => 'SSC CGL', 'teacher' => 'Amit Verma Sir', 'rating' => '4.8', 'reviews' => '11,450', 'videos' => '280', 'tests' => '90', 'price' => '₹999', 'origPrice' => '₹3,499', 'tag' => 'BESTSELLER', 'tagBg' => 'bg-amber-500'],
          ['title' => 'Banking IBPS PO + SBI PO Complete Exam Pack', 'category' => 'Banking', 'teacher' => 'Suresh Gupta Sir', 'rating' => '4.9', 'reviews' => '8,920', 'videos' => '220', 'tests' => '75', 'price' => '₹1,199', 'origPrice' => '₹3,999', 'tag' => 'POPULAR', 'tagBg' => 'bg-sky-500'],
          ['title' => 'BA History & Political Science Semester Prep', 'category' => 'Graduation', 'teacher' => 'Prof. Rajesh Kumar', 'rating' => '4.7', 'reviews' => '6,310', 'videos' => '140', 'tests' => '30', 'price' => 'FREE', 'origPrice' => '', 'tag' => 'UNIVERSITY', 'tagBg' => 'bg-indigo-500'],
          ['title' => 'UPPSC / PCS Prelims GS Paper 1 + 2 Master Batch', 'category' => 'State PCS', 'teacher' => 'Vikramaditya Sir', 'rating' => '4.9', 'reviews' => '9,840', 'videos' => '320', 'tests' => '110', 'price' => '₹1,499', 'origPrice' => '₹4,999', 'tag' => 'PREMIUM', 'tagBg' => 'bg-purple-500'],
          ['title' => 'CTET Paper 1 & Paper 2 Child Pedagogy Master', 'category' => 'Teaching', 'teacher' => 'Sunita Devi Ma\'am', 'rating' => '4.8', 'reviews' => '7,420', 'videos' => '150', 'tests' => '50', 'price' => '₹799', 'origPrice' => '₹2,499', 'tag' => 'POPULAR', 'tagBg' => 'bg-rose-500'],
        ];
      @endphp

      @foreach($courses as $course)
      <div class="group bg-white dark:bg-slate-900 rounded-3xl border border-slate-200/80 dark:border-slate-800 shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300 overflow-hidden flex flex-col justify-between">
        <div>
          <div class="h-48 bg-gradient-to-br from-slate-800 to-slate-950 relative flex items-end p-5 overflow-hidden">
            <span class="absolute top-4 right-4 {{ $course['tagBg'] }} text-white text-[10px] font-black px-3 py-1 rounded-full uppercase shadow">
              {{ $course['tag'] }}
            </span>
            <div class="relative z-10">
              <span class="text-xs font-bold text-sky-400 uppercase tracking-wide">{{ $course['category'] }}</span>
              <h3 class="text-lg font-bold text-white leading-snug line-clamp-2 mt-0.5">{{ $course['title'] }}</h3>
            </div>
          </div>
          <div class="p-6 space-y-4">
            <div class="flex items-center justify-between text-xs">
              <div class="flex items-center gap-2">
                <div class="w-7 h-7 rounded-full bg-sky-500/20 text-sky-500 flex items-center justify-center font-bold text-xs">👨‍🏫</div>
                <span class="font-medium text-slate-700 dark:text-slate-300">{{ $course['teacher'] }}</span>
              </div>
              <div class="flex items-center gap-1 font-bold text-amber-400">
                <span>★</span> <span>{{ $course['rating'] }}</span>
                <span class="text-slate-400 font-normal">({{ $course['reviews'] }})</span>
              </div>
            </div>
            <div class="flex items-center gap-4 text-xs text-slate-500 dark:text-slate-400">
              <span>📹 {{ $course['videos'] }} Videos</span>
              <span>📝 {{ $course['tests'] }} Tests</span>
              <span>📄 Notes</span>
            </div>
          </div>
        </div>
        <div class="p-6 pt-0 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between mt-4">
          <div>
            @if($course['price'] === 'FREE')
              <span class="text-2xl font-black text-emerald-500">FREE</span>
            @else
              <span class="text-2xl font-black text-slate-900 dark:text-white">{{ $course['price'] }}</span>
              <span class="text-xs text-slate-400 line-through ml-1.5">{{ $course['origPrice'] }}</span>
            @endif
          </div>
          <a href="{{ route('courses.index') }}" class="px-5 py-2.5 rounded-xl btn-grad text-white font-bold text-xs shadow-md shadow-sky-500/20">
            Enroll Now →
          </a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════
     SECTION 4: TODAY'S LIVE CLASSES SCHEDULE
══════════════════════════════════════════════ -->
<section class="py-20 bg-white dark:bg-slate-950" id="live">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center max-w-2xl mx-auto mb-14">
      <span class="px-3.5 py-1.5 rounded-full bg-red-100 dark:bg-red-900/40 text-red-600 dark:text-red-300 text-xs font-bold uppercase tracking-wider">Interactive Live Stream</span>
      <h2 class="text-3xl sm:text-4xl font-black text-slate-900 dark:text-white mt-3">Today's Live Classes / <span class="grad-text">आज की लाइव क्लास</span></h2>
      <p class="text-slate-500 dark:text-slate-400 text-sm mt-1">Real-time interaction, live Q&A chat, polls, and instant doubt resolution</p>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <div class="bg-slate-50 dark:bg-slate-900 rounded-3xl p-6 border border-red-200 dark:border-red-900/50 shadow-sm relative overflow-hidden space-y-4">
        <div class="flex items-center justify-between">
          <span class="px-3 py-1 rounded-full bg-red-500 text-white text-xs font-bold flex items-center gap-1.5">
            <span class="w-2 h-2 rounded-full bg-white animate-ping"></span> LIVE NOW
          </span>
          <span class="text-xs font-semibold text-slate-500">📡 Zoom Meeting</span>
        </div>
        <h3 class="font-bold text-slate-900 dark:text-white text-base">Teaching Aptitude Complete Concept — UGC NET</h3>
        <p class="text-xs text-slate-500 dark:text-slate-400">Faculty: Dr. Priya Sharma · 340 Aspirants Watching</p>
        <a href="{{ route('login') }}" class="block w-full text-center py-3 rounded-xl bg-red-500 text-white font-bold text-xs hover:bg-red-600 transition-colors shadow">
          Join Live Class Now 🎥
        </a>
      </div>

      <div class="bg-slate-50 dark:bg-slate-900 rounded-3xl p-6 border border-slate-200 dark:border-slate-800 shadow-sm space-y-4">
        <div class="flex items-center justify-between">
          <span class="px-3 py-1 rounded-full bg-sky-100 dark:bg-sky-900/50 text-sky-600 dark:text-sky-300 text-xs font-bold">⏰ In 45 Minutes</span>
          <span class="text-xs font-semibold text-slate-500">📺 YouTube Live</span>
        </div>
        <h3 class="font-bold text-slate-900 dark:text-white text-base">Quantitative Aptitude Short Tricks — SSC CGL 2025</h3>
        <p class="text-xs text-slate-500 dark:text-slate-400">Faculty: Amit Verma Sir · Starts at 6:00 PM IST</p>
        <button onclick="alert('Reminder set!')" class="w-full py-3 rounded-xl border border-sky-300 dark:border-sky-700 text-sky-600 dark:text-sky-400 font-bold text-xs hover:bg-sky-50 dark:hover:bg-slate-800 transition-colors">
          🔔 Set Class Reminder
        </button>
      </div>

      <div class="bg-slate-50 dark:bg-slate-900 rounded-3xl p-6 border border-slate-200 dark:border-slate-800 shadow-sm space-y-4">
        <div class="flex items-center justify-between">
          <span class="px-3 py-1 rounded-full bg-sky-100 dark:bg-sky-900/50 text-sky-600 dark:text-sky-300 text-xs font-bold">⏰ In 2 Hours</span>
          <span class="text-xs font-semibold text-slate-500">📡 Zoom Meeting</span>
        </div>
        <h3 class="font-bold text-slate-900 dark:text-white text-base">General Studies Paper 1 Current Analysis — UPPSC</h3>
        <p class="text-xs text-slate-500 dark:text-slate-400">Faculty: Vikramaditya Sir · Starts at 7:30 PM IST</p>
        <button onclick="alert('Reminder set!')" class="w-full py-3 rounded-xl border border-sky-300 dark:border-sky-700 text-sky-600 dark:text-sky-400 font-bold text-xs hover:bg-sky-50 dark:hover:bg-slate-800 transition-colors">
          🔔 Set Class Reminder
        </button>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════
     SECTION 5: AI TOOLS SHOWCASE (6 Tools)
══════════════════════════════════════════════ -->
<section class="py-20 bg-slate-50 dark:bg-slate-900">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center max-w-3xl mx-auto mb-14">
      <span class="px-3.5 py-1.5 rounded-full bg-sky-100 dark:bg-sky-900/50 text-sky-600 dark:text-sky-300 text-xs font-bold uppercase tracking-wide">AI Powered Ecosystem</span>
      <h2 class="text-3xl sm:text-4xl font-black text-slate-900 dark:text-white mt-3">Smart AI Features / <span class="grad-text">AI सुविधाएं</span></h2>
      <p class="text-slate-600 dark:text-slate-400 text-sm mt-1">Next-gen artificial intelligence tools designed to accelerate your study pace</p>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <div class="bg-white dark:bg-slate-950 rounded-3xl p-6 border border-slate-200/80 dark:border-slate-800 shadow-sm space-y-3">
        <div class="w-12 h-12 rounded-2xl btn-grad text-white flex items-center justify-center text-xl shadow-md">🤖</div>
        <h3 class="font-bold text-slate-900 dark:text-white text-lg">AI Tutor / AI शिक्षक</h3>
        <p class="text-slate-600 dark:text-slate-400 text-xs leading-relaxed">24/7 personal tutor powered by GPT-4o. Ask doubts in Hindi or English and get instant answers.</p>
      </div>
      <div class="bg-white dark:bg-slate-950 rounded-3xl p-6 border border-slate-200/80 dark:border-slate-800 shadow-sm space-y-3">
        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-purple-500 to-indigo-600 text-white flex items-center justify-center text-xl shadow-md">🔍</div>
        <h3 class="font-bold text-slate-900 dark:text-white text-lg">Photo Doubt Solver</h3>
        <p class="text-slate-600 dark:text-slate-400 text-xs leading-relaxed">Snap a picture of any complex question. AI extracts text and solves it step-by-step.</p>
      </div>
      <div class="bg-white dark:bg-slate-950 rounded-3xl p-6 border border-slate-200/80 dark:border-slate-800 shadow-sm space-y-3">
        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 text-white flex items-center justify-center text-xl shadow-md">📅</div>
        <h3 class="font-bold text-slate-900 dark:text-white text-lg">Smart Study Planner</h3>
        <p class="text-slate-600 dark:text-slate-400 text-xs leading-relaxed">Generates a customized daily timetable based on your exam date and target score.</p>
      </div>
      <div class="bg-white dark:bg-slate-950 rounded-3xl p-6 border border-slate-200/80 dark:border-slate-800 shadow-sm space-y-3">
        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-orange-500 to-amber-600 text-white flex items-center justify-center text-xl shadow-md">📊</div>
        <h3 class="font-bold text-slate-900 dark:text-white text-lg">Performance Analytics</h3>
        <p class="text-slate-600 dark:text-slate-400 text-xs leading-relaxed">Identifies your weak topics, time spent per question, and predicts your expected exam rank.</p>
      </div>
      <div class="bg-white dark:bg-slate-950 rounded-3xl p-6 border border-slate-200/80 dark:border-slate-800 shadow-sm space-y-3">
        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 text-white flex items-center justify-center text-xl shadow-md">⚡</div>
        <h3 class="font-bold text-slate-900 dark:text-white text-lg">Instant Quiz Generator</h3>
        <p class="text-slate-600 dark:text-slate-400 text-xs leading-relaxed">Generate instant practice quizzes on any chapter or topic with customized difficulty.</p>
      </div>
      <div class="bg-white dark:bg-slate-950 rounded-3xl p-6 border border-slate-200/80 dark:border-slate-800 shadow-sm space-y-3">
        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-rose-500 to-red-600 text-white flex items-center justify-center text-xl shadow-md">📖</div>
        <h3 class="font-bold text-slate-900 dark:text-white text-lg">Auto Notes Summarizer</h3>
        <p class="text-slate-600 dark:text-slate-400 text-xs leading-relaxed">Converts 100-page PDF textbooks into concise 5-page revision mind maps in Hindi.</p>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════
     SECTION 6: APP DOWNLOAD CTA
══════════════════════════════════════════════ -->
<section class="py-20 bg-gradient-to-r from-slate-900 via-slate-950 to-slate-900 text-white">
  <div class="max-w-5xl mx-auto px-4 text-center space-y-6">
    <span class="text-5xl block">📱</span>
    <h2 class="text-3xl sm:text-5xl font-black">Download Our Mobile App / <span class="grad-text">ऐप डाउनलोड करें</span></h2>
    <p class="text-slate-400 text-base max-w-xl mx-auto">Study anywhere, download lectures for offline viewing, and get instant push notifications for live classes.</p>
    <div class="flex flex-wrap justify-center gap-4 pt-4">
      <button onclick="alert('App launch link: Google Play')" class="px-7 py-3.5 rounded-2xl bg-white/10 border border-white/20 hover:bg-white/20 transition-all flex items-center gap-3">
        <span class="text-2xl">▶</span>
        <div class="text-left"><p class="text-[10px] text-slate-300">GET IT ON</p><p class="font-bold text-sm">Google Play</p></div>
      </button>
      <button onclick="alert('App launch link: App Store')" class="px-7 py-3.5 rounded-2xl bg-white/10 border border-white/20 hover:bg-white/20 transition-all flex items-center gap-3">
        <span class="text-2xl">🍎</span>
        <div class="text-left"><p class="text-[10px] text-slate-300">DOWNLOAD ON</p><p class="font-bold text-sm">App Store</p></div>
      </button>
    </div>
  </div>
</section>

<script>
function switchHeroTab(tab) {
  document.getElementById('heroTabAi').classList.toggle('hidden', tab !== 'ai');
  document.getElementById('heroTabTest').classList.toggle('hidden', tab !== 'test');
  document.getElementById('tabBtnAi').className = tab === 'ai' ? 'px-3 py-1 rounded-lg bg-sky-500 text-white' : 'px-3 py-1 rounded-lg text-slate-600 dark:text-slate-300';
  document.getElementById('tabBtnTest').className = tab === 'test' ? 'px-3 py-1 rounded-lg bg-sky-500 text-white' : 'px-3 py-1 rounded-lg text-slate-600 dark:text-slate-300';
}
function selectHeroOption(btn, isCorrect) {
  document.getElementById('heroAnswerFeedback').classList.remove('hidden');
  btn.className = isCorrect ? 'w-full text-left p-3 rounded-xl bg-emerald-50 text-emerald-700 font-bold border border-emerald-300 text-xs' : 'w-full text-left p-3 rounded-xl bg-rose-50 text-rose-700 border border-rose-300 text-xs';
}
function setHeroSearch(val) {
  document.getElementById('heroSearchInput').value = val;
}
function performHeroSearch() {
  const val = document.getElementById('heroSearchInput').value;
  if(val) window.location.href = "{{ route('courses.index') }}?search=" + encodeURIComponent(val);
}
</script>

@endsection
