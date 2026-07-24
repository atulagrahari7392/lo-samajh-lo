@extends('layouts.dashboard')
@section('title', 'Review Test')
@section('content')
<div class="max-w-4xl mx-auto space-y-6" x-data="{ filter: 'all' }">
    <!-- Header -->
    <div class="flex justify-between items-center bg-white dark:bg-gray-800 p-4 rounded-xl shadow-sm">
        <h1 class="font-bold text-lg dark:text-white">Review: Mock Test 1</h1>
        <div class="flex gap-2">
            <button @click="filter = 'all'" :class="filter === 'all' ? 'bg-gray-800 text-white' : 'bg-gray-100 text-gray-600'" class="px-3 py-1 rounded text-sm font-medium">All (100)</button>
            <button @click="filter = 'correct'" :class="filter === 'correct' ? 'bg-green-600 text-white' : 'bg-green-50 text-green-700'" class="px-3 py-1 rounded text-sm font-medium">Correct (64)</button>
            <button @click="filter = 'wrong'" :class="filter === 'wrong' ? 'bg-red-600 text-white' : 'bg-red-50 text-red-700'" class="px-3 py-1 rounded text-sm font-medium">Wrong (20)</button>
        </div>
    </div>

    <!-- Question Block 1 -->
    <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700">
        <div class="flex justify-between items-start mb-4">
            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs font-bold">Q1. Correct</span>
            <div class="flex gap-2">
                <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded"><i class="fas fa-clock"></i> 45s</span>
                <button class="text-gray-400 hover:text-yellow-500"><i class="fas fa-bookmark"></i></button>
            </div>
        </div>
        
        <p class="text-gray-800 dark:text-gray-200 font-medium mb-4">Which of the following schedules of the Constitution of India contains provisions regarding anti-defection?</p>
        
        <div class="space-y-2 mb-6">
            <div class="p-3 rounded border border-gray-200 dark:border-gray-600 flex items-center justify-between">
                <span class="dark:text-gray-300">A. Second Schedule</span>
            </div>
            <div class="p-3 rounded border border-green-500 bg-green-50 dark:bg-green-900/20 flex items-center justify-between">
                <span class="text-green-800 dark:text-green-400 font-medium">D. Tenth Schedule</span>
                <span class="text-green-600"><i class="fas fa-check-circle"></i> Your Answer</span>
            </div>
        </div>

        <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg border border-blue-100 dark:border-blue-800">
            <h4 class="font-bold text-blue-800 dark:text-blue-300 mb-2 flex items-center gap-2">
                <i class="fas fa-lightbulb"></i> Explanation
            </h4>
            <p class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed">The Tenth Schedule was inserted in the Constitution in 1985 by the 52nd Amendment Act. It deals with the anti-defection law i.e., provisions as to disqualification on ground of defection.</p>
        </div>
    </div>

    <!-- Question Block 2 -->
    <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-700">
        <div class="flex justify-between items-start mb-4">
            <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs font-bold">Q2. Incorrect</span>
            <div class="flex gap-2">
                <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded"><i class="fas fa-clock"></i> 1m 20s</span>
                <button class="text-gray-400 hover:text-yellow-500"><i class="fas fa-bookmark"></i></button>
            </div>
        </div>
        
        <p class="text-gray-800 dark:text-gray-200 font-medium mb-4">Consider the following statements regarding fundamental rights...</p>
        
        <div class="space-y-2 mb-6">
            <div class="p-3 rounded border border-red-500 bg-red-50 dark:bg-red-900/20 flex items-center justify-between">
                <span class="text-red-800 dark:text-red-400 font-medium">A. 1 only</span>
                <span class="text-red-600"><i class="fas fa-times-circle"></i> Your Answer</span>
            </div>
            <div class="p-3 rounded border border-green-500 bg-green-50 dark:bg-green-900/20 flex items-center justify-between">
                <span class="text-green-800 dark:text-green-400 font-medium">C. Both 1 and 2</span>
                <span class="text-green-600"><i class="fas fa-check"></i> Correct Answer</span>
            </div>
        </div>
    </div>
</div>
@endsection
