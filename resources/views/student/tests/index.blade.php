@extends('layouts.dashboard')
@section('title', 'Tests')
@section('content')
<div class="space-y-6">
    <!-- Hero Banner -->
    <div class="bg-gradient-to-r from-primary to-secondary rounded-2xl p-8 text-white relative overflow-hidden shadow-md">
        <div class="relative z-10 md:w-2/3">
            <h1 class="text-3xl font-black mb-2" x-text="lang === 'en' ? 'Practice Makes Perfect' : 'अभ्यास से सफलता'"></h1>
            <p class="text-blue-100 mb-4" x-text="lang === 'en' ? 'Attempt mock tests, topic tests and PYQs to boost your preparation.' : 'अपनी तैयारी को बेहतर बनाने के लिए मॉक टेस्ट और विषयवार टेस्ट दें।'"></p>
            <button class="bg-white text-secondary hover:bg-gray-100 font-bold py-2 px-6 rounded-lg transition">Start Free Mock Test</button>
        </div>
        <i class="fas fa-laptop-code absolute -bottom-10 -right-10 text-9xl text-white opacity-20"></i>
    </div>

    <div class="flex flex-col md:flex-row gap-6">
        <!-- Sidebar Filters -->
        <div class="w-full md:w-64 space-y-4 shrink-0">
            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-sm border border-gray-100 dark:border-gray-700">
                <h3 class="font-bold mb-3 dark:text-white">Filters</h3>
                
                <div class="space-y-4">
                    <!-- Type -->
                    <div>
                        <p class="text-sm font-semibold text-gray-500 dark:text-gray-400 mb-2">Test Type</p>
                        <div class="space-y-2">
                            <label class="flex items-center gap-2"><input type="checkbox" class="rounded text-primary" checked> <span class="text-sm dark:text-gray-200">Mock Tests</span></label>
                            <label class="flex items-center gap-2"><input type="checkbox" class="rounded text-primary"> <span class="text-sm dark:text-gray-200">Topic Tests</span></label>
                            <label class="flex items-center gap-2"><input type="checkbox" class="rounded text-primary"> <span class="text-sm dark:text-gray-200">Previous Year (PYQ)</span></label>
                            <label class="flex items-center gap-2"><input type="checkbox" class="rounded text-primary text-red-500"> <span class="text-sm text-red-500 font-medium">Live Tests</span></label>
                        </div>
                    </div>
                    
                    <!-- Subject -->
                    <div>
                        <p class="text-sm font-semibold text-gray-500 dark:text-gray-400 mb-2">Subject</p>
                        <select class="w-full bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <option>All Subjects</option>
                            <option>History</option>
                            <option>Polity</option>
                            <option>Geography</option>
                        </select>
                    </div>

                    <!-- Pricing -->
                    <div>
                        <p class="text-sm font-semibold text-gray-500 dark:text-gray-400 mb-2">Access</p>
                        <div class="space-y-2">
                            <label class="flex items-center gap-2"><input type="radio" name="access" class="text-primary" checked> <span class="text-sm dark:text-gray-200">All</span></label>
                            <label class="flex items-center gap-2"><input type="radio" name="access" class="text-primary"> <span class="text-sm dark:text-gray-200">Free</span></label>
                            <label class="flex items-center gap-2"><input type="radio" name="access" class="text-primary"> <span class="text-sm dark:text-gray-200">Premium</span></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Test List -->
        <div class="flex-1 space-y-4">
            <!-- Tabs -->
            <div class="flex gap-2 overflow-x-auto pb-2">
                <button class="bg-primary text-white px-4 py-2 rounded-lg text-sm font-medium whitespace-nowrap">All Tests</button>
                <button class="bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 px-4 py-2 rounded-lg text-sm font-medium whitespace-nowrap border border-gray-200 dark:border-gray-700">Attempted</button>
                <button class="bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 px-4 py-2 rounded-lg text-sm font-medium whitespace-nowrap border border-gray-200 dark:border-gray-700">Unattempted</button>
            </div>

            <!-- Grid -->
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-4">
                
                <!-- Card 1 (Live) -->
                <div class="bg-white dark:bg-gray-800 rounded-xl p-5 shadow-sm border-2 border-red-200 dark:border-red-900/50 relative overflow-hidden group hover:shadow-md transition">
                    <div class="absolute top-0 right-0 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-bl-lg flex items-center gap-1">
                        <span class="relative flex h-2 w-2">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-2 w-2 bg-white"></span>
                        </span>
                        LIVE NOW
                    </div>
                    
                    <div class="flex justify-between items-start mb-3 mt-2">
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">UPSC Prelims Mock</span>
                    </div>
                    
                    <h3 class="font-bold text-lg text-gray-900 dark:text-white mb-2">All India Mock Test 1</h3>
                    
                    <div class="flex flex-wrap gap-4 text-sm text-gray-600 dark:text-gray-400 mb-4">
                        <div class="flex items-center gap-1"><i class="fas fa-list-ol text-gray-400"></i> 100 Qs</div>
                        <div class="flex items-center gap-1"><i class="fas fa-clock text-gray-400"></i> 120 Mins</div>
                        <div class="flex items-center gap-1"><i class="fas fa-star text-gray-400"></i> 200 Marks</div>
                        <div class="flex items-center gap-1"><i class="fas fa-users text-gray-400"></i> 12.5k Enrolled</div>
                    </div>
                    
                    <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-100 dark:border-gray-700">
                        <div>
                            <span class="text-xs text-gray-500">Ends in 2h 45m</span>
                        </div>
                        <a href="/student/tests/attempt/1" class="bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-lg transition text-sm">Join Now</a>
                    </div>
                </div>

                <!-- Card 2 (Attempted) -->
                <div class="bg-white dark:bg-gray-800 rounded-xl p-5 shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition">
                    <div class="absolute top-0 right-0 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-bl-lg">COMPLETED</div>
                    
                    <div class="flex justify-between items-start mb-3 mt-2">
                        <span class="bg-purple-100 text-purple-800 text-xs font-semibold px-2 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300">Topic Test</span>
                    </div>
                    
                    <h3 class="font-bold text-lg text-gray-900 dark:text-white mb-2">Modern History: Gandhian Era</h3>
                    
                    <div class="flex flex-wrap gap-4 text-sm text-gray-600 dark:text-gray-400 mb-4">
                        <div class="flex items-center gap-1"><i class="fas fa-list-ol text-gray-400"></i> 50 Qs</div>
                        <div class="flex items-center gap-1"><i class="fas fa-clock text-gray-400"></i> 60 Mins</div>
                    </div>
                    
                    <div class="bg-green-50 dark:bg-green-900/20 p-2 rounded-lg mb-4 flex justify-between items-center">
                        <span class="text-sm font-medium text-green-800 dark:text-green-400">Your Score: 85/100</span>
                        <span class="text-xs text-gray-500">Rank: 42</span>
                    </div>
                    
                    <div class="flex gap-2 mt-2">
                        <a href="/student/tests/result/2" class="flex-1 bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:bg-gray-600 text-center font-medium py-2 px-4 rounded-lg transition text-sm">View Result</a>
                        <a href="/student/tests/review/2" class="flex-1 bg-primary hover:bg-blue-600 text-white text-center font-medium py-2 px-4 rounded-lg transition text-sm">Review</a>
                    </div>
                </div>

                <!-- Card 3 (Unattempted) -->
                <div class="bg-white dark:bg-gray-800 rounded-xl p-5 shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition">
                    <div class="flex justify-between items-start mb-3">
                        <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">PYQ</span>
                        <span class="text-green-600 font-bold text-xs bg-green-50 px-2 py-1 rounded">FREE</span>
                    </div>
                    
                    <h3 class="font-bold text-lg text-gray-900 dark:text-white mb-2">UPSC CSE 2022 Prelims Paper 1</h3>
                    
                    <div class="flex flex-wrap gap-4 text-sm text-gray-600 dark:text-gray-400 mb-4">
                        <div class="flex items-center gap-1"><i class="fas fa-list-ol text-gray-400"></i> 100 Qs</div>
                        <div class="flex items-center gap-1"><i class="fas fa-clock text-gray-400"></i> 120 Mins</div>
                        <div class="flex items-center gap-1"><i class="fas fa-signal text-yellow-500"></i> Hard</div>
                    </div>
                    
                    <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-100 dark:border-gray-700">
                        <div>
                            <span class="text-xs text-gray-500">Syllabus: Complete</span>
                        </div>
                        <a href="/student/tests/attempt/3" class="bg-primary hover:bg-blue-600 text-white font-medium py-2 px-6 rounded-lg transition text-sm">Start Test</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
