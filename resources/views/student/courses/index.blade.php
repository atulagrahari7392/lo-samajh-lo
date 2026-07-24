@extends('layouts.dashboard')
@section('title', 'My Courses')
@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-end">
        <div>
            <h1 class="text-2xl font-bold dark:text-white" x-text="lang === 'en' ? 'My Courses' : 'मेरे कोर्स'"></h1>
            <p class="text-gray-500 mt-1">Continue learning where you left off.</p>
        </div>
        
        <!-- Tabs -->
        <div class="bg-gray-100 dark:bg-gray-700 p-1 rounded-lg inline-flex">
            <button class="px-4 py-1.5 bg-white dark:bg-gray-800 shadow-sm rounded-md text-sm font-medium dark:text-white">In Progress</button>
            <button class="px-4 py-1.5 text-gray-500 dark:text-gray-300 hover:text-gray-700 text-sm font-medium">Completed</button>
            <button class="px-4 py-1.5 text-gray-500 dark:text-gray-300 hover:text-gray-700 text-sm font-medium">Wishlist</button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <!-- Course Card 1 -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-md transition flex flex-col group">
            <div class="relative">
                <img src="https://placehold.co/600x340" class="w-full h-48 object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-20 group-hover:bg-opacity-10 transition"></div>
                <div class="absolute bottom-3 left-3 bg-white/90 backdrop-blur-sm text-gray-800 text-xs font-bold px-2 py-1 rounded">
                    UPSC CSE
                </div>
            </div>
            <div class="p-5 flex-1 flex flex-col">
                <h3 class="font-bold text-lg dark:text-white leading-tight mb-2">Indian Polity Complete Foundation Batch 2024</h3>
                <p class="text-sm text-gray-500 mb-4 flex items-center gap-2"><i class="fas fa-user-tie"></i> By Raj Sir</p>
                
                <div class="mt-auto">
                    <div class="flex justify-between text-xs mb-1 font-medium dark:text-gray-300">
                        <span>Progress</span>
                        <span class="text-primary">65%</span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-2 dark:bg-gray-600 mb-4">
                        <div class="bg-gradient-to-r from-primary to-accent h-2 rounded-full" style="width: 65%"></div>
                    </div>
                    <div class="text-xs text-gray-500 mb-4">Last accessed: 2 hours ago</div>
                    
                    <a href="/student/courses/show" class="block w-full text-center bg-gray-50 hover:bg-primary hover:text-white text-primary border border-primary dark:bg-gray-700 dark:border-gray-600 dark:text-primary dark:hover:bg-primary dark:hover:text-white font-semibold py-2.5 rounded-xl transition">
                        Resume Learning <i class="fas fa-play text-xs ml-1"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Course Card 2 -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-md transition flex flex-col group">
            <div class="relative">
                <img src="https://placehold.co/600x340" class="w-full h-48 object-cover">
                <div class="absolute bottom-3 left-3 bg-white/90 backdrop-blur-sm text-gray-800 text-xs font-bold px-2 py-1 rounded">
                    UPPCS
                </div>
            </div>
            <div class="p-5 flex-1 flex flex-col">
                <h3 class="font-bold text-lg dark:text-white leading-tight mb-2">Modern History Crash Course</h3>
                <p class="text-sm text-gray-500 mb-4 flex items-center gap-2"><i class="fas fa-user-tie"></i> By Amit Sir</p>
                
                <div class="mt-auto">
                    <div class="flex justify-between text-xs mb-1 font-medium dark:text-gray-300">
                        <span>Progress</span>
                        <span class="text-primary">12%</span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-2 dark:bg-gray-600 mb-4">
                        <div class="bg-gradient-to-r from-primary to-accent h-2 rounded-full" style="width: 12%"></div>
                    </div>
                    <div class="text-xs text-gray-500 mb-4">Last accessed: 3 days ago</div>
                    
                    <a href="/student/courses/show" class="block w-full text-center bg-gray-50 hover:bg-primary hover:text-white text-primary border border-primary dark:bg-gray-700 dark:border-gray-600 dark:text-primary dark:hover:bg-primary dark:hover:text-white font-semibold py-2.5 rounded-xl transition">
                        Resume Learning <i class="fas fa-play text-xs ml-1"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
