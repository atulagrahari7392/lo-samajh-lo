@extends('layouts.dashboard')
@section('title', 'Achievements')
@section('content')
<div class="space-y-6">
    <div class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl p-8 text-white flex flex-col md:flex-row justify-between items-center shadow-md">
        <div>
            <h1 class="text-3xl font-black mb-2" x-text="lang === 'en' ? 'Achievements & Badges' : 'उपलब्धियां और बैज'"></h1>
            <p class="text-indigo-100">You've earned 4 badges so far. Keep going!</p>
        </div>
        <div class="bg-white/20 p-4 rounded-xl backdrop-blur-sm flex items-center gap-4 mt-4 md:mt-0">
            <div class="text-center">
                <p class="text-indigo-100 text-sm">Total Points</p>
                <p class="text-2xl font-bold">420</p>
            </div>
            <div class="h-10 w-px bg-white/30"></div>
            <div class="text-center">
                <p class="text-indigo-100 text-sm">Badges</p>
                <p class="text-2xl font-bold">4/20</p>
            </div>
        </div>
    </div>

    <h2 class="text-xl font-bold dark:text-white mt-8 mb-4">Your Badges</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <!-- Unlocked -->
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-yellow-200 dark:border-yellow-900/50 text-center relative overflow-hidden group">
            <div class="absolute inset-0 bg-gradient-to-br from-yellow-50 to-transparent dark:from-yellow-900/20 opacity-0 group-hover:opacity-100 transition"></div>
            <div class="w-16 h-16 mx-auto bg-gradient-to-br from-yellow-300 to-yellow-500 rounded-full flex items-center justify-center text-white text-2xl shadow-lg shadow-yellow-500/40 mb-3 relative z-10">
                <i class="fas fa-rocket"></i>
            </div>
            <h3 class="font-bold text-gray-900 dark:text-white mb-1 relative z-10">First Step</h3>
            <p class="text-xs text-gray-500 relative z-10">Attempted your first test</p>
            <div class="mt-3 text-xs font-bold text-yellow-600 bg-yellow-50 rounded-full py-1 relative z-10">Unlocked</div>
        </div>
        
        <!-- Unlocked -->
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-blue-200 dark:border-blue-900/50 text-center relative overflow-hidden group">
            <div class="w-16 h-16 mx-auto bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center text-white text-2xl shadow-lg shadow-blue-500/40 mb-3 relative z-10">
                <i class="fas fa-fire"></i>
            </div>
            <h3 class="font-bold text-gray-900 dark:text-white mb-1 relative z-10">7 Day Streak</h3>
            <p class="text-xs text-gray-500 relative z-10">Studied for 7 days in a row</p>
            <div class="mt-3 text-xs font-bold text-blue-600 bg-blue-50 rounded-full py-1 relative z-10">Unlocked</div>
        </div>

        <!-- Locked -->
        <div class="bg-gray-50 dark:bg-gray-800/50 rounded-xl p-6 border border-gray-200 dark:border-gray-700 text-center opacity-70">
            <div class="w-16 h-16 mx-auto bg-gray-200 dark:bg-gray-700 rounded-full flex items-center justify-center text-gray-400 text-2xl mb-3">
                <i class="fas fa-trophy"></i>
            </div>
            <h3 class="font-bold text-gray-600 dark:text-gray-400 mb-1">Topper</h3>
            <p class="text-xs text-gray-500">Score 100% in any Mock Test</p>
            <div class="w-full bg-gray-200 rounded-full h-1.5 mt-4 dark:bg-gray-700">
                <div class="bg-gray-400 h-1.5 rounded-full" style="width: 85%"></div>
            </div>
            <p class="text-[10px] text-gray-400 mt-1">Best score: 85%</p>
        </div>
    </div>
</div>
@endsection
