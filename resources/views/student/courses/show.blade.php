@extends('layouts.dashboard')
@section('title', 'Course Overview')
@section('content')
<div class="space-y-6 max-w-6xl mx-auto">
    
    <!-- Course Header -->
    <div class="bg-white dark:bg-gray-800 rounded-3xl p-6 md:p-8 shadow-sm border border-gray-100 dark:border-gray-700 flex flex-col md:flex-row gap-8">
        <div class="w-full md:w-1/3 shrink-0">
            <img src="https://placehold.co/600x400" class="w-full h-auto rounded-xl object-cover shadow">
        </div>
        <div class="flex-1 flex flex-col">
            <div class="flex justify-between items-start mb-2">
                <span class="bg-blue-100 text-blue-800 text-xs font-bold px-2 py-1 rounded dark:bg-blue-900 dark:text-blue-300">UPSC CSE</span>
                <button class="text-gray-400 hover:text-red-500"><i class="fas fa-heart text-xl"></i></button>
            </div>
            
            <h1 class="text-3xl font-black text-gray-900 dark:text-white mb-3">Indian Polity Complete Foundation Batch 2024</h1>
            <p class="text-gray-600 dark:text-gray-400 mb-4 line-clamp-2">Comprehensive coverage of Indian Polity for UPSC CSE Prelims and Mains. Includes conceptual clarity, current affairs linking, and answer writing practice.</p>
            
            <div class="flex items-center gap-6 mb-6">
                <div class="flex items-center gap-2">
                    <img src="https://ui-avatars.com/api/?name=Raj+Sir" class="w-8 h-8 rounded-full">
                    <span class="font-medium text-sm dark:text-gray-200">Raj Sir</span>
                </div>
                <div class="text-sm text-gray-500 dark:text-gray-400 flex items-center gap-1"><i class="fas fa-video"></i> 120 Lessons</div>
                <div class="text-sm text-gray-500 dark:text-gray-400 flex items-center gap-1"><i class="fas fa-file-pdf"></i> 85 Notes</div>
            </div>
            
            <div class="mt-auto bg-gray-50 dark:bg-gray-700/50 p-4 rounded-xl flex items-center justify-between border border-gray-100 dark:border-gray-600">
                <div class="flex-1 mr-6">
                    <div class="flex justify-between text-sm mb-1 font-medium dark:text-gray-200">
                        <span>Course Progress</span>
                        <span class="text-primary">65%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-600">
                        <div class="bg-gradient-to-r from-primary to-accent h-2.5 rounded-full" style="width: 65%"></div>
                    </div>
                </div>
                <a href="/student/courses/lesson" class="bg-primary hover:bg-blue-600 text-white font-bold py-3 px-8 rounded-xl transition shadow-md shrink-0">
                    Continue <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Layout Split -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Main Content (Curriculum) -->
        <div class="lg:col-span-2 space-y-4">
            <h2 class="text-xl font-bold dark:text-white">Curriculum</h2>
            
            <!-- Module 1 -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden" x-data="{ expanded: true }">
                <button @click="expanded = !expanded" class="w-full flex justify-between items-center p-5 bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 transition text-left">
                    <div>
                        <h3 class="font-bold text-gray-900 dark:text-white">Module 1: Constitutional Framework</h3>
                        <p class="text-xs text-gray-500 mt-1">4 Lessons • 2 Notes</p>
                    </div>
                    <i class="fas fa-chevron-down transition-transform text-gray-400" :class="expanded ? 'rotate-180' : ''"></i>
                </button>
                
                <div x-show="expanded" class="divide-y divide-gray-100 dark:divide-gray-700">
                    <!-- Lesson item (Completed) -->
                    <a href="/student/courses/lesson" class="flex items-center p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition group">
                        <div class="w-8 h-8 rounded-full bg-green-100 text-green-600 flex items-center justify-center shrink-0 mr-4">
                            <i class="fas fa-check text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-sm font-medium text-gray-900 dark:text-gray-200 group-hover:text-primary transition">1. Historical Background</h4>
                            <p class="text-xs text-gray-500 mt-0.5"><i class="fas fa-play-circle mr-1"></i> Video • 45m</p>
                        </div>
                    </a>
                    
                    <!-- Lesson item (Current) -->
                    <a href="/student/courses/lesson" class="flex items-center p-4 bg-blue-50/50 dark:bg-blue-900/10 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition group">
                        <div class="w-8 h-8 rounded-full bg-blue-100 text-primary flex items-center justify-center shrink-0 mr-4">
                            <i class="fas fa-play text-xs ml-1"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-sm font-bold text-primary">2. Making of the Constitution</h4>
                            <p class="text-xs text-gray-500 mt-0.5"><i class="fas fa-play-circle mr-1"></i> Video • 52m</p>
                        </div>
                        <span class="text-xs font-semibold text-primary bg-blue-100 px-2 py-1 rounded">Playing</span>
                    </a>
                    
                    <!-- Lesson item (Locked) -->
                    <div class="flex items-center p-4 opacity-60">
                        <div class="w-8 h-8 rounded-full bg-gray-100 text-gray-400 dark:bg-gray-700 flex items-center justify-center shrink-0 mr-4">
                            <i class="fas fa-lock text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-sm font-medium text-gray-900 dark:text-gray-200">3. Salient Features</h4>
                            <p class="text-xs text-gray-500 mt-0.5"><i class="fas fa-play-circle mr-1"></i> Video • 48m</p>
                        </div>
                    </div>
                    
                    <!-- Note item (Locked) -->
                    <div class="flex items-center p-4 opacity-60">
                        <div class="w-8 h-8 rounded-full bg-gray-100 text-gray-400 dark:bg-gray-700 flex items-center justify-center shrink-0 mr-4">
                            <i class="fas fa-lock text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-sm font-medium text-gray-900 dark:text-gray-200">Module 1 Class Notes</h4>
                            <p class="text-xs text-gray-500 mt-0.5"><i class="fas fa-file-pdf mr-1"></i> PDF • 12 MB</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Module 2 -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden" x-data="{ expanded: false }">
                <button @click="expanded = !expanded" class="w-full flex justify-between items-center p-5 bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 transition text-left">
                    <div>
                        <h3 class="font-bold text-gray-900 dark:text-white">Module 2: System of Government</h3>
                        <p class="text-xs text-gray-500 mt-1">6 Lessons • 3 Notes</p>
                    </div>
                    <i class="fas fa-chevron-down transition-transform text-gray-400" :class="expanded ? 'rotate-180' : ''"></i>
                </button>
            </div>
        </div>
        
        <!-- Sidebar -->
        <div class="space-y-4">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6">
                <h3 class="font-bold dark:text-white mb-4">About the Course</h3>
                <ul class="space-y-3 text-sm text-gray-600 dark:text-gray-300">
                    <li class="flex items-start gap-3"><i class="fas fa-globe text-primary mt-1"></i> <span>Language: Hinglish</span></li>
                    <li class="flex items-start gap-3"><i class="fas fa-calendar text-primary mt-1"></i> <span>Validity: 1 Year</span></li>
                    <li class="flex items-start gap-3"><i class="fas fa-certificate text-primary mt-1"></i> <span>Certificate of Completion</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
