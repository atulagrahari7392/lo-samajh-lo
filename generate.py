import os

project_root = r'C:\Users\atula\.gemini\antigravity\scratch\lo-samajh-lo'

files_to_create = {}

# 1. Layouts Dashboard
files_to_create[r'resources\views\layouts\dashboard.blade.php'] = '''<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Dashboard') - Lo Samajh Lo</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#0284c7', // Sky blue
                        secondary: '#1e3a8a', // Navy
                        accent: '#38bdf8',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <!-- Inter Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .glassmorphism {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
        .dark .glassmorphism {
            background: rgba(30, 58, 138, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-50 text-gray-800 dark:bg-gray-900 dark:text-gray-200 transition-colors duration-200" x-data="{ sidebarOpen: false, darkMode: false, lang: 'en' }">

    <!-- Top Navigation -->
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700 glassmorphism">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start">
                    <button @click="sidebarOpen = !sidebarOpen" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <a href="#" class="flex ml-2 md:mr-24">
                        <span class="self-center text-xl font-bold sm:text-2xl whitespace-nowrap text-secondary dark:text-primary">Lo Samajh Lo</span>
                    </a>
                </div>
                <div class="flex items-center gap-4">
                    <!-- Language Toggle -->
                    <button @click="lang = lang === 'en' ? 'hi' : 'en'" class="p-2 text-gray-500 rounded-lg hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 font-medium">
                        <span x-text="lang === 'en' ? 'HI' : 'EN'"></span>
                    </button>
                    
                    <!-- Dark Mode Toggle -->
                    <button @click="darkMode = !darkMode; document.documentElement.classList.toggle('dark')" class="p-2 text-gray-500 rounded-lg hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">
                        <i class="fas" :class="darkMode ? 'fa-sun' : 'fa-moon'"></i>
                    </button>

                    <!-- Notifications -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="p-2 text-gray-500 rounded-lg hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 relative">
                            <i class="fas fa-bell"></i>
                            <span class="absolute top-1 right-1 flex h-3 w-3">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                            </span>
                        </button>
                    </div>

                    <!-- Profile Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                            <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name=Student&background=0284c7&color=fff" alt="user photo">
                        </button>
                        <div x-show="open" @click.away="open = false" class="absolute right-0 z-50 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600">
                            <div class="px-4 py-3">
                                <p class="text-sm text-gray-900 dark:text-white">Student Name</p>
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300">student@example.com</p>
                            </div>
                            <ul class="py-1">
                                <li><a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a></li>
                                <li><a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <div class="mb-6 p-4 rounded-xl bg-gradient-to-r from-primary to-secondary text-white">
                <div class="flex items-center gap-3">
                    <img src="https://ui-avatars.com/api/?name=Student" class="rounded-full w-12 h-12 border-2 border-white">
                    <div>
                        <h4 class="font-bold text-sm">Aarav Kumar</h4>
                        <p class="text-xs text-blue-200">Target: UPSC CSE</p>
                    </div>
                </div>
            </div>
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="/student/dashboard" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->is('student/dashboard') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                        <i class="fas fa-home text-gray-500 transition duration-75 group-hover:text-primary"></i>
                        <span class="ml-3" x-text="lang === 'en' ? 'Dashboard' : 'डैशबोर्ड'">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/student/courses" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i class="fas fa-book-open text-gray-500 transition duration-75 group-hover:text-primary"></i>
                        <span class="ml-3" x-text="lang === 'en' ? 'My Courses' : 'मेरे कोर्स'">My Courses</span>
                    </a>
                </li>
                <li>
                    <a href="/student/tests" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i class="fas fa-laptop-code text-gray-500 transition duration-75 group-hover:text-primary"></i>
                        <span class="ml-3" x-text="lang === 'en' ? 'Tests' : 'टेस्ट'">Tests</span>
                    </a>
                </li>
                <li>
                    <a href="/student/live-classes" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i class="fas fa-video text-gray-500 transition duration-75 group-hover:text-primary"></i>
                        <span class="ml-3" x-text="lang === 'en' ? 'Live Classes' : 'लाइव क्लास'">Live Classes</span>
                        <span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
                    </a>
                </li>
                <li>
                    <a href="/student/notes" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i class="fas fa-file-pdf text-gray-500 transition duration-75 group-hover:text-primary"></i>
                        <span class="ml-3" x-text="lang === 'en' ? 'Notes' : 'नोट्स'">Notes</span>
                    </a>
                </li>
                <li>
                    <a href="/student/current-affairs" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i class="fas fa-globe text-gray-500 transition duration-75 group-hover:text-primary"></i>
                        <span class="ml-3" x-text="lang === 'en' ? 'Current Affairs' : 'करेंट अफेयर्स'">Current Affairs</span>
                    </a>
                </li>
                <li>
                    <a href="/student/bookmarks" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i class="fas fa-bookmark text-gray-500 transition duration-75 group-hover:text-primary"></i>
                        <span class="ml-3" x-text="lang === 'en' ? 'Bookmarks' : 'बुकमार्क'">Bookmarks</span>
                    </a>
                </li>
                <li>
                    <a href="/student/achievements" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i class="fas fa-medal text-gray-500 transition duration-75 group-hover:text-primary"></i>
                        <span class="ml-3" x-text="lang === 'en' ? 'Achievements' : 'उपलब्धियां'">Achievements</span>
                    </a>
                </li>
                <li>
                    <a href="/student/leaderboard" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i class="fas fa-trophy text-gray-500 transition duration-75 group-hover:text-primary"></i>
                        <span class="ml-3" x-text="lang === 'en' ? 'Leaderboard' : 'लीडरबोर्ड'">Leaderboard</span>
                    </a>
                </li>
                <li>
                    <a href="/student/profile" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i class="fas fa-user-cog text-gray-500 transition duration-75 group-hover:text-primary"></i>
                        <span class="ml-3" x-text="lang === 'en' ? 'Profile' : 'प्रोफाइल'">Profile</span>
                    </a>
                </li>
            </ul>
            <div class="absolute bottom-4 left-0 w-full px-4">
                <button class="w-full flex items-center justify-center p-2 text-white bg-red-500 hover:bg-red-600 rounded-lg transition">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    <span x-text="lang === 'en' ? 'Logout' : 'लॉग आउट'">Logout</span>
                </button>
            </div>
        </div>
    </aside>

    <div class="p-4 sm:ml-64 pt-24 min-h-screen">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="p-4 sm:ml-64 bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} Lo Samajh Lo. All rights reserved.
    </footer>

    @stack('scripts')
</body>
</html>
'''

