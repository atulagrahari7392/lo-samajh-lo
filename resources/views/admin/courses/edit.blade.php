@extends('layouts.admin')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <a href="{{ route('admin.courses.index') }}" class="text-sky-500 hover:underline text-sm mb-2 inline-block">← Back to Courses</a>
        <h2 class="text-2xl font-bold text-gray-800">Edit Course</h2>
    </div>
    <div class="flex space-x-3">
        <button class="px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded-lg text-sm font-medium transition-colors">
            Update Course
        </button>
    </div>
</div>

<!-- Reusing the create form structure but pre-filled with data -->
<div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white">
    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Basic Information</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Course Title (English) *</label>
            <input type="text" value="SSC CGL Complete Foundation" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Course Title (Hindi)</label>
            <input type="text" value="एसएससी सीजीएल सम्पूर्ण फाउंडेशन" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm font-['Hind']">
        </div>
    </div>
</div>
<!-- Add other pre-filled fields similar to create.blade.php -->
@endsection
