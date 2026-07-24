@extends('layouts.admin')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <a href="{{ route('admin.live-classes.index') }}" class="text-sky-500 hover:underline text-sm mb-2 inline-block">← Back to Live Classes</a>
        <h2 class="text-2xl font-bold text-gray-800">Schedule Live Class</h2>
    </div>
    <div class="flex space-x-3">
        <button class="px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded-lg text-sm font-medium transition-colors">
            Schedule Class
        </button>
    </div>
</div>

<div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white max-w-4xl">
    <div class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Class Title *</label>
                <input type="text" placeholder="e.g. Current Affairs - Last 6 Months" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Select Course / Batch</label>
                <select class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm">
                    <option>Free Open Class</option>
                    <option>SSC CGL Foundation</option>
                </select>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Teacher *</label>
                <select class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm">
                    <option>Amit Kumar</option>
                    <option>Neha Sharma</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Date & Time *</label>
                <input type="datetime-local" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Duration (Minutes)</label>
                <input type="number" value="60" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm">
            </div>
        </div>

        <div class="border-t border-gray-100 pt-6">
            <h3 class="text-sm font-bold text-gray-800 mb-4 uppercase tracking-wider">Streaming Platform</h3>
            
            <div class="flex space-x-6 mb-4">
                <label class="flex items-center space-x-2">
                    <input type="radio" name="platform" value="youtube" checked class="text-sky-500 focus:ring-sky-500 border-gray-300">
                    <span class="text-sm font-medium text-gray-700">YouTube Live</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="radio" name="platform" value="zoom" class="text-sky-500 focus:ring-sky-500 border-gray-300">
                    <span class="text-sm font-medium text-gray-700">Zoom Meeting</span>
                </label>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-gray-50 p-4 rounded-lg">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Stream URL / Meeting Link *</label>
                    <input type="url" placeholder="https://..." class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Meeting ID (For Zoom)</label>
                    <input type="text" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Passcode (For Zoom)</label>
                    <input type="text" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
