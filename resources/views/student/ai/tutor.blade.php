@extends('layouts.app')
@section('title', 'AI Tutor — Lo Samajh Lo')
@section('content')
<div class="bg-slate-50 dark:bg-slate-950 min-h-[85vh]">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="text-center mb-8">
      <span class="text-5xl block mb-3">🤖</span>
      <h1 class="text-3xl font-black text-slate-900 dark:text-white">Samajh AI Tutor</h1>
      <p class="text-slate-500 dark:text-slate-400 mt-1">Ask any doubt in Hindi or English · 24/7 AI assistance powered by GPT-4</p>
    </div>

    <!-- Chat Window -->
    <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 shadow-xl overflow-hidden">
      <!-- Messages Area -->
      <div id="chatMessages" class="h-[50vh] overflow-y-auto p-6 space-y-4">
        <!-- Welcome message -->
        <div class="flex gap-3">
          <div class="w-9 h-9 rounded-full btn-grad text-white flex items-center justify-center font-black text-sm flex-shrink-0">AI</div>
          <div class="bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl rounded-tl-none px-4 py-3 text-sm text-slate-700 dark:text-slate-200 max-w-lg">
            <p class="font-bold text-sky-600 dark:text-sky-400 mb-1">🤖 Samajh AI Tutor</p>
            <p>Namaste! 🙏 Main aapka AI Tutor hoon. Aap mujhse Hindi ya English mein koi bhi doubt pooch sakte hain — UGC NET, SSC, Banking, History, Economics, Education, Mathematics — sab kuch!</p>
          </div>
        </div>
      </div>

      <!-- Suggested Questions -->
      <div class="px-6 py-3 border-t border-slate-100 dark:border-slate-800">
        <p class="text-xs font-bold text-slate-400 mb-2">Quick Questions:</p>
        <div class="flex flex-wrap gap-2">
          @foreach(['UGC NET Teaching Aptitude kya hota hai?','SSC CGL ki taiyari kaise karein?','Formative evaluation explain karo','What is Bloom\'s Taxonomy?','Banking sector kise kehte hain?'] as $q)
          <button onclick="setQuestion('{{ addslashes($q) }}')" class="text-xs px-3 py-1.5 rounded-full bg-sky-50 dark:bg-slate-800 text-sky-600 dark:text-sky-400 border border-sky-200 dark:border-sky-800 hover:bg-sky-100 dark:hover:bg-slate-700 font-medium">{{ $q }}</button>
          @endforeach
        </div>
      </div>

      <!-- Input Area -->
      <div class="p-4 border-t border-slate-100 dark:border-slate-800 bg-white dark:bg-slate-900">
        <div class="flex items-end gap-3">
          <div class="flex-1 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl px-4 py-3">
            <textarea id="questionInput" rows="2" placeholder="Apna doubt yahan type karein (Hindi ya English mein)..." class="w-full bg-transparent text-sm text-slate-800 dark:text-white placeholder-slate-400 outline-none resize-none" onkeydown="if(event.ctrlKey&&event.key==='Enter')askAI()"></textarea>
          </div>
          <button onclick="askAI()" id="sendBtn" class="px-5 py-3 rounded-2xl btn-grad text-white font-bold text-sm shadow flex items-center gap-2">
            <span id="sendText">Ask AI</span>
          </button>
        </div>
        <p class="text-[10px] text-slate-400 mt-2 text-center">Ctrl+Enter to send · Responses are AI generated, verify important facts</p>
      </div>
    </div>
  </div>
</div>

<script>
const meta = document.querySelector('meta[name="csrf-token"]') || { content: '' };
function setQuestion(q) { document.getElementById('questionInput').value = q; }

async function askAI() {
  const input   = document.getElementById('questionInput');
  const question = input.value.trim();
  if (!question) return;

  const btn  = document.getElementById('sendBtn');
  const text = document.getElementById('sendText');
  btn.disabled = true; text.textContent = '...';

  // Add user message
  const chat = document.getElementById('chatMessages');
  chat.innerHTML += `<div class="flex gap-3 justify-end"><div class="bg-sky-500 text-white rounded-2xl rounded-tr-none px-4 py-2.5 text-sm max-w-lg">${question}</div><div class="w-8 h-8 rounded-full bg-sky-400 flex items-center justify-center text-white text-xs font-bold flex-shrink-0">You</div></div>`;
  chat.innerHTML += `<div id="typingIndicator" class="flex gap-3"><div class="w-9 h-9 rounded-full btn-grad text-white flex items-center justify-center font-black text-sm flex-shrink-0">AI</div><div class="bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl rounded-tl-none px-4 py-3 text-sm text-slate-500"><span class="animate-pulse">Samajh AI is thinking...</span></div></div>`;
  chat.scrollTop = chat.scrollHeight;
  input.value = '';

  try {
    const res  = await fetch("{{ route('student.ai-tutor.ask') }}", {
      method: 'POST',
      headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      body: JSON.stringify({ question })
    });
    const data = await res.json();
    document.getElementById('typingIndicator').outerHTML = `<div class="flex gap-3"><div class="w-9 h-9 rounded-full btn-grad text-white flex items-center justify-center font-black text-sm flex-shrink-0">AI</div><div class="bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl rounded-tl-none px-4 py-3 text-sm text-slate-700 dark:text-slate-200 max-w-xl whitespace-pre-wrap"><span class="font-bold text-sky-600 dark:text-sky-400 block mb-1">🤖 Samajh AI:</span>${data.answer}</div></div>`;
  } catch(e) {
    document.getElementById('typingIndicator').outerHTML = `<div class="flex gap-3"><div class="w-9 h-9 rounded-full bg-red-400 text-white flex items-center justify-center text-sm flex-shrink-0">AI</div><div class="bg-red-50 border border-red-200 rounded-2xl px-4 py-3 text-sm text-red-700">Sorry, unable to reach AI. Please try again.</div></div>`;
  }
  chat.scrollTop = chat.scrollHeight;
  btn.disabled = false; text.textContent = 'Ask AI';
}
</script>
@endsection
