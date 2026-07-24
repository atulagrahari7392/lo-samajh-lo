<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Lo Samajh Lo — India\'s #1 Learning Platform')</title>
    
    <!-- Meta Tags -->
    <meta name="description" content="India's next-generation educational platform for Graduation, Post Graduation & Competitive Exams. Study smarter, score higher.">
    <meta property="og:title" content="Lo Samajh Lo — India's #1 Learning Platform">
    <meta property="og:description" content="Prepare for competitive exams with expert teachers and smart AI analytics.">
    
    <!-- Google Fonts (Inter) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        sky: { primary: '#38BDF8', light: '#E0F2FE', dark: '#0369A1' },
                        navy: { DEFAULT: '#0F172A', light: '#1E3A5F', mid: '#1E293B' },
                    }
                }
            }
        }
    </script>
    
    <style>
        * { font-family: 'Inter', sans-serif; }
        :root {
            --sky: #38BDF8; --navy: #0F172A;
            --grad: linear-gradient(135deg, #38BDF8 0%, #2563EB 50%, #7C3AED 100%);
        }
        .btn-grad { background: var(--grad); transition: all 0.25s ease; }
        .btn-grad:hover { opacity: 0.92; transform: translateY(-1px); box-shadow: 0 10px 25px rgba(56,189,248,0.35); }
        .grad-text { background: var(--grad); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
        .nav-link { position: relative; }
        .nav-link::after { content: ''; position: absolute; bottom: -4px; left: 0; width: 0; height: 2px; background: var(--grad); border-radius: 99px; transition: width 0.25s ease; }
        .nav-link:hover::after { width: 100%; }
        .glass-header { background: rgba(255, 255, 255, 0.92); backdrop-filter: blur(20px); border-bottom: 1px solid rgba(226, 232, 240, 0.8); }
        .dark .glass-header { background: rgba(15, 23, 42, 0.92); border-bottom-color: rgba(51, 65, 85, 0.8); }
    </style>
</head>
<body class="bg-slate-50 dark:bg-slate-950 text-slate-800 dark:text-slate-100 antialiased selection:bg-sky-400 selection:text-white">

    <!-- ══════════════════════════════════════════════
         STICKY NAVBAR (Exact Light Glassmorphic Design)
    ══════════════════════════════════════════════ -->
    <header class="fixed top-0 inset-x-0 z-50 transition-all duration-300 glass-header py-3.5 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">

            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 group">
                <div class="w-10 h-10 rounded-xl btn-grad flex items-center justify-center shadow-md shadow-sky-500/20 group-hover:scale-105 transition-transform">
                    <span class="text-white font-black text-base tracking-tighter">LS</span>
                </div>
                <div>
                    <span class="font-black text-xl text-slate-900 dark:text-white leading-none block">Lo Samajh Lo</span>
                    <p class="text-[9px] text-sky-500 font-bold tracking-wider uppercase leading-none mt-0.5">लो समझ लो</p>
                </div>
            </a>

            <!-- Desktop Nav Items -->
            <nav class="hidden lg:flex items-center gap-7 text-sm font-semibold text-slate-700 dark:text-slate-200">
                <a href="{{ route('home') }}" class="nav-link hover:text-sky-500 transition-colors">Home</a>
                
                <!-- Courses Dropdown -->
                <div class="relative group py-2">
                    <a href="{{ route('courses.index') }}" class="nav-link hover:text-sky-500 transition-colors flex items-center gap-1">
                        Courses
                        <svg class="w-3.5 h-3.5 text-slate-400 group-hover:rotate-180 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="m6 9 6 6 6-6"/></svg>
                    </a>
                    <!-- Mega Menu -->
                    <div class="absolute top-full left-1/2 -translate-x-1/2 mt-1 w-[550px] bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 rounded-2xl p-6 shadow-2xl grid grid-cols-2 gap-6">
                        <div>
                            <h4 class="font-bold text-xs uppercase tracking-wider text-sky-600 dark:text-sky-400 mb-3 border-b border-slate-100 dark:border-slate-800 pb-2">Academic / एकेडमिक</h4>
                            <ul class="space-y-2.5 text-xs font-medium">
                                <li><a href="{{ route('courses.index') }}?cat=graduation" class="text-slate-600 dark:text-slate-300 hover:text-sky-500 block">🎓 BA / B.Sc / B.Com Degree</a></li>
                                <li><a href="{{ route('courses.index') }}?cat=pg" class="text-slate-600 dark:text-slate-300 hover:text-sky-500 block">🏛️ MA / M.Sc / M.Com Masters</a></li>
                                <li><a href="{{ route('courses.index') }}?cat=cuet" class="text-slate-600 dark:text-slate-300 hover:text-sky-500 block">🎯 CUET Entrance Prep</a></li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-bold text-xs uppercase tracking-wider text-sky-600 dark:text-sky-400 mb-3 border-b border-slate-100 dark:border-slate-800 pb-2">Competitive / प्रतियोगी</h4>
                            <ul class="space-y-2.5 text-xs font-medium">
                                <li><a href="{{ route('courses.index') }}?cat=ugc-net" class="text-slate-600 dark:text-slate-300 hover:text-sky-500 block">📚 UGC NET / JRF Paper 1 + 2</a></li>
                                <li><a href="{{ route('courses.index') }}?cat=ssc" class="text-slate-600 dark:text-slate-300 hover:text-sky-500 block">📊 SSC CGL / CHSL / MTS</a></li>
                                <li><a href="{{ route('courses.index') }}?cat=banking" class="text-slate-600 dark:text-slate-300 hover:text-sky-500 block">🏦 Banking IBPS PO & SBI</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <a href="{{ route('tests.index') }}" class="nav-link hover:text-sky-500 transition-colors">Test Series</a>
                <a href="#live" class="nav-link hover:text-sky-500 transition-colors">Live Classes</a>
                <a href="#notes" class="nav-link hover:text-sky-500 transition-colors">Notes</a>
                <a href="{{ route('current-affairs.index') }}" class="nav-link hover:text-sky-500 transition-colors">Current Affairs</a>
                <a href="{{ route('blog.index') }}" class="nav-link hover:text-sky-500 transition-colors">Blog</a>
            </nav>

            <!-- Actions (Dark Toggle + Login + Start Free) -->
            <div class="flex items-center gap-3">
                
                <!-- Dark Mode Toggle Button -->
                <button onclick="toggleDarkMode()" class="w-9 h-9 rounded-xl bg-slate-100 dark:bg-slate-800 hover:bg-sky-50 dark:hover:bg-slate-700 flex items-center justify-center text-slate-600 dark:text-slate-300 transition-colors" title="Toggle Theme">
                    <svg id="themeMoonIcon" class="w-4 h-4 dark:hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
                    <svg id="themeSunIcon" class="w-4 h-4 hidden dark:block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
                </button>

                <!-- Language Toggle -->
                <a href="{{ route('lang.switch', app()->getLocale() === 'en' ? 'hi' : 'en') }}" class="px-2.5 py-1 rounded-lg bg-sky-50 dark:bg-slate-800 text-sky-600 dark:text-sky-400 font-bold text-xs hover:bg-sky-100 transition-colors">
                    {{ app()->getLocale() === 'en' ? 'हिन्दी' : 'EN' }}
                </a>

                <!-- Login Button -->
                <a href="{{ route('login') }}" class="px-5 py-2.5 rounded-2xl font-bold text-xs text-sky-600 dark:text-sky-400 border border-sky-300 dark:border-sky-700 hover:bg-sky-50 dark:hover:bg-slate-800 transition-all">
                    Login / लॉगिन
                </a>

                <!-- Start Free Button -->
                <a href="{{ route('register') }}" class="px-5 py-2.5 rounded-2xl font-bold text-xs text-white btn-grad shadow-lg shadow-sky-500/25">
                    Start Free / मुफ्त शुरू
                </a>

                <!-- Mobile Hamburger Button -->
                <button onclick="toggleMobileNav()" class="lg:hidden w-9 h-9 rounded-xl bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-700 dark:text-slate-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 12h18M3 6h18M3 18h18"/></svg>
                </button>
            </div>
        </div>

        <!-- Mobile Drawer -->
        <div id="mobileDrawer" class="hidden lg:hidden bg-white dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800 mt-3 px-4 py-4 space-y-3">
            <a href="{{ route('home') }}" class="block py-2 text-sm font-semibold text-slate-700 dark:text-slate-200">🏠 Home</a>
            <a href="{{ route('courses.index') }}" class="block py-2 text-sm font-semibold text-slate-700 dark:text-slate-200">📚 Courses</a>
            <a href="{{ route('tests.index') }}" class="block py-2 text-sm font-semibold text-slate-700 dark:text-slate-200">📝 Test Series</a>
            <a href="{{ route('current-affairs.index') }}" class="block py-2 text-sm font-semibold text-slate-700 dark:text-slate-200">📄 Current Affairs</a>
            <a href="{{ route('register') }}" class="block w-full text-center py-3 rounded-xl font-bold text-xs text-white btn-grad">Start Free Trial</a>
        </div>
    </header>

    <!-- ══════════════════════════════════════════════
         MAIN CONTENT AREA
    ══════════════════════════════════════════════ -->
    <main class="pt-16">
        @yield('content')
    </main>

    <!-- ══════════════════════════════════════════════
         FOOTER (Comprehensive 4-Column Layout)
    ══════════════════════════════════════════════ -->
    <footer class="bg-slate-900 text-slate-400 py-16 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-10 mb-12">
                
                <!-- Brand Info -->
                <div class="lg:col-span-2 space-y-4">
                    <div class="flex items-center gap-2.5">
                        <div class="w-9 h-9 rounded-xl btn-grad flex items-center justify-center font-black text-white text-sm">LS</div>
                        <span class="font-black text-xl text-white">Lo Samajh Lo</span>
                    </div>
                    <p class="text-sm text-slate-400 leading-relaxed max-w-sm">
                        India's premier AI-assisted educational ecosystem. Empowers graduation, post-graduation, and competitive exam aspirants with top educators and instant analytics.
                    </p>
                    <div class="flex items-center gap-3 pt-2">
                        <a href="#" class="w-9 h-9 rounded-xl bg-slate-800 hover:bg-sky-500 text-slate-300 hover:text-white flex items-center justify-center transition-colors text-sm">𝕏</a>
                        <a href="#" class="w-9 h-9 rounded-xl bg-slate-800 hover:bg-blue-600 text-slate-300 hover:text-white flex items-center justify-center transition-colors text-sm">f</a>
                        <a href="#" class="w-9 h-9 rounded-xl bg-slate-800 hover:bg-pink-600 text-slate-300 hover:text-white flex items-center justify-center transition-colors text-sm">in</a>
                        <a href="#" class="w-9 h-9 rounded-xl bg-slate-800 hover:bg-red-600 text-slate-300 hover:text-white flex items-center justify-center transition-colors text-sm">▶</a>
                    </div>
                </div>

                <!-- Column 1: Courses -->
                <div>
                    <h4 class="text-white font-bold text-sm mb-4">Top Exam Prep</h4>
                    <ul class="space-y-2.5 text-xs">
                        <li><a href="#" class="hover:text-sky-400 transition-colors">UGC NET Paper 1</a></li>
                        <li><a href="#" class="hover:text-sky-400 transition-colors">SSC CGL Tier 1 & 2</a></li>
                        <li><a href="#" class="hover:text-sky-400 transition-colors">Banking IBPS & SBI PO</a></li>
                        <li><a href="#" class="hover:text-sky-400 transition-colors">Railway RRB NTPC</a></li>
                        <li><a href="#" class="hover:text-sky-400 transition-colors">CTET & UPTET Teaching</a></li>
                    </ul>
                </div>

                <!-- Column 2: Platform Features -->
                <div>
                    <h4 class="text-white font-bold text-sm mb-4">Platform Features</h4>
                    <ul class="space-y-2.5 text-xs">
                        <li><a href="{{ route('tests.index') }}" class="hover:text-sky-400 transition-colors">Mock Test Series</a></li>
                        <li><a href="#" class="hover:text-sky-400 transition-colors">Live Interactive Classes</a></li>
                        <li><a href="#" class="hover:text-sky-400 transition-colors">Free PDF Notes Library</a></li>
                        <li><a href="{{ route('current-affairs.index') }}" class="hover:text-sky-400 transition-colors">Daily Current Affairs</a></li>
                        <li><a href="#" class="hover:text-sky-400 transition-colors">AI Tutor Doubt Solver</a></li>
                    </ul>
                </div>

                <!-- Column 3: Company & Legal -->
                <div>
                    <h4 class="text-white font-bold text-sm mb-4">Company & Support</h4>
                    <ul class="space-y-2.5 text-xs">
                        <li><a href="{{ route('about') }}" class="hover:text-sky-400 transition-colors">About Lo Samajh Lo</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-sky-400 transition-colors">Help & Contact Us</a></li>
                        <li><a href="{{ route('blog.index') }}" class="hover:text-sky-400 transition-colors">Latest Articles</a></li>
                        <li><a href="#" class="hover:text-sky-400 transition-colors">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-sky-400 transition-colors">Terms of Service</a></li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Copyright bar -->
            <div class="border-t border-slate-800 pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs">
                <p>© {{ date('Y') }} Lo Samajh Lo. All rights reserved. | GST: 09AABCU9603R1ZV</p>
                <p class="grad-text font-bold">Made with ❤️ for Indian Students 🇮🇳</p>
            </div>
        </div>
    </footer>

    <!-- Global Scripts -->
    <script>
        function toggleDarkMode() {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
        }
        function toggleMobileNav() {
            document.getElementById('mobileDrawer').classList.toggle('hidden');
        }
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        }
    </script>
    @stack('scripts')
</body>
</html>