# 2. Student Dashboard
files_to_create[r'resources\views\student\dashboard.blade.php'] = '''@extends('layouts.dashboard')

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
'''

# 3. Test Engine Attempt View
files_to_create[r'resources\views\student\tests\attempt.blade.php'] = '''<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Attempt - Lo Samajh Lo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; user-select: none; }
        .q-btn { width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 8px; font-weight: 600; cursor: pointer; transition: all 0.2s; border: 1px solid #e5e7eb; }
        .q-not-visited { background: #f3f4f6; color: #374151; }
        .q-not-answered { background: #fee2e2; color: #b91c1c; border-color: #f87171; }
        .q-answered { background: #dcfce7; color: #15803d; border-color: #4ade80; }
        .q-marked { background: #fef9c3; color: #a16207; border-color: #facc15; }
        .q-answered-marked { background: #e0e7ff; color: #4338ca; border-color: #818cf8; position: relative; }
        .q-answered-marked::after { content: ''; position: absolute; bottom: 2px; right: 2px; width: 8px; height: 8px; background: #22c55e; border-radius: 50%; }
        .q-active { ring: 2px solid #0284c7; outline: 2px solid #0284c7; outline-offset: 2px; }
        .option-label { display: flex; align-items: center; padding: 12px 16px; border: 1px solid #d1d5db; border-radius: 8px; cursor: pointer; transition: all 0.2s; margin-bottom: 12px; }
        .option-label:hover { background: #f3f4f6; }
        .option-input:checked + .option-label { border-color: #0284c7; background: #f0f9ff; box-shadow: 0 0 0 1px #0284c7; }
        .radio-custom { width: 20px; height: 20px; border: 2px solid #9ca3af; border-radius: 50%; margin-right: 12px; display: flex; align-items: center; justify-content: center; }
        .option-input:checked + .option-label .radio-custom { border-color: #0284c7; }
        .option-input:checked + .option-label .radio-custom::after { content: ''; width: 10px; height: 10px; background: #0284c7; border-radius: 50%; }
        .option-input { display: none; }
    </style>
</head>
<body class="bg-gray-100 h-screen flex flex-col overflow-hidden" x-data="testEngine()">

    <!-- Top Bar -->
    <header class="bg-white border-b border-gray-200 p-3 flex justify-between items-center shadow-sm shrink-0">
        <div class="flex items-center gap-4">
            <h1 class="font-bold text-xl text-gray-800">UPSC Prelims Mock Test 1</h1>
            <div class="hidden md:flex gap-2 ml-4 border-l pl-4">
                <button class="px-4 py-1.5 bg-blue-50 text-blue-700 border border-blue-200 rounded font-medium text-sm">Paper 1 (GS)</button>
            </div>
        </div>
        <div class="flex items-center gap-6">
            <div class="flex items-center gap-2 bg-gray-50 px-4 py-2 rounded-lg border" :class="timerColorClass">
                <i class="fas fa-clock"></i>
                <span class="font-mono text-xl font-bold font-tabular-nums" x-text="formattedTime">02:00:00</span>
            </div>
            <button @click="openSubmitModal = true" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg font-bold shadow-sm transition">
                Submit Test
            </button>
            <button @click="toggleFullScreen" class="text-gray-500 hover:text-gray-700" title="Toggle Fullscreen">
                <i class="fas fa-expand"></i>
            </button>
        </div>
    </header>

    <!-- Main Content Area -->
    <div class="flex flex-1 overflow-hidden">
        
        <!-- Left Panel: Question Area -->
        <main class="flex-1 flex flex-col bg-white m-4 rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            
            <!-- Question Header -->
            <div class="p-4 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                <div class="flex items-center gap-3">
                    <span class="bg-gray-800 text-white px-3 py-1 rounded text-sm font-bold">Q. <span x-text="currentQIndex + 1"></span></span>
                    <span class="text-xs font-semibold bg-blue-100 text-blue-800 px-2 py-0.5 rounded">Multiple Choice (MCQ)</span>
                    <span class="text-xs text-gray-500">+2.0, -0.66</span>
                </div>
                <div>
                    <span class="text-sm text-gray-500">Language:</span>
                    <select class="text-sm border-gray-300 rounded ml-1 outline-none">
                        <option>English</option>
                        <option>Hindi</option>
                    </select>
                </div>
            </div>

            <!-- Question Content (Scrollable) -->
            <div class="flex-1 overflow-y-auto p-6 md:p-8">
                <div class="text-lg text-gray-800 mb-8 leading-relaxed" x-html="questions[currentQIndex].text">
                    <!-- Question text injected here -->
                </div>

                <div class="space-y-4 max-w-3xl">
                    <template x-for="(option, idx) in questions[currentQIndex].options" :key="idx">
                        <div>
                            <input type="radio" :id="'opt_'+idx" :name="'q_'+currentQIndex" class="option-input" :value="idx" x-model="answers[currentQIndex]" @change="markAnswered()">
                            <label :for="'opt_'+idx" class="option-label">
                                <div class="radio-custom"></div>
                                <span class="font-medium mr-3 w-6 h-6 rounded bg-gray-100 flex items-center justify-center text-sm text-gray-600" x-text="String.fromCharCode(65 + idx)"></span>
                                <span class="text-gray-700" x-html="option"></span>
                            </label>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Bottom Action Bar -->
            <div class="p-4 border-t border-gray-200 bg-gray-50 flex justify-between items-center">
                <div class="flex gap-3">
                    <button @click="toggleMarkReview()" class="px-4 py-2 bg-yellow-50 text-yellow-700 border border-yellow-200 rounded-lg hover:bg-yellow-100 font-medium text-sm transition">
                        <i class="fas fa-bookmark mr-1"></i> 
                        <span x-text="marked[currentQIndex] ? 'Unmark Review' : 'Mark for Review'"></span>
                    </button>
                    <button @click="clearResponse()" class="px-4 py-2 bg-white text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-100 font-medium text-sm transition">
                        Clear Response
                    </button>
                </div>
                <div class="flex gap-3">
                    <button @click="prevQuestion()" :disabled="currentQIndex === 0" class="px-6 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 font-medium disabled:opacity-50 transition">
                        <i class="fas fa-chevron-left mr-2"></i> Previous
                    </button>
                    <button @click="nextQuestion()" class="px-8 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-bold transition shadow-md">
                        Save & Next <i class="fas fa-chevron-right ml-2"></i>
                    </button>
                </div>
            </div>
        </main>

        <!-- Right Panel: Question Palette -->
        <aside class="w-80 bg-white m-4 ml-0 rounded-xl shadow-sm border border-gray-200 flex flex-col overflow-hidden">
            <!-- User Info -->
            <div class="p-4 border-b border-gray-100 flex items-center gap-3">
                <img src="https://ui-avatars.com/api/?name=Student" class="w-10 h-10 rounded-full">
                <div>
                    <p class="font-bold text-gray-800 text-sm">Aarav Kumar</p>
                    <p class="text-xs text-gray-500">Roll: UP2456789</p>
                </div>
            </div>

            <!-- Legend -->
            <div class="p-4 border-b border-gray-100 bg-gray-50">
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Question Status</h3>
                <div class="grid grid-cols-2 gap-2 text-xs">
                    <div class="flex items-center gap-2"><div class="w-6 h-6 rounded q-answered flex items-center justify-center" x-text="stats.answered"></div> Answered</div>
                    <div class="flex items-center gap-2"><div class="w-6 h-6 rounded q-not-answered flex items-center justify-center" x-text="stats.notAnswered"></div> Not Answered</div>
                    <div class="flex items-center gap-2"><div class="w-6 h-6 rounded q-not-visited flex items-center justify-center" x-text="stats.notVisited"></div> Not Visited</div>
                    <div class="flex items-center gap-2"><div class="w-6 h-6 rounded q-marked flex items-center justify-center" x-text="stats.marked"></div> Marked</div>
                </div>
            </div>

            <!-- Palette Grid -->
            <div class="flex-1 p-4 overflow-y-auto">
                <div class="grid grid-cols-5 gap-2">
                    <template x-for="(q, idx) in questions" :key="idx">
                        <button 
                            class="q-btn"
                            :class="[getPaletteClass(idx), currentQIndex === idx ? 'q-active' : '']"
                            @click="jumpToQuestion(idx)"
                            x-text="idx + 1">
                        </button>
                    </template>
                </div>
            </div>
        </aside>
    </div>

    <!-- Submit Modal -->
    <div x-show="openSubmitModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50" style="display: none;">
        <div class="bg-white rounded-2xl shadow-xl max-w-md w-full p-6" @click.away="openSubmitModal = false">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Submit Test?</h2>
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="bg-green-50 p-3 rounded-lg border border-green-200 text-center">
                    <p class="text-2xl font-bold text-green-600" x-text="stats.answered"></p>
                    <p class="text-xs text-gray-600 uppercase font-semibold">Answered</p>
                </div>
                <div class="bg-red-50 p-3 rounded-lg border border-red-200 text-center">
                    <p class="text-2xl font-bold text-red-600" x-text="stats.notAnswered + stats.notVisited"></p>
                    <p class="text-xs text-gray-600 uppercase font-semibold">Unanswered</p>
                </div>
            </div>
            <p class="text-gray-600 mb-6 text-sm">Are you sure you want to submit the test? You cannot make changes after submission.</p>
            <div class="flex gap-3">
                <button @click="openSubmitModal = false" class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition">Cancel</button>
                <button @click="finalSubmit()" class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg font-bold hover:bg-red-700 transition">Yes, Submit</button>
            </div>
        </div>
    </div>

    <script>
        function testEngine() {
            return {
                questions: [
                    { text: "Which of the following schedules of the Constitution of India contains provisions regarding anti-defection?", options: ["Second Schedule", "Fifth Schedule", "Eighth Schedule", "Tenth Schedule"] },
                    { text: "In the context of India, which of the following is/are considered to be practice(s) of eco-friendly agriculture?<br>1. Crop diversification<br>2. Legume intensification<br>3. Tensiometer use<br>4. Vertical farming", options: ["1, 2 and 3 only", "3 only", "4 only", "1, 2, 3 and 4"] },
                    // More questions would be loaded here from backend
                ],
                currentQIndex: 0,
                answers: {}, // index -> option_index
                marked: {},  // index -> boolean
                visited: {0: true}, // index -> boolean
                timeLeft: 7200, // 2 hours in seconds
                openSubmitModal: false,
                
                init() {
                    // Populate mock questions up to 100 for visual testing
                    while(this.questions.length < 100) {
                        this.questions.push({ text: "Dummy Question " + (this.questions.length + 1), options: ["Option A", "Option B", "Option C", "Option D"] });
                    }
                    this.startTimer();
                },

                get stats() {
                    let ans = 0, notAns = 0, mark = 0, notVis = 0;
                    for (let i = 0; i < this.questions.length; i++) {
                        if (!this.visited[i]) notVis++;
                        else if (this.answers[i] !== undefined) ans++;
                        else notAns++;
                        
                        if (this.marked[i]) mark++;
                    }
                    return { answered: ans, notAnswered: notAns, marked: mark, notVisited: notVis };
                },

                getPaletteClass(idx) {
                    if (!this.visited[idx]) return 'q-not-visited';
                    const hasAns = this.answers[idx] !== undefined;
                    const isMarked = this.marked[idx];
                    
                    if (hasAns && isMarked) return 'q-answered-marked';
                    if (hasAns) return 'q-answered';
                    if (isMarked) return 'q-marked';
                    return 'q-not-answered';
                },

                nextQuestion() {
                    this.saveCurrent();
                    if (this.currentQIndex < this.questions.length - 1) {
                        this.currentQIndex++;
                        this.visited[this.currentQIndex] = true;
                    }
                },

                prevQuestion() {
                    this.saveCurrent();
                    if (this.currentQIndex > 0) {
                        this.currentQIndex--;
                        this.visited[this.currentQIndex] = true;
                    }
                },

                jumpToQuestion(idx) {
                    this.saveCurrent();
                    this.currentQIndex = idx;
                    this.visited[idx] = true;
                },

                markAnswered() {
                    // Trigger reactivity when radio changes
                },

                toggleMarkReview() {
                    this.marked[this.currentQIndex] = !this.marked[this.currentQIndex];
                },

                clearResponse() {
                    delete this.answers[this.currentQIndex];
                },

                saveCurrent() {
                    // AJAX call to save answer would go here
                },

                finalSubmit() {
                    alert("Test Submitted Successfully!");
                    window.location.href = "/student/tests/result/1";
                },

                // Timer Logic
                startTimer() {
                    setInterval(() => {
                        if(this.timeLeft > 0) this.timeLeft--;
                        else this.autoSubmit();
                    }, 1000);
                },
                
                get formattedTime() {
                    let h = Math.floor(this.timeLeft / 3600);
                    let m = Math.floor((this.timeLeft % 3600) / 60);
                    let s = this.timeLeft % 60;
                    return `${h.toString().padStart(2, '0')}:${m.toString().padStart(2, '0')}:${s.toString().padStart(2, '0')}`;
                },
                
                get timerColorClass() {
                    return this.timeLeft < 300 ? 'text-red-600 border-red-300 bg-red-50 animate-pulse' : 'text-gray-700';
                },

                autoSubmit() {
                    // Force submit when timer ends
                    this.finalSubmit();
                },

                toggleFullScreen() {
                    if (!document.fullscreenElement) {
                        document.documentElement.requestFullscreen().catch(err => {
                            console.log(`Error attempting to enable full-screen mode: ${err.message} (${err.name})`);
                        });
                    } else {
                        if (document.exitFullscreen) {
                            document.exitFullscreen();
                        }
                    }
                }
            }
        }
    </script>
</body>
</html>
'''

