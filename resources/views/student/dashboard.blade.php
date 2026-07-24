@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Welcome Section -->
    <div class="flex flex-col md:flex-row gap-4 items-center justify-between glassmorphism p-6 rounded-2xl bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-800 dark:to-gray-800">
        <div>
            <h1 class="text-2xl font-bold text-secondary dark:text-white mb-2">
                <span x-text="lang === 'en' ? 'Good Morning,' : 'सुप्रभात,'"></span> Aarav!
            </h1>
            <p class="text-gray-600 dark:text-gray-300 italic">"Success is the sum of small efforts, repeated day in and day out."</p>
        </div>
        <div class="flex items-center gap-3 bg-white dark:bg-gray-700 px-4 py-2 rounded-xl shadow-sm">
            <div class="bg-orange-100 text-orange-500 p-2 rounded-lg">
                <i class="fas fa-fire text-xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400 font-medium" x-text="lang === 'en' ? 'Study Streak' : 'स्टडी स्ट्रीक'"></p>
                <p class="font-bold text-lg dark:text-white">12 Days</p>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white dark:bg-gray-800 p-4 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 flex items-center gap-4">
            <div class="bg-blue-100 text-primary p-3 rounded-full"><i class="fas fa-book-open"></i></div>
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400" x-text="lang === 'en' ? 'Courses Enrolled' : 'नामांकित कोर्स'"></p>
                <p class="font-bold text-xl dark:text-white">4</p>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 p-4 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 flex items-center gap-4">
            <div class="bg-green-100 text-green-600 p-3 rounded-full"><i class="fas fa-check-circle"></i></div>
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400" x-text="lang === 'en' ? 'Tests Given' : 'दिए गए टेस्ट'"></p>
                <p class="font-bold text-xl dark:text-white">28</p>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 p-4 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 flex items-center gap-4">
            <div class="bg-purple-100 text-purple-600 p-3 rounded-full"><i class="fas fa-chart-line"></i></div>
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400" x-text="lang === 'en' ? 'Avg Score' : 'औसत स्कोर'"></p>
                <p class="font-bold text-xl dark:text-white">76%</p>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 p-4 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 flex items-center gap-4">
            <div class="bg-yellow-100 text-yellow-600 p-3 rounded-full"><i class="fas fa-trophy"></i></div>
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400" x-text="lang === 'en' ? 'Current Rank' : 'वर्तमान रैंक'"></p>
                <p class="font-bold text-xl dark:text-white">142</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Column (Main Content) -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Continue Learning -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm p-6 border border-gray-100 dark:border-gray-700">
                <h2 class="text-lg font-bold mb-4 dark:text-white" x-text="lang === 'en' ? 'Continue Learning' : 'पढ़ाई जारी रखें'"></h2>
                <div class="flex gap-4 items-center bg-gray-50 dark:bg-gray-700 p-4 rounded-xl">
                    <img src="https://placehold.co/100x70" class="rounded-lg object-cover" alt="Course">
                    <div class="flex-1">
                        <h3 class="font-bold dark:text-white">Indian Polity Foundation</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300">Lesson 12: Fundamental Rights - Part 2</p>
                        <div class="w-full bg-gray-200 rounded-full h-2 mt-2 dark:bg-gray-600">
                            <div class="bg-primary h-2 rounded-full" style="width: 65%"></div>
                        </div>
                        <p class="text-xs text-right mt-1 text-gray-500 dark:text-gray-400">65% Complete</p>
                    </div>
                    <button class="bg-primary hover:bg-blue-600 text-white p-3 rounded-full transition">
                        <i class="fas fa-play"></i>
                    </button>
                </div>
            </div>

            <!-- Performance Chart -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm p-6 border border-gray-100 dark:border-gray-700">
                <h2 class="text-lg font-bold mb-4 dark:text-white" x-text="lang === 'en' ? 'Performance Overview' : 'प्रदर्शन अवलोकन'"></h2>
                <canvas id="performanceChart" height="100"></canvas>
            </div>

            <!-- Recent Tests -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm p-6 border border-gray-100 dark:border-gray-700">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold dark:text-white" x-text="lang === 'en' ? 'Recent Tests' : 'हाल के टेस्ट'"></h2>
                    <a href="/student/tests" class="text-primary text-sm hover:underline">View All</a>
                </div>
                <div class="space-y-3">
                    <div class="flex justify-between items-center p-3 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg border border-gray-100 dark:border-gray-600">
                        <div>
                            <p class="font-semibold dark:text-white">Mock Test 5: Modern History</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Oct 24, 2023</p>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-green-600">85/100</p>
                            <a href="#" class="text-xs text-primary hover:underline">View Result</a>
                        </div>
                    </div>
                    <div class="flex justify-between items-center p-3 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg border border-gray-100 dark:border-gray-600">
                        <div>
                            <p class="font-semibold dark:text-white">Topic Test: Economics</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Oct 20, 2023</p>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-orange-500">62/100</p>
                            <a href="#" class="text-xs text-primary hover:underline">View Result</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column (Sidebar Widgets) -->
        <div class="space-y-6">
            <!-- Upcoming Classes -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm p-6 border border-gray-100 dark:border-gray-700">
                <h2 class="text-lg font-bold mb-4 dark:text-white flex items-center gap-2">
                    <span class="relative flex h-3 w-3">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                    </span>
                    <span x-text="lang === 'en' ? 'Upcoming Live Classes' : 'आगामी लाइव क्लास'"></span>
                </h2>
                <div class="space-y-4">
                    <div class="bg-blue-50 dark:bg-blue-900/30 p-4 rounded-xl border border-blue-100 dark:border-blue-800">
                        <div class="flex justify-between items-start mb-2">
                            <span class="text-xs font-semibold bg-blue-100 text-blue-800 px-2 py-1 rounded dark:bg-blue-800 dark:text-blue-100">Geography</span>
                            <span class="text-xs font-medium text-red-500">Starts in 45m</span>
                        </div>
                        <h3 class="font-bold text-sm dark:text-white">Indian Geography: Rivers</h3>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1"><i class="fas fa-user-tie mr-1"></i> Raj Sir</p>
                        <button class="w-full mt-3 bg-primary hover:bg-blue-600 text-white py-2 rounded-lg text-sm transition">Join Class</button>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-xl border border-gray-100 dark:border-gray-600">
                        <div class="flex justify-between items-start mb-2">
                            <span class="text-xs font-semibold bg-gray-200 text-gray-800 px-2 py-1 rounded dark:bg-gray-600 dark:text-gray-200">History</span>
                            <span class="text-xs font-medium text-gray-500">Tomorrow, 10:00 AM</span>
                        </div>
                        <h3 class="font-bold text-sm dark:text-white">Mughal Empire</h3>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1"><i class="fas fa-user-tie mr-1"></i> Amit Sir</p>
                    </div>
                </div>
            </div>

            <!-- Leaderboard Widget -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm p-6 border border-gray-100 dark:border-gray-700">
                <h2 class="text-lg font-bold mb-4 dark:text-white" x-text="lang === 'en' ? 'Leaderboard (This Week)' : 'लीडरबोर्ड'"></h2>
                <div class="space-y-3">
                    <div class="flex items-center gap-3 p-2 rounded-lg bg-yellow-50 dark:bg-yellow-900/20">
                        <span class="font-bold text-yellow-600 w-4">1</span>
                        <img src="https://ui-avatars.com/api/?name=Rohan" class="w-8 h-8 rounded-full">
                        <span class="font-medium dark:text-white flex-1 text-sm">Rohan Sharma</span>
                        <span class="font-bold text-gray-700 dark:text-gray-300 text-sm">950 pt</span>
                    </div>
                    <div class="flex items-center gap-3 p-2 rounded-lg bg-gray-100 dark:bg-gray-700">
                        <span class="font-bold text-gray-500 w-4">2</span>
                        <img src="https://ui-avatars.com/api/?name=Priya" class="w-8 h-8 rounded-full">
                        <span class="font-medium dark:text-white flex-1 text-sm">Priya Singh</span>
                        <span class="font-bold text-gray-700 dark:text-gray-300 text-sm">890 pt</span>
                    </div>
                    <div class="flex items-center gap-3 p-2 rounded-lg border-2 border-primary/30 bg-blue-50 dark:bg-blue-900/20">
                        <span class="font-bold text-primary w-4">142</span>
                        <img src="https://ui-avatars.com/api/?name=Student" class="w-8 h-8 rounded-full border border-primary">
                        <span class="font-bold text-primary flex-1 text-sm">You</span>
                        <span class="font-bold text-primary text-sm">420 pt</span>
                    </div>
                </div>
            </div>

            <!-- Achievements -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm p-6 border border-gray-100 dark:border-gray-700">
                <h2 class="text-lg font-bold mb-4 dark:text-white" x-text="lang === 'en' ? 'Recent Badges' : 'हाल के बैज'"></h2>
                <div class="flex gap-2 justify-between">
                    <div class="text-center">
                        <div class="bg-yellow-100 p-3 rounded-full inline-block text-yellow-600 mb-1"><i class="fas fa-star text-xl"></i></div>
                        <p class="text-xs dark:text-gray-300">First 100%</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-blue-100 p-3 rounded-full inline-block text-blue-600 mb-1"><i class="fas fa-bolt text-xl"></i></div>
                        <p class="text-xs dark:text-gray-300">7 Day Streak</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-purple-100 p-3 rounded-full inline-block text-purple-600 mb-1"><i class="fas fa-book text-xl"></i></div>
                        <p class="text-xs dark:text-gray-300">Bookworm</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('performanceChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Mock Test Scores (%)',
                    data: [65, 59, 80, 81, 56, 75, 85],
                    borderColor: '#0284c7',
                    backgroundColor: 'rgba(2, 132, 199, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true, max: 100 }
                }
            }
        });
    });
</script>
@endpush
