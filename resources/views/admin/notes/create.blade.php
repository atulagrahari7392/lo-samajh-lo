@extends('layouts.admin')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <a href="{{ route('admin.notes.index') }}" class="text-sky-500 hover:underline text-sm mb-2 inline-block">← Back to Notes</a>
        <h2 class="text-2xl font-bold text-gray-800">Upload Study Notes</h2>
    </div>
    <button class="px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded-lg text-sm font-medium transition-colors">
        Save Notes
    </button>
</div>

<div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white max-w-3xl">
    <div class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Note Title (EN)</label>
            <input type="text" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Note Title (HI)</label>
            <input type="text" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm font-['Hind']">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Upload File (PDF/Word)</label>
            <input type="file" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm">
        </div>
        <div>
            <label class="flex items-center space-x-2">
                <input type="checkbox" class="rounded border-gray-300 text-sky-500 focus:ring-sky-500">
                <span class="text-sm text-gray-700">Make available for free</span>
            </label>
        </div>
    </div>
</div>
@endsection
