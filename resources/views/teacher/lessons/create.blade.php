@extends('layouts.teacher')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <a href="{{ route('teacher.courses.index') }}" class="text-sky-500 hover:underline text-sm mb-2 inline-block">← Back to Courses</a>
        <h2 class="text-2xl font-bold text-gray-800">Add New Lesson</h2>
    </div>
    <div class="flex space-x-3">
        <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium transition-colors">
            Save Lesson
        </button>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Main Content -->
    <div class="md:col-span-2 space-y-6">
        <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-200 bg-white">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Lesson Details</h3>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Select Course *</label>
                    <select class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 text-sm">
                        <option>Advanced Maths Crash Course</option>
                        <option>Reasoning Basics</option>
                    </select>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Lesson Title (EN) *</label>
                        <input type="text" placeholder="e.g. Introduction to Algebra" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Lesson Title (HI)</label>
                        <input type="text" placeholder="e.g. बीजगणित का परिचय" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 text-sm font-['Hind']">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Content Type *</label>
                    <div class="flex space-x-4 mt-2">
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="content_type" value="video" checked class="text-blue-600 focus:ring-blue-500">
                            <span class="text-sm font-medium text-gray-700">Video (YouTube/Vimeo)</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="content_type" value="pdf" class="text-blue-600 focus:ring-blue-500">
                            <span class="text-sm font-medium text-gray-700">PDF / Document</span>
                        </label>
                    </div>
                </div>

                <!-- Video Input -->
                <div id="video_input">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Video URL *</label>
                    <input type="url" placeholder="https://youtube.com/watch?v=..." class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 text-sm">
                </div>

                <!-- PDF Input (hidden by default) -->
                <div id="pdf_input" class="hidden">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Upload PDF *</label>
                    <input type="file" accept=".pdf" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 text-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description / Notes</label>
                    <textarea rows="5" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 text-sm"></textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="space-y-6">
        <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-200 bg-white">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Settings</h3>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Order / Sequence</label>
                    <input type="number" value="1" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 text-sm">
                </div>
                
                <div class="pt-2">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        <span class="ml-3 text-sm font-medium text-gray-700">Free Preview Lesson</span>
                    </label>
                    <p class="text-xs text-gray-500 mt-1 ml-14">Allow students to view this lesson before buying the course.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('input[name="content_type"]').forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.value === 'video') {
                document.getElementById('video_input').classList.remove('hidden');
                document.getElementById('pdf_input').classList.add('hidden');
            } else {
                document.getElementById('video_input').classList.add('hidden');
                document.getElementById('pdf_input').classList.remove('hidden');
            }
        });
    });
</script>
@endsection
