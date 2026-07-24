@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-slate-900">AI Performance Coach</h1>
            <p class="mt-2 text-sm text-slate-500">Deep analytics and actionable feedback to continuously improve your scores.</p>
        </div>

        <!-- Metrics Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Metric Card 1 -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 relative overflow-hidden group">
                <div class="absolute right-0 top-0 w-24 h-24 bg-rose-50 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110"></div>
                <dt class="text-sm font-medium text-slate-500 truncate mb-1 relative z-10">Overall Accuracy</dt>
                <dd class="flex items-baseline relative z-10">
                    <span class="text-3xl font-bold text-slate-900">78%</span>
                    <span class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                        <svg class="self-center flex-shrink-0 h-4 w-4 text-green-500" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Increased by</span>
                        4.5%
                    </span>
                </dd>
            </div>

            <!-- Metric Card 2 -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 relative overflow-hidden group">
                <div class="absolute right-0 top-0 w-24 h-24 bg-blue-50 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110"></div>
                <dt class="text-sm font-medium text-slate-500 truncate mb-1 relative z-10">Study Streak</dt>
                <dd class="flex items-baseline relative z-10">
                    <span class="text-3xl font-bold text-slate-900">12</span>
                    <span class="ml-1 text-xl font-medium text-slate-500">Days</span>
                </dd>
            </div>

            <!-- Metric Card 3 -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 relative overflow-hidden group">
                <div class="absolute right-0 top-0 w-24 h-24 bg-amber-50 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110"></div>
                <dt class="text-sm font-medium text-slate-500 truncate mb-1 relative z-10">Weakest Subject</dt>
                <dd class="flex items-baseline relative z-10">
                    <span class="text-2xl font-bold text-slate-900">Chemistry</span>
                </dd>
            </div>

            <!-- Metric Card 4 -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 relative overflow-hidden group">
                <div class="absolute right-0 top-0 w-24 h-24 bg-indigo-50 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110"></div>
                <dt class="text-sm font-medium text-slate-500 truncate mb-1 relative z-10">Strongest Subject</dt>
                <dd class="flex items-baseline relative z-10">
                    <span class="text-2xl font-bold text-slate-900">Physics</span>
                </dd>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- AI Analysis -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-8">
                    <h2 class="text-xl font-bold text-slate-900 mb-6 flex items-center">
                        <svg class="h-6 w-6 text-rose-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        Performance Trajectory
                    </h2>
                    <!-- Placeholder for Chart -->
                    <div class="h-72 w-full bg-slate-50 rounded-xl border border-slate-100 flex items-center justify-center text-slate-400">
                        [Interactive Performance Chart]
                    </div>
                </div>
            </div>

            <!-- Actionable Feedback -->
            <div>
                <div class="bg-gradient-to-br from-rose-500 to-orange-500 rounded-3xl shadow-lg p-8 text-white h-full">
                    <div class="flex items-center mb-6">
                        <div class="p-2 bg-white/20 rounded-lg backdrop-blur-sm mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold">Coach's Advice</h2>
                    </div>
                    
                    <div class="space-y-6">
                        <div class="bg-white/10 rounded-xl p-4 backdrop-blur-sm">
                            <h3 class="font-semibold text-sm mb-2 text-rose-100 uppercase tracking-wider">Priority Area</h3>
                            <p class="text-white text-sm">Your accuracy in Organic Chemistry mechanisms is dropping. I recommend re-watching Module 3 and taking a focused practice test.</p>
                        </div>
                        <div class="bg-white/10 rounded-xl p-4 backdrop-blur-sm">
                            <h3 class="font-semibold text-sm mb-2 text-rose-100 uppercase tracking-wider">Time Management</h3>
                            <p class="text-white text-sm">You are spending an average of 4 minutes on Math MCQ questions. Try to use elimination strategies to reduce this to under 2 minutes.</p>
                        </div>
                    </div>
                    
                    <button class="mt-8 w-full bg-white text-rose-600 font-bold py-3 px-4 rounded-xl shadow-md hover:bg-rose-50 transition transform hover:-translate-y-0.5">
                        Generate Custom Practice Test
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
