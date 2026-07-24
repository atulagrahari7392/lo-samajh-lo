<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $test->title }} — Test Attempt | Lo Samajh Lo</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script>tailwind.config={darkMode:'class',theme:{extend:{fontFamily:{sans:['Inter','sans-serif']}}}}</script>
<style>
  * { font-family: 'Inter', sans-serif; }
  .grad { background: linear-gradient(135deg,#38BDF8,#2563EB); }
  .opt-btn { @apply w-full text-left p-3.5 rounded-xl border border-slate-200 dark:border-slate-700 text-sm font-medium text-slate-700 dark:text-slate-200 hover:border-sky-400 transition-all cursor-pointer; }
  .opt-selected { border-color:#38BDF8!important; background:#EFF6FF; color:#1E40AF; }
  .dark .opt-selected { background:#1E3A5F!important; color:#BAE6FD!important; }
  .pal-btn { width:32px;height:32px;border-radius:8px;font-size:11px;font-weight:700;cursor:pointer;border:2px solid transparent;transition:all .15s; }
  .pal-green { background:#10B981;color:#fff; }
  .pal-red   { background:#EF4444;color:#fff; }
  .pal-purple{ background:#8B5CF6;color:#fff; }
  .pal-gray  { background:#E2E8F0;color:#475569; }
  .dark .pal-gray { background:#334155;color:#CBD5E1; }
</style>
</head>
<body class="bg-slate-100 dark:bg-slate-950 antialiased">

<!-- TOP TEST BAR -->
<div class="fixed top-0 inset-x-0 z-50 bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 shadow-sm h-14 flex items-center px-4 gap-4">
  <div class="flex-1 flex items-center gap-3">
    <div class="w-7 h-7 rounded-lg grad flex items-center justify-center font-black text-white text-xs">LS</div>
    <span class="font-bold text-sm text-slate-900 dark:text-white line-clamp-1">{{ $test->title }}</span>
  </div>
  <!-- Timer -->
  <div class="flex items-center gap-2 bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-800 px-4 py-1.5 rounded-xl">
    <span class="text-red-500 text-xs">⏰</span>
    <span id="timer" class="font-black text-red-600 dark:text-red-400 font-mono text-base">{{ sprintf('%02d:%02d', intdiv($test->duration_minutes, 60) > 0 ? intdiv($test->duration_minutes, 60) : 0, $test->duration_minutes % 60) }}:00</span>
  </div>
  <button onclick="if(confirm('Submit test now?')){document.getElementById('submitForm').submit()}" class="px-4 py-1.5 rounded-xl grad text-white font-bold text-xs shadow">Submit Test</button>
</div>

<div class="pt-14 min-h-screen flex">

  <!-- QUESTION AREA (Left) -->
  <div class="flex-1 max-w-3xl mx-auto px-4 py-8">
    <form id="testForm" action="{{ route('student.tests.submit', $test->id) }}" method="POST">
      @csrf
      <input type="hidden" name="time_taken" id="timeTakenInput" value="0">

      @foreach($test->questions as $qi => $question)
      <div id="q_{{ $question->id }}" class="{{ $qi > 0 ? 'hidden' : '' }} bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 shadow-sm p-6 space-y-5">
        <!-- Question Header -->
        <div class="flex items-start justify-between gap-4">
          <div class="flex-1">
            <p class="text-xs font-bold text-sky-600 dark:text-sky-400 mb-1">Question {{ $qi+1 }} of {{ $test->questions->count() }} · {{ $question->marks }} Mark{{ $question->marks>1?'s':'' }}</p>
            <p class="text-slate-900 dark:text-white font-medium text-base leading-relaxed">{!! $question->question_text !!}</p>
          </div>
          <button type="button" onclick="markReview({{ $question->id }})" id="rev_{{ $question->id }}" class="px-3 py-1.5 rounded-lg border border-purple-300 dark:border-purple-700 text-purple-600 dark:text-purple-400 text-xs font-bold hover:bg-purple-50 flex-shrink-0">🔖 Review</button>
        </div>

        <!-- Options -->
        <div class="space-y-2.5">
          @foreach($question->options as $oi => $option)
          <label class="opt-btn flex items-start gap-3 group" id="optLabel_{{ $question->id }}_{{ $option->id }}">
            <input type="{{ in_array($question->type,['multiple']) ? 'checkbox' : 'radio' }}" name="answers[{{ $question->id }}]{{ in_array($question->type,['multiple'])?'[]':'' }}" value="{{ $option->id }}" class="mt-0.5 flex-shrink-0 text-sky-500 focus:ring-sky-400" onchange="selectOption({{ $question->id }})">
            <span>{{ ['A','B','C','D','E'][$oi] }}. {!! $option->option_text !!}</span>
          </label>
          @endforeach
        </div>

        <!-- Navigation Buttons -->
        <div class="flex items-center justify-between pt-4 border-t border-slate-100 dark:border-slate-800">
          <button type="button" onclick="goTo({{ $qi }})" class="{{ $qi===0?'opacity-50 cursor-not-allowed':'' }} px-5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-200 font-bold text-sm hover:border-sky-300" {{ $qi===0?'disabled':'' }}>← Previous</button>
          <button type="button" onclick="clearAnswer({{ $question->id }})" class="px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 text-slate-500 dark:text-slate-400 text-xs">Clear</button>
          @if($qi < $test->questions->count()-1)
          <button type="button" onclick="goTo({{ $qi+2 }})" class="px-5 py-2.5 rounded-xl grad text-white font-bold text-sm shadow">Next →</button>
          @else
          <button type="button" onclick="if(confirm('Submit test now?')){document.getElementById('testForm').submit()}" class="px-5 py-2.5 rounded-xl bg-emerald-500 text-white font-bold text-sm shadow">Submit ✓</button>
          @endif
        </div>
      </div>
      @endforeach
    </form>

    <!-- Hidden submit form -->
    <form id="submitForm" action="{{ route('student.tests.submit', $test->id) }}" method="POST" style="display:none">
      @csrf
      <input type="hidden" name="time_taken" id="timeTakenHidden" value="0">
    </form>
  </div>

  <!-- QUESTION PALETTE (Right Sidebar) -->
  <div class="hidden lg:block w-64 flex-shrink-0 p-4 pt-8">
    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm p-4 sticky top-20">
      <h3 class="font-bold text-sm text-slate-900 dark:text-white mb-3">Question Palette</h3>
      <div class="grid grid-cols-5 gap-1.5 mb-4">
        @foreach($test->questions as $qi => $question)
        <button type="button" onclick="goTo({{ $qi+1 }})" id="pal_{{ $question->id }}" class="pal-btn pal-gray">{{ $qi+1 }}</button>
        @endforeach
      </div>
      <div class="space-y-1.5 text-xs">
        <div class="flex items-center gap-2"><span class="w-4 h-4 rounded pal-green inline-block"></span> Answered</div>
        <div class="flex items-center gap-2"><span class="w-4 h-4 rounded pal-red inline-block"></span> Not Answered</div>
        <div class="flex items-center gap-2"><span class="w-4 h-4 rounded pal-purple inline-block"></span> Marked Review</div>
        <div class="flex items-center gap-2"><span class="w-4 h-4 rounded pal-gray inline-block"></span> Not Visited</div>
      </div>
    </div>
  </div>

</div>

<script>
let currentQ = 1;
let totalTime = {{ $test->duration_minutes * 60 }};
let elapsed   = 0;
const questions = @json($test->questions->pluck('id')->values());

// Timer
const timerEl = document.getElementById('timer');
const interval = setInterval(() => {
  elapsed++;
  let remaining = totalTime - elapsed;
  if (remaining <= 0) { clearInterval(interval); document.getElementById('submitForm').submit(); return; }
  let h = Math.floor(remaining/3600), m = Math.floor((remaining%3600)/60), s = remaining%60;
  timerEl.textContent = (h>0?String(h).padStart(2,'0')+':':'')+String(m).padStart(2,'0')+':'+String(s).padStart(2,'0');
  if (remaining <= 300) timerEl.classList.add('text-red-600');
  document.getElementById('timeTakenInput').value = elapsed;
  document.getElementById('timeTakenHidden').value = elapsed;
}, 1000);

function goTo(n) {
  if(n<1||n>questions.length) return;
  document.getElementById('q_'+questions[currentQ-1]).classList.add('hidden');
  currentQ = n;
  document.getElementById('q_'+questions[currentQ-1]).classList.remove('hidden');
  // mark palette visited
  let palBtn = document.getElementById('pal_'+questions[currentQ-1]);
  if(palBtn.classList.contains('pal-gray')) { palBtn.classList.remove('pal-gray'); palBtn.classList.add('pal-red'); }
}

function selectOption(qId) {
  let palBtn = document.getElementById('pal_'+qId);
  palBtn.className = 'pal-btn pal-green';
}

function clearAnswer(qId) {
  document.querySelectorAll(`input[name^="answers[${qId}]"]`).forEach(el => el.checked=false);
  let palBtn = document.getElementById('pal_'+qId);
  palBtn.className = 'pal-btn pal-red';
}

function markReview(qId) {
  let palBtn = document.getElementById('pal_'+qId);
  palBtn.className = 'pal-btn pal-purple';
}

// Init first question as visited
if(questions.length) { let p = document.getElementById('pal_'+questions[0]); if(p) { p.classList.remove('pal-gray'); p.classList.add('pal-red'); } }
</script>
</body>
</html>
