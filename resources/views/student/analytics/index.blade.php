@extends('layouts.dashboard')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold dark:text-white mb-2">Performance Analytics</h1>
    <p class="text-gray-500 dark:text-gray-400">Deep dive into your strengths and weaknesses.</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
    <!-- Score Trend Chart (Reuse the ChartJS setup from dashboard) -->
    <div class="glass-card bg-white dark:bg-dark-card border border-gray-200 dark:border-gray-800 p-6 shadow-sm">
        <h3 class="font-bold text-lg dark:text-white mb-6">Score Trend (Last 10 Tests)</h3>
        <div class="h-64 relative w-full">
            <canvas id="performanceChart"></canvas>
        </div>
    </div>

    <!-- Subject Radar Placeholder -->
    <div class="glass-card bg-white dark:bg-dark-card border border-gray-200 dark:border-gray-800 p-6 shadow-sm flex flex-col items-center justify-center relative overflow-hidden">
        <h3 class="font-bold text-lg dark:text-white mb-6 self-start w-full">Subject Proficiency</h3>
        <!-- Pure CSS Radar chart representation (for visual placeholder) -->
        <div class="relative w-48 h-48 mb-4">
            <!-- Polygon borders -->
            <svg viewBox="0 0 100 100" class="w-full h-full text-gray-200 dark:text-gray-700 overflow-visible">
                <polygon points="50,5 95,25 95,75 50,95 5,75 5,25" fill="none" stroke="currentColor" stroke-width="1"/>
                <polygon points="50,20 80,35 80,65 50,80 20,65 20,35" fill="none" stroke="currentColor" stroke-width="1"/>
                <!-- Data Polygon -->
                <polygon points="50,15 85,45 70,60 50,75 15,60 40,30" fill="rgba(14, 165, 233, 0.4)" stroke="#0EA5E9" stroke-width="2"/>
            </svg>
            <!-- Labels -->
            <span class="absolute -top-4 left-1/2 -translate-x-1/2 text-xs font-bold text-gray-500 whitespace-nowrap">Teaching</span>
            <span class="absolute top-1/4 -right-12 text-xs font-bold text-gray-500 whitespace-nowrap">Research</span>
            <span class="absolute bottom-1/4 -right-8 text-xs font-bold text-gray-500 whitespace-nowrap">DI</span>
            <span class="absolute -bottom-4 left-1/2 -translate-x-1/2 text-xs font-bold text-gray-500 whitespace-nowrap">Math</span>
            <span class="absolute bottom-1/4 -left-12 text-xs font-bold text-gray-500 whitespace-nowrap">Logic</span>
            <span class="absolute top-1/4 -left-16 text-xs font-bold text-gray-500 whitespace-nowrap">Environment</span>
        </div>
        <p class="text-xs text-gray-500 text-center mt-6">Your data interpretation skills are lagging behind your teaching aptitude.</p>
    </div>
</div>

<div class="glass-card bg-white dark:bg-dark-card border border-gray-200 dark:border-gray-800 p-6 shadow-sm">
    <h3 class="font-bold text-lg dark:text-white mb-6">Topic-wise Breakdown</h3>
    
    <div class="space-y-6">
        <div>
            <div class="flex justify-between items-center mb-2">
                <span class="font-bold text-sm dark:text-white">Teaching Aptitude</span>
                <span class="text-sm font-bold text-green-500">85% Accuracy</span>
            </div>
            <div class="w-full h-2 bg-gray-100 dark:bg-gray-800 rounded-full overflow-hidden">
                <div class="h-full bg-green-500 rounded-full" style="width: 85%"></div>
            </div>
        </div>
        
        <div>
            <div class="flex justify-between items-center mb-2">
                <span class="font-bold text-sm dark:text-white">Research Aptitude</span>
                <span class="text-sm font-bold text-primary-500">70% Accuracy</span>
            </div>
            <div class="w-full h-2 bg-gray-100 dark:bg-gray-800 rounded-full overflow-hidden">
                <div class="h-full bg-primary-500 rounded-full" style="width: 70%"></div>
            </div>
        </div>
        
        <div>
            <div class="flex justify-between items-center mb-2">
                <span class="font-bold text-sm dark:text-white">Data Interpretation</span>
                <span class="text-sm font-bold text-red-500">45% Accuracy</span>
            </div>
            <div class="w-full h-2 bg-gray-100 dark:bg-gray-800 rounded-full overflow-hidden">
                <div class="h-full bg-red-500 rounded-full" style="width: 45%"></div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script src="/js/dashboard.js"></script>
@endpush
