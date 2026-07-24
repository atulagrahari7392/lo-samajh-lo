<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Lo Samajh Lo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f3f4f6; }
        .sidebar { background-color: #0F172A; }
        .text-sky-accent { color: #38BDF8; }
        .bg-sky-accent { background-color: #38BDF8; }
        .glassmorphism { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); }
    </style>
</head>
<body class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <aside class="sidebar w-64 h-full text-white flex flex-col hidden md:flex">
        <div class="p-4 flex items-center justify-center border-b border-gray-800">
            <h1 class="text-2xl font-bold text-sky-accent">Lo Samajh Lo</h1>
        </div>
        <div class="p-4">
            <div class="flex items-center space-x-3 mb-6">
                <div class="w-10 h-10 rounded-full bg-gray-500 flex items-center justify-center">A</div>
                <div>
                    <p class="text-sm font-semibold">Admin User</p>
                    <p class="text-xs text-gray-400">Super Admin</p>
                </div>
            </div>
        </div>
        <nav class="flex-1 overflow-y-auto px-4 space-y-1">
            <p class="text-xs text-gray-500 uppercase tracking-wider mb-2 mt-4">Overview</p>
            <a href="{{ route('admin.dashboard') }}" class="block py-2 px-3 rounded hover:bg-gray-800 text-sm">Dashboard</a>
            
            <p class="text-xs text-gray-500 uppercase tracking-wider mb-2 mt-4">Users</p>
            <a href="{{ route('admin.students.index') }}" class="block py-2 px-3 rounded hover:bg-gray-800 text-sm">Students</a>
            <a href="{{ route('admin.teachers.index') }}" class="block py-2 px-3 rounded hover:bg-gray-800 text-sm">Teachers</a>
            
            <p class="text-xs text-gray-500 uppercase tracking-wider mb-2 mt-4">Content</p>
            <a href="{{ route('admin.courses.index') }}" class="block py-2 px-3 rounded hover:bg-gray-800 text-sm">Courses</a>
            <a href="{{ route('admin.tests.index') }}" class="block py-2 px-3 rounded hover:bg-gray-800 text-sm">Tests</a>
            <a href="{{ route('admin.questions.index') }}" class="block py-2 px-3 rounded hover:bg-gray-800 text-sm">Questions</a>
            <a href="{{ route('admin.notes.index') }}" class="block py-2 px-3 rounded hover:bg-gray-800 text-sm">Notes</a>
            <a href="{{ route('admin.live-classes.index') }}" class="block py-2 px-3 rounded hover:bg-gray-800 text-sm">Live Classes</a>
            <a href="{{ route('admin.current-affairs.index') }}" class="block py-2 px-3 rounded hover:bg-gray-800 text-sm">Current Affairs</a>
            <a href="{{ route('admin.blog.index') }}" class="block py-2 px-3 rounded hover:bg-gray-800 text-sm">Blog</a>
            
            <p class="text-xs text-gray-500 uppercase tracking-wider mb-2 mt-4">Business</p>
            <a href="{{ route('admin.payments.index') }}" class="block py-2 px-3 rounded hover:bg-gray-800 text-sm">Payments</a>
            <a href="{{ route('admin.coupons.index') }}" class="block py-2 px-3 rounded hover:bg-gray-800 text-sm">Coupons</a>
            
            <p class="text-xs text-gray-500 uppercase tracking-wider mb-2 mt-4">System</p>
            <a href="{{ route('admin.notifications.index') }}" class="block py-2 px-3 rounded hover:bg-gray-800 text-sm">Notifications</a>
            <a href="{{ route('admin.settings.index') }}" class="block py-2 px-3 rounded hover:bg-gray-800 text-sm">Settings</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col h-full overflow-hidden">
        <!-- Topbar -->
        <header class="bg-white shadow-sm z-10 p-4 flex justify-between items-center">
            <button class="md:hidden p-2 text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
            <div class="text-gray-500 text-sm">Admin / Dashboard</div>
            <div class="flex items-center space-x-4">
                <button class="relative p-2 text-gray-400 hover:text-gray-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>
                <div class="w-8 h-8 rounded-full bg-gray-200"></div>
            </div>
        </header>

        <!-- Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
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
