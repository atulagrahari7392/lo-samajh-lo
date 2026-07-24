@extends('layouts.admin')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Question Bank</h2>
        <p class="text-gray-500 text-sm mt-1">Manage all questions for mock tests.</p>
    </div>
    <div class="flex space-x-3">
        <a href="{{ route('admin.questions.import') }}" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
            Import CSV
        </a>
        <a href="{{ route('admin.questions.create') }}" class="px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded-lg text-sm font-medium transition-colors">
            + Add Question
        </a>
    </div>
</div>

<div class="glassmorphism rounded-2xl shadow-sm border border-gray-100 bg-white overflow-hidden">
    <!-- Filters -->
    <div class="p-4 border-b border-gray-100 flex flex-wrap gap-4 items-center bg-gray-50">
        <div class="flex-1 min-w-[200px] relative">
            <input type="text" placeholder="Search question text..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm">
            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <select class="py-2 px-3 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:ring-sky-500">
            <option value="">Subject</option>
            <option>Maths</option>
            <option>English</option>
        </select>
        <select class="py-2 px-3 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:ring-sky-500">
            <option value="">Difficulty</option>
            <option>Easy</option>
            <option>Medium</option>
            <option>Hard</option>
        </select>
        <select class="py-2 px-3 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:ring-sky-500">
            <option value="">Type</option>
            <option>MCQ</option>
            <option>Numerical</option>
        </select>
    </div>

    <!-- Questions List -->
    <div class="divide-y divide-gray-100">
        <!-- Question Item -->
        <div class="p-5 hover:bg-gray-50 transition-colors">
            <div class="flex justify-between items-start mb-2">
                <div class="flex items-center space-x-2 mb-2">
                    <span class="px-2 py-1 bg-blue-100 text-blue-700 text-[10px] font-bold rounded uppercase">MCQ</span>
                    <span class="px-2 py-1 bg-yellow-100 text-yellow-700 text-[10px] font-bold rounded uppercase">Medium</span>
                    <span class="px-2 py-1 bg-gray-100 text-gray-700 text-[10px] font-bold rounded uppercase">Maths > Algebra</span>
                </div>
                <div class="flex space-x-2">
                    <button class="text-sky-500 hover:text-sky-700 text-sm font-medium">Edit</button>
                    <button class="text-red-500 hover:text-red-700 text-sm font-medium">Delete</button>
                </div>
            </div>
            <div class="mb-3">
                <p class="text-sm font-medium text-gray-800 mb-1"><span class="text-gray-500 mr-2">Q:</span> If x + y = 10 and xy = 21, then what is the value of x² + y²?</p>
                <p class="text-xs text-gray-500 font-['Hind']"><span class="text-gray-400 mr-2">Q (HI):</span> यदि x + y = 10 और xy = 21 है, तो x² + y² का मान क्या है?</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 text-sm text-gray-700">
                <div class="p-2 rounded border border-gray-200">A) 45</div>
                <div class="p-2 rounded border border-green-300 bg-green-50 font-medium">B) 58 <span class="text-green-600 ml-1">✓</span></div>
                <div class="p-2 rounded border border-gray-200">C) 62</div>
                <div class="p-2 rounded border border-gray-200">D) 74</div>
            </div>
        </div>
        
        <!-- Question Item 2 -->
        <div class="p-5 hover:bg-gray-50 transition-colors">
            <div class="flex justify-between items-start mb-2">
                <div class="flex items-center space-x-2 mb-2">
                    <span class="px-2 py-1 bg-blue-100 text-blue-700 text-[10px] font-bold rounded uppercase">MCQ</span>
                    <span class="px-2 py-1 bg-red-100 text-red-700 text-[10px] font-bold rounded uppercase">Hard</span>
                    <span class="px-2 py-1 bg-gray-100 text-gray-700 text-[10px] font-bold rounded uppercase">English > Grammar</span>
                </div>
                <div class="flex space-x-2">
                    <button class="text-sky-500 hover:text-sky-700 text-sm font-medium">Edit</button>
                    <button class="text-red-500 hover:text-red-700 text-sm font-medium">Delete</button>
                </div>
            </div>
            <div class="mb-3">
                <p class="text-sm font-medium text-gray-800 mb-1"><span class="text-gray-500 mr-2">Q:</span> Choose the correct synonym for "EPHEMERAL".</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 text-sm text-gray-700">
                <div class="p-2 rounded border border-gray-200">A) Eternal</div>
                <div class="p-2 rounded border border-green-300 bg-green-50 font-medium">B) Transient <span class="text-green-600 ml-1">✓</span></div>
                <div class="p-2 rounded border border-gray-200">C) Solid</div>
                <div class="p-2 rounded border border-gray-200">D) Heavy</div>
            </div>
        </div>
    </div>
    
    <div class="p-4 border-t border-gray-100 text-center">
        <button class="text-sm text-sky-500 font-medium hover:underline">Load More Questions</button>
    </div>
</div>
@endsection
