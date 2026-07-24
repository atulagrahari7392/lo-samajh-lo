@extends('layouts.dashboard')
@section('title', 'Current Affairs')
@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold dark:text-white">Current Affairs</h1>
        <input type="date" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg p-2 dark:bg-gray-800 dark:border-gray-700 dark:text-white">
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white dark:bg-gray-800 p-5 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-0.5 rounded">National</span>
            <h3 class="font-bold mt-2 dark:text-white">New Parliament Building Inaugurated</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">The Prime Minister inaugurated the new Parliament building equipped with modern facilities...</p>
            <div class="mt-4 text-primary text-sm font-medium"><a href="#">Read More <i class="fas fa-arrow-right"></i></a></div>
        </div>
    </div>
</div>
@endsection
