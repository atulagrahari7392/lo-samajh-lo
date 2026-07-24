@extends('layouts.dashboard')
@section('title', 'Leaderboard')
@section('content')
<div class="max-w-5xl mx-auto space-y-6">
    <div class="text-center mb-8">
        <h1 class="text-3xl font-black dark:text-white" x-text="lang === 'en' ? 'Global Leaderboard' : 'ग्लोबल लीडरबोर्ड'"></h1>
        <p class="text-gray-500 mt-2">Compete with thousands of aspirants</p>
        
        <div class="inline-flex bg-gray-100 dark:bg-gray-700 p-1 rounded-lg mt-6">
            <button class="px-4 py-1.5 bg-white dark:bg-gray-800 shadow-sm rounded-md text-sm font-medium dark:text-white">This Week</button>
            <button class="px-4 py-1.5 text-gray-500 dark:text-gray-300 hover:text-gray-700 text-sm font-medium">This Month</button>
            <button class="px-4 py-1.5 text-gray-500 dark:text-gray-300 hover:text-gray-700 text-sm font-medium">All Time</button>
        </div>
    </div>

    <!-- Podium -->
    <div class="flex justify-center items-end gap-2 sm:gap-6 mb-12 h-48">
        <!-- 2nd -->
        <div class="flex flex-col items-center">
            <div class="relative">
                <img src="https://ui-avatars.com/api/?name=Priya" class="w-16 h-16 rounded-full border-4 border-gray-300 z-10 relative bg-white">
                <div class="absolute -top-3 -right-2 bg-gray-300 text-gray-800 text-xs font-bold w-6 h-6 rounded-full flex items-center justify-center border-2 border-white z-20">2</div>
            </div>
            <p class="font-bold text-sm mt-2 dark:text-white">Priya S.</p>
            <p class="text-xs text-primary font-bold">1240 pt</p>
            <div class="w-20 sm:w-24 bg-gray-200 dark:bg-gray-700 h-24 rounded-t-lg mt-2 border-t-4 border-gray-300"></div>
        </div>
        <!-- 1st -->
        <div class="flex flex-col items-center -mt-8">
            <div class="relative">
                <img src="https://ui-avatars.com/api/?name=Rohan" class="w-20 h-20 rounded-full border-4 border-yellow-400 z-10 relative bg-white shadow-lg shadow-yellow-400/20">
                <i class="fas fa-crown absolute -top-5 left-1/2 -translate-x-1/2 text-yellow-500 text-2xl z-20"></i>
                <div class="absolute -top-2 -right-1 bg-yellow-400 text-yellow-900 text-xs font-bold w-6 h-6 rounded-full flex items-center justify-center border-2 border-white z-20">1</div>
            </div>
            <p class="font-bold text-sm mt-2 dark:text-white">Rohan M.</p>
            <p class="text-xs text-primary font-bold">1450 pt</p>
            <div class="w-24 sm:w-28 bg-yellow-50 dark:bg-yellow-900/20 h-32 rounded-t-lg mt-2 border-t-4 border-yellow-400"></div>
        </div>
        <!-- 3rd -->
        <div class="flex flex-col items-center">
            <div class="relative">
                <img src="https://ui-avatars.com/api/?name=Amit" class="w-16 h-16 rounded-full border-4 border-orange-400 z-10 relative bg-white">
                <div class="absolute -top-3 -right-2 bg-orange-400 text-white text-xs font-bold w-6 h-6 rounded-full flex items-center justify-center border-2 border-white z-20">3</div>
            </div>
            <p class="font-bold text-sm mt-2 dark:text-white">Amit K.</p>
            <p class="text-xs text-primary font-bold">1120 pt</p>
            <div class="w-20 sm:w-24 bg-orange-50 dark:bg-orange-900/20 h-20 rounded-t-lg mt-2 border-t-4 border-orange-400"></div>
        </div>
    </div>

    <!-- List -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
        <!-- Current User Rank -->
        <div class="bg-blue-50 dark:bg-blue-900/20 p-4 flex items-center gap-4 border-b border-blue-100 dark:border-blue-800 sticky top-0">
            <div class="w-8 text-center font-bold text-primary">142</div>
            <img src="https://ui-avatars.com/api/?name=Student" class="w-10 h-10 rounded-full border-2 border-primary">
            <div class="flex-1">
                <h4 class="font-bold text-primary">You</h4>
                <p class="text-xs text-primary/80">Target: UPSC CSE</p>
            </div>
            <div class="text-right">
                <p class="font-bold text-primary">420 pt</p>
            </div>
        </div>
        
        <div class="divide-y divide-gray-100 dark:divide-gray-700 p-2">
            <div class="flex items-center gap-4 p-3 hover:bg-gray-50 dark:hover:bg-gray-700 transition rounded-lg">
                <div class="w-8 text-center font-bold text-gray-500">4</div>
                <img src="https://ui-avatars.com/api/?name=Neha" class="w-10 h-10 rounded-full">
                <div class="flex-1">
                    <h4 class="font-bold text-gray-800 dark:text-gray-200">Neha Sharma</h4>
                </div>
                <div class="font-bold text-gray-700 dark:text-gray-300">1050 pt</div>
            </div>
            <div class="flex items-center gap-4 p-3 hover:bg-gray-50 dark:hover:bg-gray-700 transition rounded-lg">
                <div class="w-8 text-center font-bold text-gray-500">5</div>
                <img src="https://ui-avatars.com/api/?name=Vikas" class="w-10 h-10 rounded-full">
                <div class="flex-1">
                    <h4 class="font-bold text-gray-800 dark:text-gray-200">Vikas Singh</h4>
                </div>
                <div class="font-bold text-gray-700 dark:text-gray-300">980 pt</div>
            </div>
        </div>
    </div>
</div>
@endsection
