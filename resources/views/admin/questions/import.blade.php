@extends('layouts.admin')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Import Questions</h2>
        <p class="text-gray-500 text-sm mt-1">Bulk upload questions from CSV/Excel files.</p>
    </div>
    <div class="flex space-x-3">
        <a href="#" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
            Download Template
        </a>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white">
        <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Step 1: Upload File</h3>
        
        <form action="{{ route('admin.questions.importProcess') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Select Subject</label>
                <select name="subject" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm">
                    <option>Mathematics</option>
                    <option>English</option>
                </select>
            </div>
            
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">CSV File</label>
                <div class="flex flex-col items-center justify-center p-8 border-2 border-dashed border-sky-300 rounded-xl bg-sky-50 hover:bg-sky-100 cursor-pointer transition-colors text-center">
                    <svg class="w-12 h-12 text-sky-500 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                    <p class="text-sm font-bold text-sky-700">Drag & Drop your CSV file here</p>
                    <p class="text-xs text-sky-600 mt-1">or click to browse</p>
                    <input type="file" name="file" accept=".csv" class="hidden">
                </div>
            </div>
            
            <button type="submit" class="w-full py-2 px-4 bg-sky-500 hover:bg-sky-600 text-white rounded-lg text-sm font-bold transition-colors">
                Preview & Import
            </button>
        </form>
    </div>
    
    <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white">
        <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Instructions</h3>
        <ul class="space-y-3 text-sm text-gray-600">
            <li class="flex items-start">
                <span class="text-green-500 mr-2">✓</span>
                Ensure your file is in standard CSV format.
            </li>
            <li class="flex items-start">
                <span class="text-green-500 mr-2">✓</span>
                Use the exact column headers as provided in the sample template.
            </li>
            <li class="flex items-start">
                <span class="text-green-500 mr-2">✓</span>
                For 'Correct Option', use A, B, C, or D.
            </li>
            <li class="flex items-start">
                <span class="text-green-500 mr-2">✓</span>
                Hindi columns are optional. Leave them blank if not needed.
            </li>
            <li class="flex items-start">
                <span class="text-red-500 mr-2">⚠️</span>
                Images cannot be imported via CSV. Upload images manually after import.
            </li>
        </ul>
    </div>
</div>
@endsection
