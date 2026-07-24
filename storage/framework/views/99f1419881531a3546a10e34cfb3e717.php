<?php $__env->startSection('content'); ?>
<div class="min-h-[85vh] flex items-center justify-center bg-slate-50 dark:bg-slate-950 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl w-full bg-white dark:bg-slate-900 rounded-3xl overflow-hidden flex flex-col md:flex-row shadow-2xl border border-slate-200 dark:border-slate-800">
        
        <!-- Left Side: Visuals & Highlights (Dark Vibrant Slate Navy) -->
        <div class="w-full md:w-1/2 bg-gradient-to-br from-slate-900 via-slate-950 to-slate-900 p-8 sm:p-12 text-white flex flex-col justify-between relative overflow-hidden order-last md:order-first border-b md:border-b-0 md:border-r border-slate-800">
            <!-- Glowing Orbs -->
            <div class="absolute -top-20 -left-20 w-64 h-64 bg-sky-500/20 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute bottom-0 right-0 w-64 h-64 bg-blue-600/20 rounded-full blur-3xl pointer-events-none"></div>
            
            <div class="relative z-10 space-y-4">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-sky-500/20 border border-sky-400/30 text-sky-300 text-xs font-bold uppercase tracking-wider">
                    ✨ Join India's #1 Learning Engine
                </div>
                <h1 class="text-3xl sm:text-4xl font-black text-white leading-tight">
                    Start Your Journey<br>
                    <span class="grad-text">सफलता की ओर कदम बढ़ाएं</span>
                </h1>
                <p class="text-slate-300 text-sm leading-relaxed">
                    Join 5M+ students and crack your dream exam with India's top educators, live classes & AI doubt resolution.
                </p>
            </div>
            
            <div class="relative z-10 mt-8 space-y-4">
                <div class="flex items-center gap-3.5 bg-white/10 backdrop-blur-xl border border-white/15 p-3.5 rounded-2xl">
                    <div class="w-10 h-10 rounded-xl bg-sky-500/20 text-sky-400 flex items-center justify-center font-bold text-lg flex-shrink-0">🎯</div>
                    <div>
                        <p class="font-bold text-sm text-white">Goal-Oriented Batches</p>
                        <p class="text-xs text-slate-300">Structured BA, MA, NET & SSC syllabus</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-3.5 bg-white/10 backdrop-blur-xl border border-white/15 p-3.5 rounded-2xl">
                    <div class="w-10 h-10 rounded-xl bg-blue-500/20 text-blue-400 flex items-center justify-center font-bold text-lg flex-shrink-0">📝</div>
                    <div>
                        <p class="font-bold text-sm text-white">50,000+ Mock Tests & PYQs</p>
                        <p class="text-xs text-slate-300">Real NTA exam anti-cheat simulator</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-3.5 bg-white/10 backdrop-blur-xl border border-white/15 p-3.5 rounded-2xl">
                    <div class="w-10 h-10 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center font-bold text-lg flex-shrink-0">🌐</div>
                    <div>
                        <p class="font-bold text-sm text-white">Bilingual Content (Hindi + English)</p>
                        <p class="text-xs text-slate-300">Read notes & questions in your language</p>
                    </div>
                </div>
            </div>

            <div class="relative z-10 mt-8 pt-4 border-t border-white/10 text-xs text-slate-400">
                🔒 100% Secure SSL Registration · Trusted by 5,000,000+ Students
            </div>
        </div>

        <!-- Right Side: Registration Form -->
        <div class="w-full md:w-1/2 p-8 sm:p-12 bg-white dark:bg-slate-900 flex flex-col justify-center">
            <div class="text-center mb-8">
                <h2 class="text-2xl sm:text-3xl font-black text-slate-900 dark:text-white">Create an Account</h2>
                <p class="text-slate-500 dark:text-slate-400 text-xs mt-1">Join Lo Samajh Lo today for free</p>
            </div>

            <form action="<?php echo e(route('register')); ?>" method="POST" class="space-y-4">
                <?php echo csrf_field(); ?>
                <!-- Name Input -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">Full Name / पूरा नाम</label>
                    <input type="text" name="name" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-sky-400 outline-none text-sm font-medium transition-all" placeholder="e.g. Rahul Sharma">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Phone Input -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">Phone / फोन</label>
                        <input type="tel" name="phone" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-sky-400 outline-none text-sm font-medium transition-all" placeholder="9876543210">
                    </div>
                    <!-- Email Input -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">Email / ईमेल</label>
                        <input type="email" name="email" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-sky-400 outline-none text-sm font-medium transition-all" placeholder="you@example.com">
                    </div>
                </div>

                <!-- Target Exam Dropdown -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">Target Exam / लक्ष्य परीक्षा</label>
                    <select name="exam_target" class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-sky-400 outline-none text-sm font-medium transition-all">
                        <option value="" disabled selected>Select your target exam...</option>
                        <option value="ugc">UGC NET / JRF Paper 1 + 2</option>
                        <option value="ssc">SSC (CGL / CHSL / MTS)</option>
                        <option value="banking">Banking (IBPS PO / SBI)</option>
                        <option value="grad">Graduation (BA / B.Sc / B.Com)</option>
                        <option value="pg">Post Graduation (MA / M.Sc / M.Com)</option>
                        <option value="teaching">Teaching (CTET / UPTET / B.Ed)</option>
                        <option value="state">UPPSC / State PCS</option>
                    </select>
                </div>

                <!-- Password Input -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">Password / पासवर्ड</label>
                    <input type="password" name="password" required class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-sky-400 outline-none text-sm font-medium transition-all" placeholder="Create a strong password">
                </div>

                <div class="flex items-start gap-2 pt-1">
                    <input type="checkbox" id="terms" required class="mt-1 rounded text-sky-500 focus:ring-sky-400">
                    <label for="terms" class="text-xs text-slate-600 dark:text-slate-400">
                        I agree to the <a href="#" class="text-sky-500 font-bold hover:underline">Terms of Service</a> and <a href="#" class="text-sky-500 font-bold hover:underline">Privacy Policy</a>.
                    </label>
                </div>

                <button type="submit" class="w-full py-3.5 rounded-2xl btn-grad text-white font-bold text-sm shadow-lg shadow-sky-500/25 mt-2 transition-all">
                    Sign Up / रजिस्टर करें 🚀
                </button>
            </form>

            <p class="mt-6 text-center text-xs text-slate-500 dark:text-slate-400">
                Already have an account? <a href="<?php echo e(route('login')); ?>" class="font-bold text-sky-600 dark:text-sky-400 hover:underline">Log In</a>
            </p>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\atula\.gemini\antigravity\scratch\lo-samajh-lo\resources\views/auth/register.blade.php ENDPATH**/ ?>