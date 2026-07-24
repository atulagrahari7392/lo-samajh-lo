<!DOCTYPE html>
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