# 4. Result View
files_to_create[r'resources\views\student\tests\result.blade.php'] = '''@extends('layouts.dashboard')
@section('title', 'Test Result')
@section('content')
<div class="max-w-6xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold dark:text-white">UPSC Prelims Mock Test 1 Result</h1>
            <p class="text-gray-500">Attempted on 24 Oct 2023</p>
        </div>
        <div class="flex gap-3">
            <a href="/student/tests/review/1" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-50 dark:bg-gray-800 dark:text-white dark:border-gray-600">Review Answers</a>
            <button class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-blue-600 shadow">Download PDF</button>
        </div>
    </div>

    <!-- Main Score Card -->
    <div class="bg-white dark:bg-gray-800 rounded-3xl p-8 shadow-sm border border-gray-100 dark:border-gray-700 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-br from-blue-100 to-purple-100 dark:from-blue-900/20 dark:to-purple-900/20 rounded-full blur-3xl -mr-10 -mt-10 opacity-50 pointer-events-none"></div>
        
        <div class="flex flex-col md:flex-row items-center justify-between relative z-10">
            <div class="text-center md:text-left mb-6 md:mb-0">
                <span class="px-3 py-1 bg-green-100 text-green-800 font-bold rounded-full text-sm mb-4 inline-block">QUALIFIED</span>
                <h2 class="text-5xl font-black text-gray-800 dark:text-white mt-2">114.66 <span class="text-xl text-gray-400 font-medium">/ 200</span></h2>
                <p class="text-gray-500 dark:text-gray-400 mt-2">You scored better than 82% of students.</p>
            </div>

            <div class="flex gap-8">
                <div class="text-center">
                    <div class="w-24 h-24 rounded-full border-8 border-green-500 flex items-center justify-center mb-2 mx-auto">
                        <span class="text-2xl font-bold dark:text-white">85%</span>
                    </div>
                    <p class="text-sm text-gray-500 font-medium">Accuracy</p>
                </div>
                <div class="text-center">
                    <div class="w-24 h-24 rounded-full border-8 border-blue-500 flex items-center justify-center mb-2 mx-auto">
                        <span class="text-xl font-bold dark:text-white">424</span>
                    </div>
                    <p class="text-sm text-gray-500 font-medium">Rank (Out of 5k)</p>
                </div>
            </div>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-8 border-t border-gray-100 dark:border-gray-700 pt-8">
            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-xl text-center">
                <p class="text-gray-500 dark:text-gray-400 text-sm mb-1">Correct</p>
                <p class="text-2xl font-bold text-green-600">64</p>
            </div>
            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-xl text-center">
                <p class="text-gray-500 dark:text-gray-400 text-sm mb-1">Incorrect</p>
                <p class="text-2xl font-bold text-red-600">20</p>
            </div>
            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-xl text-center">
                <p class="text-gray-500 dark:text-gray-400 text-sm mb-1">Skipped</p>
                <p class="text-2xl font-bold text-gray-600 dark:text-gray-300">16</p>
            </div>
            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-xl text-center">
                <p class="text-gray-500 dark:text-gray-400 text-sm mb-1">Time Taken</p>
                <p class="text-xl font-bold text-gray-800 dark:text-white">1h 45m</p>
            </div>
        </div>
    </div>

    <!-- Section Analysis -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm border border-gray-100 dark:border-gray-700">
        <h3 class="text-lg font-bold mb-4 dark:text-white">Subject-wise Breakdown</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 dark:bg-gray-700 text-gray-500 dark:text-gray-300 text-sm">
                        <th class="p-3 rounded-l-lg">Subject</th>
                        <th class="p-3">Total Qs</th>
                        <th class="p-3">Correct</th>
                        <th class="p-3">Wrong</th>
                        <th class="p-3">Score</th>
                        <th class="p-3 rounded-r-lg">Accuracy</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    <tr class="border-b border-gray-100 dark:border-gray-700">
                        <td class="p-3 font-medium dark:text-white">History</td>
                        <td class="p-3 dark:text-gray-300">20</td>
                        <td class="p-3 text-green-600">15</td>
                        <td class="p-3 text-red-600">3</td>
                        <td class="p-3 font-bold dark:text-white">28.02</td>
                        <td class="p-3">
                            <div class="w-full bg-gray-200 rounded-full h-1.5 dark:bg-gray-600"><div class="bg-green-500 h-1.5 rounded-full" style="width: 83%"></div></div>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-100 dark:border-gray-700">
                        <td class="p-3 font-medium dark:text-white">Polity</td>
                        <td class="p-3 dark:text-gray-300">20</td>
                        <td class="p-3 text-green-600">18</td>
                        <td class="p-3 text-red-600">1</td>
                        <td class="p-3 font-bold dark:text-white">35.34</td>
                        <td class="p-3">
                            <div class="w-full bg-gray-200 rounded-full h-1.5 dark:bg-gray-600"><div class="bg-green-500 h-1.5 rounded-full" style="width: 94%"></div></div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
'''

