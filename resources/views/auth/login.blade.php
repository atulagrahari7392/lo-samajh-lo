@extends('layouts.app')
@section('title', 'Login — Lo Samajh Lo')
@section('content')
<div class="min-h-[85vh] flex items-center justify-center bg-slate-50 dark:bg-slate-950 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl w-full bg-white dark:bg-slate-900 rounded-3xl overflow-hidden flex flex-col md:flex-row shadow-2xl border border-slate-200 dark:border-slate-800">

        <!-- Left Side: Dark Navy Visual Panel -->
        <div class="w-full md:w-1/2 bg-gradient-to-br from-slate-900 via-slate-950 to-slate-900 p-8 sm:p-12 text-white flex flex-col justify-between relative overflow-hidden border-b md:border-b-0 md:border-r border-slate-800">
            <!-- Glowing Orbs -->
            <div class="absolute -top-20 -left-20 w-64 h-64 bg-sky-500/20 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute bottom-0 right-0 w-64 h-64 bg-blue-600/20 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10 space-y-5">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-sky-500/20 border border-sky-400/30 text-sky-300 text-xs font-bold uppercase tracking-wider">
                    👋 Welcome Back / वापस स्वागत है
                </div>
                <h1 class="text-3xl sm:text-4xl font-black text-white leading-tight">
                    Log In to<br><span class="grad-text">Lo Samajh Lo</span>
                </h1>
                <p class="text-slate-300 text-sm leading-relaxed">
                    अपने courses, test series, और AI doubt sessions resume करें।
                </p>
            </div>

            <div class="relative z-10 mt-8 space-y-3">
                @foreach([
                    ['🤖', 'AI Tutor 24/7', 'Hindi & English mein doubt clear karo'],
                    ['📝', 'Test Engine', '50,000+ questions, instant results'],
                    ['🏆', 'Leaderboard', 'Top rank achieve karo']
                ] as [$icon, $title, $desc])
                <div class="flex items-center gap-3 bg-white/8 backdrop-blur rounded-xl p-3 border border-white/10">
                    <span class="text-2xl w-9 flex-shrink-0 text-center">{{ $icon }}</span>
                    <div>
                        <p class="font-bold text-sm text-white">{{ $title }}</p>
                        <p class="text-xs text-slate-400">{{ $desc }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="relative z-10 mt-6 pt-4 border-t border-white/10 text-xs text-slate-400">
                🔒 256-Bit Encrypted · Secure Login
            </div>
        </div>

        <!-- Right Side: Login Form -->
        <div class="w-full md:w-1/2 p-8 sm:p-12 bg-white dark:bg-slate-900 flex flex-col justify-center">
            <div class="text-center mb-8">
                <h2 class="text-2xl sm:text-3xl font-black text-slate-900 dark:text-white">Sign In</h2>
                <p class="text-slate-500 dark:text-slate-400 text-xs mt-1">अपना अकाउंट access करें</p>
            </div>

            {{-- Session Error --}}
            @if(session('error'))
            <div class="mb-4 p-3 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-xl text-red-700 dark:text-red-300 text-sm">
                ⚠️ {{ session('error') }}
            </div>
            @endif

            {{-- Success --}}
            @if(session('success'))
            <div class="mb-4 p-3 bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-800 rounded-xl text-emerald-700 dark:text-emerald-300 text-sm">
                ✅ {{ session('success') }}
            </div>
            @endif

            {{-- Validation Errors --}}
            @if($errors->any())
            <div class="mb-4 p-3 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-xl text-red-700 dark:text-red-300 text-sm space-y-1">
                @foreach($errors->all() as $error)
                    <p>⚠️ {{ $error }}</p>
                @endforeach
            </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf

                {{-- Email/Phone Field — IMPORTANT: name must be "login" --}}
                <div>
                    <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">
                        Email Address / ईमेल
                    </label>
                    <input
                        type="email"
                        name="login"
                        value="{{ old('login') }}"
                        required
                        autofocus
                        class="w-full px-4 py-3 rounded-xl border @error('login') border-red-400 @else border-slate-300 dark:border-slate-700 @enderror bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-sky-400 outline-none text-sm font-medium transition-all"
                        placeholder="admin@test.com"
                    >
                </div>

                {{-- Password --}}
                <div>
                    <div class="flex justify-between items-center mb-1.5">
                        <label class="block text-xs font-bold text-slate-700 dark:text-slate-300">Password / पासवर्ड</label>
                        <a href="{{ route('password.request') }}" class="text-xs text-sky-500 hover:underline font-bold">Forgot?</a>
                    </div>
                    <div class="relative">
                        <input
                            type="password"
                            name="password"
                            id="passwordField"
                            required
                            class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-sky-400 outline-none text-sm font-medium transition-all pr-12"
                            placeholder="••••••••"
                        >
                        <button type="button" onclick="togglePwd()" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-700 dark:hover:text-white text-xs font-bold" id="pwdToggle">Show</button>
                    </div>
                </div>

                {{-- Remember me --}}
                <div class="flex items-center gap-2">
                    <input type="checkbox" name="remember" id="remember" value="1" class="rounded text-sky-500 focus:ring-sky-400">
                    <label for="remember" class="text-xs text-slate-600 dark:text-slate-400 cursor-pointer">Remember me for 30 days</label>
                </div>

                <button type="submit" class="w-full py-3.5 rounded-2xl btn-grad text-white font-bold text-sm shadow-lg shadow-sky-500/25 mt-2 transition-all hover:opacity-90 hover:scale-[0.99]">
                    Log In / लॉगिन करें 🚀
                </button>
            </form>

            {{-- Divider --}}
            <div class="mt-5 flex items-center gap-3">
                <div class="flex-1 border-t border-slate-200 dark:border-slate-800"></div>
                <span class="text-xs font-bold text-slate-400">OR</span>
                <div class="flex-1 border-t border-slate-200 dark:border-slate-800"></div>
            </div>

            {{-- Google --}}
            <a href="{{ route('auth.google') }}" class="mt-4 flex items-center justify-center gap-3 px-4 py-2.5 border border-slate-300 dark:border-slate-700 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 transition text-slate-700 dark:text-slate-200 font-semibold text-sm">
                <svg class="w-4 h-4" viewBox="0 0 24 24"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
                Continue with Google
            </a>

            <p class="mt-5 text-center text-xs text-slate-500 dark:text-slate-400">
                New here? <a href="{{ route('register') }}" class="font-bold text-sky-600 dark:text-sky-400 hover:underline">Create free account</a>
            </p>

            {{-- Quick Demo Logins --}}
            <div class="mt-5 p-3 bg-sky-50 dark:bg-sky-900/20 border border-sky-200 dark:border-sky-800 rounded-xl">
                <p class="text-[10px] font-black text-sky-700 dark:text-sky-300 mb-2 uppercase tracking-wide">🧪 Quick Demo Login:</p>
                <div class="space-y-1.5">
                    <button onclick="fillDemo('admin@test.com','password')" class="w-full text-left text-xs px-3 py-1.5 rounded-lg bg-white dark:bg-slate-800 border border-sky-200 dark:border-sky-800 text-slate-700 dark:text-slate-200 hover:border-sky-400 transition font-medium">
                        🔴 Admin: admin@test.com / password
                    </button>
                    <button onclick="fillDemo('teacher@test.com','password')" class="w-full text-left text-xs px-3 py-1.5 rounded-lg bg-white dark:bg-slate-800 border border-sky-200 dark:border-sky-800 text-slate-700 dark:text-slate-200 hover:border-sky-400 transition font-medium">
                        🟡 Teacher: teacher@test.com / password
                    </button>
                    <button onclick="fillDemo('student@test.com','password')" class="w-full text-left text-xs px-3 py-1.5 rounded-lg bg-white dark:bg-slate-800 border border-sky-200 dark:border-sky-800 text-slate-700 dark:text-slate-200 hover:border-sky-400 transition font-medium">
                        🟢 Student: student@test.com / password
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function fillDemo(email, pass) {
    document.querySelector('input[name="login"]').value = email;
    document.querySelector('input[name="password"]').value = pass;
}
function togglePwd() {
    const f = document.getElementById('passwordField');
    const b = document.getElementById('pwdToggle');
    f.type = f.type === 'password' ? 'text' : 'password';
    b.textContent = f.type === 'password' ? 'Show' : 'Hide';
}
</script>
@endsection
