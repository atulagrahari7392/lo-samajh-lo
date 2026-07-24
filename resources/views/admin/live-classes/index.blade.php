@extends('layouts.admin')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Live Classes</h2>
        <p class="text-gray-500 text-sm mt-1">Schedule and manage live sessions.</p>
    </div>
    <div class="flex space-x-3">
        <a href="{{ route('admin.live-classes.create') }}" class="px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded-lg text-sm font-medium transition-colors">
            + Schedule Live Class
        </a>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Upcoming Classes List -->
    <div class="lg:col-span-2 space-y-4">
        <h3 class="text-lg font-bold text-gray-800 mb-2">Upcoming & Ongoing</h3>
        
        <!-- Live Now Card -->
        <div class="glassmorphism p-5 rounded-2xl shadow-sm border border-red-200 bg-white relative overflow-hidden">
            <div class="absolute top-0 right-0 w-2 h-full bg-red-500"></div>
            <div class="flex justify-between items-start mb-3">
                <div>
                    <span class="inline-flex items-center px-2 py-1 rounded text-xs font-bold bg-red-100 text-red-700 animate-pulse">
                        <span class="w-2 h-2 rounded-full bg-red-600 mr-2"></span> LIVE NOW
                    </span>
                </div>
                <span class="text-sm font-medium text-gray-500">Platform: YouTube</span>
            </div>
            <h4 class="text-xl font-bold text-gray-800 mb-1">Percentage Tricks (Maths)</h4>
            <p class="text-sm text-gray-500 mb-4">By Amit Kumar • Batch: SSC CGL Complete Foundation</p>
            <div class="flex items-center justify-between">
                <div class="text-sm text-gray-600">
                    <span class="font-bold text-gray-800">Started:</span> 10:00 AM (45 mins ago)
                </div>
                <div class="space-x-2">
                    <button class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm font-bold transition-colors">End Class</button>
                    <button class="px-4 py-2 bg-gray-100 text-gray-700 hover:bg-gray-200 rounded-lg text-sm font-medium transition-colors">Join / Monitor</button>
                </div>
            </div>
        </div>

        <!-- Scheduled Card -->
        <div class="glassmorphism p-5 rounded-2xl shadow-sm border border-gray-200 bg-white">
            <div class="flex justify-between items-start mb-3">
                <div>
                    <span class="inline-flex items-center px-2 py-1 rounded text-xs font-bold bg-blue-100 text-blue-700">
                        SCHEDULED
                    </span>
                </div>
                <span class="text-sm font-medium text-gray-500">Platform: Zoom</span>
            </div>
            <h4 class="text-xl font-bold text-gray-800 mb-1">English Grammar - Nouns</h4>
            <p class="text-sm text-gray-500 mb-4">By Neha Sharma • Batch: Banking Special</p>
            <div class="flex items-center justify-between">
                <div class="text-sm text-gray-600">
                    <span class="font-bold text-gray-800">Time:</span> Today, 04:00 PM (In 3 hours)
                </div>
                <div class="space-x-2">
                    <button class="px-3 py-1 text-sky-500 hover:bg-sky-50 rounded text-sm font-medium transition-colors">Edit</button>
                    <button class="px-3 py-1 text-red-500 hover:bg-red-50 rounded text-sm font-medium transition-colors">Cancel</button>
                    <button class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg text-sm font-bold transition-colors">Start Now</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Calendar / Quick Stats -->
    <div class="space-y-6">
        <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Today's Schedule</h3>
            <ul class="space-y-4 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-gray-200 before:to-transparent">
                <li class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                    <!-- Icon -->
                    <div class="flex items-center justify-center w-4 h-4 rounded-full border-2 border-white bg-red-500 shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 ml-3"></div>
                    <!-- Card -->
                    <div class="w-full ml-4 md:ml-0 md:w-1/2 p-2">
                        <div class="bg-gray-50 p-3 rounded shadow-sm">
                            <div class="font-bold text-gray-800 text-sm">10:00 AM</div>
                            <div class="text-xs text-gray-500">Maths (Live)</div>
                        </div>
                    </div>
                </li>
                <li class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                    <div class="flex items-center justify-center w-4 h-4 rounded-full border-2 border-white bg-blue-500 shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 ml-3"></div>
                    <div class="w-full ml-4 md:ml-0 md:w-1/2 p-2">
                        <div class="bg-gray-50 p-3 rounded shadow-sm">
                            <div class="font-bold text-gray-800 text-sm">04:00 PM</div>
                            <div class="text-xs text-gray-500">English</div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
