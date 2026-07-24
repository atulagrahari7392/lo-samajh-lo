@extends('layouts.app')

@section('content')
<!-- Search Results Header -->
<div class="bg-gray-50 dark:bg-[#0F172A] py-12 border-b border-gray-200 dark:border-gray-800">
    <div class="container mx-auto px-4 md:px-6 max-w-5xl">
        <!-- Search Bar Large -->
        <div class="glass p-2 rounded-2xl flex items-center shadow-md bg-white dark:bg-dark-card mb-6">
            <svg class="w-6 h-6 text-gray-400 ml-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <input type="text" value="UGC NET Paper 1" class="flex-1 bg-transparent border-none focus:ring-0 px-4 py-3 dark:text-white text-lg outline-none font-medium">
            <button class="btn btn-primary rounded-xl px-8 py-3">Search</button>
        </div>
        <p class="text-gray-500 dark:text-gray-400">Showing <span class="font-bold dark:text-white">124</span> results for "<span class="font-bold dark:text-white text-primary-500">UGC NET Paper 1</span>"</p>
    </div>
</div>

<div class="container mx-auto px-4 md:px-6 py-8 max-w-5xl">
    
    <!-- Filter Tabs -->
    <div class="flex border-b border-gray-200 dark:border-gray-800 mb-8 overflow-x-auto hide-scrollbar">
        <button class="px-6 py-3 border-b-2 border-primary-500 text-primary-500 font-bold whitespace-nowrap">All Results</button>
        <button class="px-6 py-3 text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white font-medium whitespace-nowrap">Courses (5)</button>
        <button class="px-6 py-3 text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white font-medium whitespace-nowrap">Tests (45)</button>
        <button class="px-6 py-3 text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white font-medium whitespace-nowrap">Notes (20)</button>
        <button class="px-6 py-3 text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white font-medium whitespace-nowrap">Discussions (54)</button>
    </div>

    <!-- Results List -->
    <div class="space-y-6">
        
        <!-- Course Result -->
        <div class="glass-card bg-white dark:bg-dark-card border border-gray-200 dark:border-gray-700 p-4 flex flex-col md:flex-row gap-6 hover:shadow-lg transition group">
            <div class="w-full md:w-48 h-32 bg-blue-100 rounded-lg flex items-center justify-center text-4xl shrink-0 relative">
                📚
                <span class="absolute top-2 right-2 bg-primary-500 text-white text-[10px] px-1.5 py-0.5 rounded font-bold uppercase">Course</span>
            </div>
            <div class="flex-1">
                <a href="/courses/1"><h3 class="text-xl font-bold dark:text-white mb-2 group-hover:text-primary-500 transition">Complete <mark class="bg-yellow-200 dark:bg-yellow-900/50 text-inherit px-1 rounded">UGC NET Paper 1</mark> Foundation Batch</h3></a>
                <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2 mb-3">Master <mark class="bg-yellow-200 dark:bg-yellow-900/50 text-inherit px-1 rounded">UGC NET Paper 1</mark> with top educators. Includes complete syllabus coverage, mock tests, PYQ analysis, and bilingual PDF notes.</p>
                <div class="flex items-center gap-4 text-xs font-bold text-gray-500">
                    <span class="text-green-500">⭐ 4.9 Rating</span>
                    <span>15k+ Students</span>
                </div>
            </div>
        </div>

        <!-- Test Result -->
        <div class="glass-card bg-white dark:bg-dark-card border border-gray-200 dark:border-gray-700 p-4 flex flex-col md:flex-row gap-6 hover:shadow-lg transition group">
            <div class="w-full md:w-48 h-32 bg-green-100 rounded-lg flex items-center justify-center text-4xl shrink-0 relative">
                📝
                <span class="absolute top-2 right-2 bg-green-500 text-white text-[10px] px-1.5 py-0.5 rounded font-bold uppercase">Test</span>
            </div>
            <div class="flex-1">
                <a href="/tests/1"><h3 class="text-xl font-bold dark:text-white mb-2 group-hover:text-green-500 transition">Mock Test 4: <mark class="bg-yellow-200 dark:bg-yellow-900/50 text-inherit px-1 rounded">UGC NET Paper 1</mark></h3></a>
                <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2 mb-3">Full length mock test based on the latest NTA pattern for <mark class="bg-yellow-200 dark:bg-yellow-900/50 text-inherit px-1 rounded">Paper 1</mark>. Attempt to check your preparation level.</p>
                <div class="flex items-center gap-4 text-xs font-bold text-gray-500">
                    <span>50 Questions</span>
                    <span>60 Mins</span>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
