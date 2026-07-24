@extends('layouts.teacher')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Study Notes</h2>
    </div>
    <div class="flex space-x-3">
        <a href="{{ route('teacher.notes.upload') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium transition-colors">
            Upload Notes
        </a>
    </div>
</div>

<div class="glassmorphism rounded-2xl shadow-sm border border-gray-200 bg-white overflow-hidden p-6">
    <p class="text-gray-500 text-sm">Upload PDFs and resources for your students.</p>
</div>
@endsection