# 5. Review View
files_to_create[r'resources\views\student\tests\review.blade.php'] = '''@extends('layouts.dashboard')
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
'''

# 6. Controllers
files_to_create[r'app\Http\Controllers\Student\DashboardController.php'] = '''<?php
namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Dummy data for now
        $data = [
            'enrolled_courses' => 4,
            'tests_given' => 28,
            'avg_score' => 76,
            'rank' => 142,
            'streak' => 12
        ];
        return view('student.dashboard', $data);
    }
}
'''

files_to_create[r'app\Http\Controllers\Student\TestController.php'] = '''<?php
namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index() { return view('student.tests.index'); }
    public function attempt($id) { return view('student.tests.attempt'); }
    public function result($id) { return view('student.tests.result'); }
    public function review($id) { return view('student.tests.review'); }
    
    public function saveAnswer(Request $request) {
        // Logic to save answer via AJAX
        return response()->json(['status' => 'success']);
    }
    
    public function submit(Request $request) {
        // Logic to process final submission
        return response()->json(['status' => 'success', 'redirect' => route('student.tests.result', 1)]);
    }
}
'''

# 7. Courses Index
files_to_create[r'resources\views\student\courses\index.blade.php'] = '''@extends('layouts.dashboard')
@section('title', 'My Courses')
@section('content')
<div>
    <h1 class="text-2xl font-bold mb-6 dark:text-white">My Courses</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-sm border border-gray-200 dark:border-gray-700">
            <img src="https://placehold.co/600x300" class="w-full h-40 object-cover">
            <div class="p-4">
                <span class="text-xs font-bold text-primary bg-blue-50 px-2 py-1 rounded">UPSC CSE</span>
                <h3 class="font-bold mt-2 dark:text-white">Indian Polity Complete Foundation</h3>
                <p class="text-sm text-gray-500 mt-1"><i class="fas fa-user-tie"></i> Raj Sir</p>
                <div class="mt-4">
                    <div class="flex justify-between text-xs mb-1 dark:text-gray-300"><span>Progress</span><span>65%</span></div>
                    <div class="w-full bg-gray-200 rounded-full h-1.5 dark:bg-gray-600">
                        <div class="bg-primary h-1.5 rounded-full" style="width: 65%"></div>
                    </div>
                </div>
                <a href="/student/courses/show" class="block w-full text-center mt-4 bg-primary hover:bg-blue-600 text-white py-2 rounded-lg transition">Resume Learning</a>
            </div>
        </div>
    </div>
</div>
@endsection
'''

