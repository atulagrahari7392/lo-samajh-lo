<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Panel - Lo Samajh Lo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; }
        .sidebar { background-color: #ffffff; border-right: 1px solid #e2e8f0; }
        .text-navy { color: #0F172A; }
        .glassmorphism { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); }
    </style>
</head>
<body class="flex h-screen overflow-hidden">
    <aside class="sidebar w-64 h-full text-navy flex flex-col hidden md:flex">
        <div class="p-4 flex items-center justify-center border-b border-gray-200">
            <h1 class="text-2xl font-bold text-sky-500">Lo Samajh Lo</h1>
        </div>
        <div class="p-4 border-b border-gray-200">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">T</div>
                <div>
                    <p class="text-sm font-semibold">Teacher Name</p>
                    <p class="text-xs text-gray-500">Mathematics</p>
                </div>
            </div>
        </div>
        <nav class="flex-1 overflow-y-auto px-4 space-y-1 mt-4">
            <a href="{{ route('teacher.dashboard') }}" class="block py-2 px-3 rounded hover:bg-gray-100 text-sm font-medium">Dashboard</a>
            <a href="{{ route('teacher.courses.index') }}" class="block py-2 px-3 rounded hover:bg-gray-100 text-sm font-medium">My Courses</a>
            <a href="{{ route('teacher.lessons.index') }}" class="block py-2 px-3 rounded hover:bg-gray-100 text-sm font-medium">Lessons</a>
            <a href="{{ route('teacher.tests.index') }}" class="block py-2 px-3 rounded hover:bg-gray-100 text-sm font-medium">Tests</a>
            <a href="{{ route('teacher.questions.index') }}" class="block py-2 px-3 rounded hover:bg-gray-100 text-sm font-medium">Questions</a>
            <a href="{{ route('teacher.live-classes.index') }}" class="block py-2 px-3 rounded hover:bg-gray-100 text-sm font-medium">Live Classes</a>
            <a href="{{ route('teacher.notes.index') }}" class="block py-2 px-3 rounded hover:bg-gray-100 text-sm font-medium">Notes</a>
            <a href="{{ route('teacher.students.index') }}" class="block py-2 px-3 rounded hover:bg-gray-100 text-sm font-medium">My Students</a>
            <a href="{{ route('teacher.reports.index') }}" class="block py-2 px-3 rounded hover:bg-gray-100 text-sm font-medium">Reports & Revenue</a>
            <a href="{{ route('teacher.profile.index') }}" class="block py-2 px-3 rounded hover:bg-gray-100 text-sm font-medium">Profile</a>
        </nav>
    </aside>
    
    <div class="flex-1 flex flex-col h-full overflow-hidden">
        <header class="bg-white shadow-sm z-10 p-4 flex justify-between items-center">
            <button class="md:hidden p-2 text-gray-600">Menu</button>
            <div class="text-gray-500 text-sm">Teacher / Dashboard</div>
            <div class="flex items-center space-x-4">
                <button class="relative p-2 text-gray-400 hover:text-gray-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                </button>
            </div>
        </header>
        
        <main class="flex-1 overflow-x-hidden overflow-y-auto p-6 bg-slate-50">
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            @if(session('error'))
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
