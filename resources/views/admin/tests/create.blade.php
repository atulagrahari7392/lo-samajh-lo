@extends('layouts.admin')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <a href="{{ route('admin.tests.index') }}" class="text-sky-500 hover:underline text-sm mb-2 inline-block">← Back to Tests</a>
        <h2 class="text-2xl font-bold text-gray-800">Create New Test</h2>
    </div>
    <div class="flex space-x-3">
        <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
            Save Draft
        </button>
        <button class="px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded-lg text-sm font-medium transition-colors">
            Publish Test
        </button>
    </div>
</div>

<!-- Tabs -->
<div class="mb-6 border-b border-gray-200">
    <nav class="flex space-x-8" aria-label="Tabs">
        <button class="border-sky-500 text-sky-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
            1. Basic Settings
        </button>
        <button class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
            2. Test Sections
        </button>
        <button class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
            3. Add Questions
        </button>
    </nav>
</div>

<!-- Step 1: Basic Info -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="md:col-span-2 space-y-6">
        <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Basic Information</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Test Title *</label>
                    <input type="text" placeholder="e.g. SSC CGL Mock Test 1" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Test Type *</label>
                        <select class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm">
                            <option>Full Mock Test</option>
                            <option>Topic Test</option>
                            <option>Previous Year Paper</option>
                            <option>Live Test</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Category / Exam *</label>
                        <select class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm">
                            <option>SSC CGL</option>
                            <option>Banking PO</option>
                            <option>RRB NTPC</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description / Instructions</label>
                    <textarea rows="4" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm"></textarea>
                </div>
            </div>
        </div>
    </div>
    
    <div class="space-y-6">
        <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Duration & Marking</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Total Duration (Minutes) *</label>
                    <input type="number" value="60" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Default Marks per Question</label>
                    <input type="number" value="2" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm text-green-600 font-bold">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Default Negative Marking</label>
                    <input type="number" step="0.25" value="0.5" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm text-red-500 font-bold">
                </div>
            </div>
        </div>
        
        <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Availability</h3>
            <div class="space-y-4">
                <label class="flex items-center space-x-3 cursor-pointer">
                    <input type="checkbox" class="w-5 h-5 text-sky-500 rounded border-gray-300 focus:ring-sky-500">
                    <span class="text-sm font-medium text-gray-700">Make this test Free</span>
                </label>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Start Time (Live Tests)</label>
                    <input type="datetime-local" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
