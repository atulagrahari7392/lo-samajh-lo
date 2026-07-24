@extends('layouts.teacher')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <a href="{{ route('teacher.live-classes.index') }}" class="text-sky-500 hover:underline text-sm mb-2 inline-block">← Back to Live Classes</a>
        <h2 class="text-2xl font-bold text-gray-800">Schedule Live Class</h2>
    </div>
    <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium transition-colors">
        Schedule Class
    </button>
</div>

<div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white max-w-4xl">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Class Title</label>
            <input type="text" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 text-sm">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Date & Time</label>
            <input type="datetime-local" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 text-sm">
        </div>
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Stream URL</label>
            <input type="url" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 text-sm">
        </div>
    </div>
</div>
@endsection
