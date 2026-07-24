@extends('layouts.app')
@section('title', 'Contact Us — Lo Samajh Lo')
@section('content')
<div class="bg-slate-50 dark:bg-slate-950 min-h-screen py-16">
  <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
      <h1 class="text-4xl font-black text-slate-900 dark:text-white">Contact Us / <span class="grad-text">संपर्क करें</span></h1>
      <p class="text-slate-500 dark:text-slate-400 mt-2">We're here to help. Reach us anytime!</p>
    </div>

    @if(session('success'))
    <div class="mb-6 p-4 bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-800 rounded-2xl text-emerald-700 dark:text-emerald-300 font-medium">
      ✅ {{ session('success') }}
    </div>
    @endif

    <div class="grid md:grid-cols-2 gap-10">
      <!-- Contact Info -->
      <div class="space-y-6">
        @foreach([['📧','Email','support@losamajhlo.in'],['📞','Phone','+91 9876543210'],['💬','WhatsApp','Chat with us on WhatsApp'],['⏰','Support Hours','Mon-Sat: 9 AM – 8 PM IST'],['📍','Address','Lo Samajh Lo Ed-Tech Pvt. Ltd., New Delhi, India 110001']] as [$icon,$label,$value])
        <div class="flex items-start gap-4">
          <span class="text-2xl flex-shrink-0">{{ $icon }}</span>
          <div>
            <p class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wide">{{ $label }}</p>
            <p class="text-slate-800 dark:text-white font-semibold text-sm mt-0.5">{{ $value }}</p>
          </div>
        </div>
        @endforeach
      </div>

      <!-- Contact Form -->
      <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 p-7 shadow-sm">
        <h2 class="font-bold text-slate-900 dark:text-white mb-5">Send a Message</h2>
        <form method="POST" action="{{ route('contact.send') }}" class="space-y-4">
          @csrf
          <div>
            <label class="block text-xs font-bold text-slate-600 dark:text-slate-300 mb-1">Full Name *</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-white text-sm outline-none focus:ring-2 focus:ring-sky-400" placeholder="Your name">
            @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
          </div>
          <div>
            <label class="block text-xs font-bold text-slate-600 dark:text-slate-300 mb-1">Email *</label>
            <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-white text-sm outline-none focus:ring-2 focus:ring-sky-400" placeholder="your@email.com">
          </div>
          <div>
            <label class="block text-xs font-bold text-slate-600 dark:text-slate-300 mb-1">Subject</label>
            <select name="subject" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-white text-sm outline-none focus:ring-2 focus:ring-sky-400">
              @foreach(['General Inquiry','Technical Support','Payment Issue','Course Query','Partnership','Report a Bug','Other'] as $s)
              <option>{{ $s }}</option>
              @endforeach
            </select>
          </div>
          <div>
            <label class="block text-xs font-bold text-slate-600 dark:text-slate-300 mb-1">Message *</label>
            <textarea name="message" rows="4" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-white text-sm outline-none focus:ring-2 focus:ring-sky-400 resize-none" placeholder="Describe your query...">{{ old('message') }}</textarea>
          </div>
          <button type="submit" class="w-full py-3.5 rounded-2xl btn-grad text-white font-bold shadow-md">Send Message 📤</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