# 8. Test JS
files_to_create[r'resources\js\test-engine.js'] = '''// Test Engine Core Logic
class TestEngine {
    constructor(config) {
        this.attemptId = config.attemptId;
        this.questions = config.questions || [];
        this.currentQIndex = 0;
        this.answers = JSON.parse(localStorage.getItem('test_ans_'+this.attemptId)) || {};
        this.marked = JSON.parse(localStorage.getItem('test_mark_'+this.attemptId)) || {};
        this.timeLeft = config.durationSeconds;
        this.timerInterval = null;
        this.init();
    }

    init() {
        this.startTimer();
        this.autoSave();
        this.setupKeyboardNav();
        this.detectTabSwitch();
    }

    startTimer() {
        this.timerInterval = setInterval(() => {
            if (this.timeLeft > 0) {
                this.timeLeft--;
                // Update UI timer
            } else {
                this.submitTest();
            }
        }, 1000);
    }

    selectAnswer(qIndex, val) {
        this.answers[qIndex] = val;
        this.saveLocally();
    }

    saveLocally() {
        localStorage.setItem('test_ans_'+this.attemptId, JSON.stringify(this.answers));
        localStorage.setItem('test_mark_'+this.attemptId, JSON.stringify(this.marked));
    }

    autoSave() {
        setInterval(() => {
            // AJAX POST to save state to server
            console.log('Auto-saving to server...');
        }, 30000);
    }

    submitTest() {
        clearInterval(this.timerInterval);
        localStorage.removeItem('test_ans_'+this.attemptId);
        localStorage.removeItem('test_mark_'+this.attemptId);
        // AJAX POST to submit
        alert('Test Submitted');
    }

    setupKeyboardNav() {
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowRight') this.nextQuestion();
            if (e.key === 'ArrowLeft') this.prevQuestion();
            if (e.key === 'm' || e.key === 'M') this.toggleMark();
        });
    }

    detectTabSwitch() {
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                alert('Warning: Switching tabs is not allowed during the test!');
                // Could record warning to server
            }
        });
    }
}
'''

