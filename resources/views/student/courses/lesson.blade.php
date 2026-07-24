@extends('layouts.dashboard')
@section('title', 'Lesson: Making of the Constitution')
@section('content')
<div class="flex flex-col lg:flex-row gap-6">
    <!-- Main Content Area -->
    <div class="lg:w-2/3 xl:w-3/4 space-y-4">
        <!-- Video Player -->
        <div class="bg-black rounded-xl overflow-hidden aspect-video shadow-lg relative flex items-center justify-center group">
            <!-- Simulated YouTube Player -->
            <img src="https://placehold.co/1280x720/000000/333333?text=Video+Player" class="w-full h-full object-cover opacity-80">
            <button class="absolute bg-primary/90 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl shadow-lg transform group-hover:scale-110 transition">
                <i class="fas fa-play ml-1"></i>
            </button>
            <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/80 to-transparent">
                <div class="w-full bg-white/30 rounded-full h-1.5 mb-2 cursor-pointer">
                    <div class="bg-red-500 h-1.5 rounded-full" style="width: 45%"></div>
                </div>
                <div class="flex justify-between items-center text-white">
                    <div class="flex gap-4 items-center">
                        <button><i class="fas fa-play"></i></button>
                        <span class="text-sm font-mono">12:34 / 52:00</span>
                    </div>
                    <div class="flex gap-4 items-center">
                        <button><i class="fas fa-cog"></i></button>
                        <button><i class="fas fa-expand"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Video Details -->
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-100 dark:border-gray-700">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h1 class="text-2xl font-bold dark:text-white mb-2">2. Making of the Constitution</h1>
                    <p class="text-gray-500 text-sm">Module 1: Constitutional Framework • Indian Polity Foundation</p>
                </div>
                <button class="bg-green-100 text-green-700 hover:bg-green-200 font-bold py-2 px-4 rounded-lg flex items-center gap-2 transition text-sm">
                    <i class="fas fa-check"></i> Mark Complete
                </button>
            </div>
            
            <div x-data="{ tab: 'notes' }">
                <div class="flex gap-6 border-b border-gray-200 dark:border-gray-700 mb-4">
                    <button @click="tab = 'notes'" :class="tab === 'notes' ? 'border-primary text-primary' : 'border-transparent text-gray-500 hover:text-gray-700'" class="pb-3 border-b-2 font-medium text-sm transition">Class Notes</button>
                    <button @click="tab = 'resources'" :class="tab === 'resources' ? 'border-primary text-primary' : 'border-transparent text-gray-500 hover:text-gray-700'" class="pb-3 border-b-2 font-medium text-sm transition">Resources</button>
                    <button @click="tab = 'doubt'" :class="tab === 'doubt' ? 'border-primary text-primary' : 'border-transparent text-gray-500 hover:text-gray-700'" class="pb-3 border-b-2 font-medium text-sm transition">Ask Doubt</button>
                </div>
                
                <div x-show="tab === 'notes'" class="text-gray-600 dark:text-gray-300 text-sm space-y-4">
                    <p>In this lesson, we discuss the historical events that led to the formation of the Constituent Assembly. We will cover:</p>
                    <ul class="list-disc pl-5 space-y-1">
                        <li>Demand for a Constituent Assembly</li>
                        <li>Composition of the Constituent Assembly</li>
                        <li>Working of the Constituent Assembly</li>
                        <li>Committees of the Constituent Assembly</li>
                    </ul>
                </div>
                
                <div x-show="tab === 'resources'" style="display: none;" class="space-y-3">
                    <div class="flex justify-between items-center p-3 border border-gray-200 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <div class="flex items-center gap-3">
                            <div class="text-red-500 text-xl"><i class="fas fa-file-pdf"></i></div>
                            <div>
                                <p class="font-medium text-sm dark:text-gray-200">Class Notes PDF</p>
                                <p class="text-xs text-gray-500">2.4 MB</p>
                            </div>
                        </div>
                        <button class="text-primary hover:text-blue-700"><i class="fas fa-download"></i></button>
                    </div>
                </div>

                <div x-show="tab === 'doubt'" style="display: none;">
                    <textarea rows="3" class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg p-3 text-sm focus:ring-primary focus:border-primary dark:text-white" placeholder="Type your doubt here..."></textarea>
                    <div class="flex justify-end mt-2">
                        <button class="bg-primary hover:bg-blue-600 text-white font-medium py-1.5 px-4 rounded-lg transition text-sm">Post Question</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Sidebar (Playlist) -->
    <div class="lg:w-1/3 xl:w-1/4">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 flex flex-col h-[600px]">
            <div class="p-4 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-700 rounded-t-xl">
                <h3 class="font-bold dark:text-white">Module 1</h3>
                <p class="text-xs text-gray-500">1/4 Lessons Completed</p>
            </div>
            
            <div class="flex-1 overflow-y-auto p-2">
                <!-- Completed -->
                <a href="#" class="flex items-start gap-3 p-2 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    <div class="mt-1 text-green-500"><i class="fas fa-check-circle"></i></div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 line-clamp-2">1. Historical Background</h4>
                        <p class="text-xs text-gray-500">45m</p>
                    </div>
                </a>
                
                <!-- Current -->
                <div class="flex items-start gap-3 p-2 rounded-lg bg-blue-50 dark:bg-blue-900/20 border border-blue-100 dark:border-blue-800">
                    <div class="mt-1 text-primary"><i class="fas fa-play"></i></div>
                    <div>
                        <h4 class="text-sm font-bold text-primary line-clamp-2">2. Making of the Constitution</h4>
                        <p class="text-xs text-primary/80">52m</p>
                    </div>
                </div>
                
                <!-- Locked -->
                <div class="flex items-start gap-3 p-2 rounded-lg opacity-60">
                    <div class="mt-1 text-gray-400"><i class="fas fa-lock"></i></div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 line-clamp-2">3. Salient Features</h4>
                        <p class="text-xs text-gray-500">48m</p>
                    </div>
                </div>
                
                 <!-- Locked -->
                 <div class="flex items-start gap-3 p-2 rounded-lg opacity-60">
                    <div class="mt-1 text-gray-400"><i class="fas fa-lock"></i></div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 line-clamp-2">4. Preamble of the Constitution</h4>
                        <p class="text-xs text-gray-500">35m</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
