@extends('layouts.dashboard')
@section('title', 'Live Classes')
@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold dark:text-white" x-text="lang === 'en' ? 'Live Classes' : 'लाइव क्लास'"></h1>
        <div class="bg-gray-100 dark:bg-gray-700 p-1 rounded-lg inline-flex">
            <button class="px-3 py-1.5 bg-white dark:bg-gray-800 shadow-sm rounded-md text-sm font-medium dark:text-white"><i class="fas fa-calendar-day mr-1"></i> Today</button>
            <button class="px-3 py-1.5 text-gray-500 dark:text-gray-300 hover:text-gray-700 text-sm font-medium"><i class="fas fa-calendar-week mr-1"></i> Week</button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-4">
            
            <!-- Live Now -->
            <div class="bg-red-50 dark:bg-red-900/10 rounded-xl p-5 border-2 border-red-200 dark:border-red-800">
                <div class="flex justify-between items-center mb-3">
                    <span class="bg-red-500 text-white text-xs font-bold px-2 py-1 rounded flex items-center gap-2">
                        <span class="relative flex h-2 w-2">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-2 w-2 bg-white"></span>
                        </span>
                        LIVE NOW
                    </span>
                    <span class="text-xs font-bold text-red-600"><i class="fas fa-users mr-1"></i> 1.2k Watching</span>
                </div>
                
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Daily Current Affairs Analysis - 24 Oct</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300 mb-4 flex items-center gap-2"><img src="https://ui-avatars.com/api/?name=R" class="w-6 h-6 rounded-full"> By Rohan Sir</p>
                
                <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-lg transition shadow-md">
                    Join Class <i class="fas fa-play ml-2"></i>
                </button>
            </div>

            <h2 class="text-lg font-bold dark:text-white mt-8 mb-4">Upcoming Today</h2>
            
            <!-- Upcoming Class -->
            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-sm border border-gray-100 dark:border-gray-700 flex gap-4 items-center">
                <div class="bg-blue-50 dark:bg-blue-900/20 text-center p-3 rounded-lg w-20 shrink-0 border border-blue-100 dark:border-blue-800">
                    <p class="text-primary font-bold text-lg">14:00</p>
                    <p class="text-xs text-gray-500 uppercase">PM</p>
                </div>
                <div class="flex-1">
                    <span class="text-xs font-semibold text-primary bg-blue-50 px-2 py-0.5 rounded dark:bg-blue-900 dark:text-blue-200 mb-1 inline-block">Geography</span>
                    <h4 class="font-bold text-gray-900 dark:text-white">Physical Geography: Ocean Currents</h4>
                    <p class="text-xs text-gray-500 mt-1"><i class="fas fa-user-tie mr-1"></i> Raj Sir</p>
                </div>
                <button class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200 font-medium py-2 px-4 rounded-lg transition text-sm">
                    Remind Me
                </button>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-4">
            <div class="bg-white dark:bg-gray-800 rounded-xl p-5 shadow-sm border border-gray-100 dark:border-gray-700">
                <h3 class="font-bold dark:text-white mb-4">Past Recordings</h3>
                <div class="space-y-3">
                    <a href="#" class="flex gap-3 items-center group">
                        <div class="w-20 h-14 bg-gray-200 rounded relative overflow-hidden shrink-0">
                            <img src="https://placehold.co/100x70" class="w-full h-full object-cover group-hover:scale-110 transition">
                            <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
                                <i class="fas fa-play text-white text-xs"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-gray-800 dark:text-gray-200 line-clamp-2 group-hover:text-primary transition">Polity Doubt Clearing Session</h4>
                            <p class="text-xs text-gray-500 mt-1">Yesterday</p>
                        </div>
                    </a>
                </div>
                <a href="#" class="block text-center text-sm text-primary mt-4 hover:underline">View All Recordings</a>
            </div>
        </div>
    </div>
</div>
@endsection
