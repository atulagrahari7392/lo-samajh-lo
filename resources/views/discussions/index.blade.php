@extends('layouts.app')

@section('content')
<div class="bg-gray-50 dark:bg-[#0F172A] py-12 border-b border-gray-200 dark:border-gray-800">
    <div class="container mx-auto px-4 md:px-6">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6">
            <div>
                <h1 class="text-3xl font-bold dark:text-white mb-2">Discussion Forum</h1>
                <p class="text-gray-600 dark:text-gray-400">Ask questions, share knowledge, and connect with peers.</p>
            </div>
            <a href="/discussions/create" class="btn btn-primary px-6 py-3">Ask a Question</a>
        </div>
    </div>
</div>

<div class="container mx-auto px-4 md:px-6 py-12 max-w-6xl">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        
        <!-- Sidebar -->
        <aside class="lg:col-span-1 space-y-6">
            <div class="glass-card bg-white dark:bg-dark-card border border-gray-200 dark:border-gray-700 p-5">
                <h3 class="font-bold dark:text-white mb-4">Categories</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="flex justify-between items-center p-2 rounded-lg bg-primary-50 dark:bg-primary-900/20 text-primary-600 font-bold">All Topics <span class="bg-primary-100 text-primary-600 px-2 rounded-full text-xs">1.2k</span></a></li>
                    <li><a href="#" class="flex justify-between items-center p-2 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-400">Exam Strategies <span class="bg-gray-100 dark:bg-gray-800 px-2 rounded-full text-xs">342</span></a></li>
                    <li><a href="#" class="flex justify-between items-center p-2 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-400">Subject Doubts <span class="bg-gray-100 dark:bg-gray-800 px-2 rounded-full text-xs">856</span></a></li>
                    <li><a href="#" class="flex justify-between items-center p-2 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 text-gray-600 dark:text-gray-400">Motivation <span class="bg-gray-100 dark:bg-gray-800 px-2 rounded-full text-xs">94</span></a></li>
                </ul>
            </div>
        </aside>

        <!-- Main Feed -->
        <div class="lg:col-span-3 space-y-4">
            <!-- Filter -->
            <div class="flex gap-4 border-b border-gray-200 dark:border-gray-800 pb-4">
                <button class="font-bold text-primary-500">Recent</button>
                <button class="text-gray-500 hover:text-gray-800 dark:hover:text-white">Popular</button>
                <button class="text-gray-500 hover:text-gray-800 dark:hover:text-white">Unanswered</button>
            </div>

            <!-- Post -->
            <div class="glass-card bg-white dark:bg-dark-card border border-gray-200 dark:border-gray-700 p-5 flex gap-4 hover:shadow-md transition">
                <div class="flex flex-col items-center gap-1">
                    <button class="text-gray-400 hover:text-primary-500">▲</button>
                    <span class="font-bold dark:text-white">42</span>
                    <button class="text-gray-400 hover:text-red-500">▼</button>
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-xs bg-blue-100 text-blue-600 px-2 py-0.5 rounded font-bold">Exam Strategies</span>
                        <span class="text-xs text-gray-500">• 2 hours ago by</span>
                        <img src="https://ui-avatars.com/api/?name=Priya" class="w-5 h-5 rounded-full">
                        <span class="text-xs font-bold dark:text-white">Priya M.</span>
                    </div>
                    <a href="/discussions/1"><h3 class="font-bold text-lg dark:text-white hover:text-primary-500 transition mb-2">How to manage time during UGC NET Paper 1?</h3></a>
                    <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2 mb-4">I always run out of time when solving the DI and Reading Comprehension sections. Does anyone have a good strategy for time distribution?</p>
                    <div class="flex items-center gap-4 text-xs text-gray-500">
                        <span class="flex items-center gap-1">💬 12 Replies</span>
                        <span class="flex items-center gap-1">👁️ 156 Views</span>
                    </div>
                </div>
            </div>
            
            <!-- Post -->
            <div class="glass-card bg-white dark:bg-dark-card border border-gray-200 dark:border-gray-700 p-5 flex gap-4 hover:shadow-md transition">
                <div class="flex flex-col items-center gap-1">
                    <button class="text-gray-400 hover:text-primary-500">▲</button>
                    <span class="font-bold dark:text-white">15</span>
                    <button class="text-gray-400 hover:text-red-500">▼</button>
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-xs bg-purple-100 text-purple-600 px-2 py-0.5 rounded font-bold">Subject Doubts</span>
                        <span class="text-xs text-gray-500">• 5 hours ago by</span>
                        <span class="text-xs font-bold dark:text-white">Rahul K.</span>
                        <span class="text-xs bg-green-100 text-green-600 px-1.5 rounded flex items-center gap-1">✓ Answered</span>
                    </div>
                    <a href="/discussions/2"><h3 class="font-bold text-lg dark:text-white hover:text-primary-500 transition mb-2">Confusion regarding Research Ethics</h3></a>
                    <div class="flex items-center gap-4 text-xs text-gray-500 mt-4">
                        <span class="flex items-center gap-1">💬 4 Replies</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
