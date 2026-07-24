@extends('layouts.dashboard')
@section('title', 'Study Notes')
@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <h1 class="text-2xl font-bold dark:text-white" x-text="lang === 'en' ? 'Study Notes' : 'स्टडी नोट्स'"></h1>
        
        <div class="flex gap-2 w-full sm:w-auto">
            <div class="relative flex-1 sm:w-64">
                <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:ring-primary focus:border-primary dark:bg-gray-800 dark:border-gray-700 dark:text-white" placeholder="Search notes...">
            </div>
            <button class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 px-4 py-2 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                <i class="fas fa-filter"></i>
            </button>
        </div>
    </div>

    <!-- Filter Pills -->
    <div class="flex gap-2 overflow-x-auto pb-2">
        <button class="bg-primary text-white px-4 py-1.5 rounded-full text-sm font-medium whitespace-nowrap">All Subjects</button>
        <button class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-gray-600 dark:text-gray-300 px-4 py-1.5 rounded-full text-sm font-medium whitespace-nowrap hover:bg-gray-50 transition">History</button>
        <button class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-gray-600 dark:text-gray-300 px-4 py-1.5 rounded-full text-sm font-medium whitespace-nowrap hover:bg-gray-50 transition">Polity</button>
        <button class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-gray-600 dark:text-gray-300 px-4 py-1.5 rounded-full text-sm font-medium whitespace-nowrap hover:bg-gray-50 transition">Geography</button>
    </div>

    <!-- Notes Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Note Card -->
        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-sm border border-gray-100 dark:border-gray-700 group hover:shadow-md transition">
            <div class="h-32 bg-red-50 dark:bg-red-900/20 rounded-lg flex items-center justify-center mb-4 relative overflow-hidden">
                <i class="fas fa-file-pdf text-4xl text-red-400"></i>
                <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center gap-3">
                    <button class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center hover:bg-primary hover:text-white transition shadow"><i class="fas fa-eye"></i></button>
                    <button class="bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center hover:bg-primary hover:text-white transition shadow"><i class="fas fa-download"></i></button>
                </div>
            </div>
            <div class="flex justify-between items-start">
                <span class="text-xs font-semibold text-primary bg-blue-50 px-2 py-0.5 rounded dark:bg-blue-900 dark:text-blue-200 mb-2 inline-block">Polity</span>
                <button class="text-gray-400 hover:text-yellow-500"><i class="fas fa-bookmark"></i></button>
            </div>
            <h3 class="font-bold text-gray-900 dark:text-white text-sm line-clamp-2 mb-1">Fundamental Rights - Complete Mindmap</h3>
            <p class="text-xs text-gray-500 flex justify-between items-center mt-2">
                <span><i class="far fa-file-alt mr-1"></i> 12 Pages</span>
                <span>2.4 MB</span>
            </p>
        </div>
    </div>
</div>
@endsection
