@extends('layouts.teacher')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <a href="{{ route('teacher.questions.index') }}" class="text-sky-500 hover:underline text-sm mb-2 inline-block">← Back to Questions</a>
        <h2 class="text-2xl font-bold text-gray-800">Add Question</h2>
    </div>
    <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium transition-colors">
        Save Question
    </button>
</div>

<div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white max-w-4xl">
    <div class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Question Text</label>
            <textarea rows="3" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 text-sm"></textarea>
        </div>
        <!-- Options inputs would go here -->
    </div>
</div>
@endsection
