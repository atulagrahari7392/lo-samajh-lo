@extends('layouts.dashboard')
@section('title', 'Bookmarks')
@section('content')
<div class="space-y-6">
    <h1 class="text-2xl font-bold dark:text-white">My Bookmarks</h1>
    <div class="bg-white dark:bg-gray-800 p-5 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 flex justify-between items-center">
        <div>
            <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2 py-0.5 rounded">Question</span>
            <p class="font-medium mt-2 dark:text-white">Which schedule contains provisions regarding anti-defection?</p>
        </div>
        <button class="text-red-500 hover:bg-red-50 p-2 rounded"><i class="fas fa-trash"></i></button>
    </div>
</div>
@endsection