# 9. Remaining controllers stub
controllers = ['CourseController', 'NoteController', 'LiveClassController', 'ProfileController', 'BookmarkController', 'LeaderboardController', 'CurrentAffairsController', 'AchievementController']

for ctrl in controllers:
    files_to_create[f'app\\Http\\Controllers\\Student\\{ctrl}.php'] = f'''<?php
namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class {ctrl} extends Controller
{{
    public function index()
    {{
        return view('student.{ctrl.replace("Controller", "").lower()}.index');
    }}
}}
'''

# 10. Remaining Views stub
views = ['tests/index', 'courses/show', 'courses/lesson', 'notes/index', 'live-classes/index', 'current-affairs/index', 'profile/index', 'achievements/index', 'leaderboard/index', 'bookmarks/index']

for view in views:
    files_to_create[f'resources\\views\\student\\{view}.blade.php'] = f'''@extends('layouts.dashboard')
@section('title', '{view.split("/")[0].title()}')
@section('content')
<div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow-sm">
    <h1 class="text-2xl font-bold dark:text-white">{view.split("/")[0].title()} - Index</h1>
    <p class="mt-4 text-gray-500">This is a placeholder for the {view} view. Replace with full design.</p>
</div>
@endsection
'''

for filepath, content in files_to_create.items():
    full_path = os.path.join(project_root, filepath)
    os.makedirs(os.path.dirname(full_path), exist_ok=True)
    with open(full_path, 'w', encoding='utf-8') as f:
        f.write(content)
    print(f"Created {full_path}")
