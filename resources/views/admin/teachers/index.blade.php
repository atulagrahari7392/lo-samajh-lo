@extends('layouts.admin')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Teachers</h2>
        <p class="text-gray-500 text-sm mt-1">Manage platform educators and their commissions.</p>
    </div>
    <div class="flex space-x-3">
        <a href="{{ route('admin.teachers.create') }}" class="px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded-lg text-sm font-medium transition-colors flex items-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Add Teacher
        </a>
    </div>
</div>

<!-- Filters -->
<div class="mb-6 glassmorphism p-4 rounded-xl shadow-sm border border-gray-100 flex flex-wrap gap-4 items-center bg-white">
    <div class="flex-1 min-w-[200px] relative">
        <input type="text" placeholder="Search teachers..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm">
        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
    </div>
    <select class="py-2 px-3 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:ring-sky-500">
        <option value="">All Subjects</option>
        <option value="math">Mathematics</option>
        <option value="english">English</option>
        <option value="gs">General Studies</option>
        <option value="reasoning">Reasoning</option>
    </select>
    <select class="py-2 px-3 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:ring-sky-500">
        <option value="">Status</option>
        <option value="verified">Verified</option>
        <option value="pending">Pending</option>
        <option value="suspended">Suspended</option>
    </select>
</div>

<!-- Teacher Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Card 1 -->
    <div class="glassmorphism rounded-2xl shadow-sm border border-gray-100 bg-white overflow-hidden flex flex-col">
        <div class="p-6 relative">
            <span class="absolute top-4 right-4 text-green-500 bg-green-50 p-1 rounded-full" title="Verified">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            </span>
            <div class="flex items-center space-x-4 mb-4">
                <div class="w-16 h-16 rounded-full bg-gray-200 overflow-hidden">
                    <img src="https://placehold.co/100x100" alt="Avatar" class="w-full h-full object-cover">
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-800 hover:text-sky-500 cursor-pointer"><a href="{{ route('admin.teachers.show', 1) }}">Amit Kumar</a></h3>
                    <p class="text-sm text-gray-500">Mathematics</p>
                </div>
            </div>
            
            <div class="grid grid-cols-2 gap-2 border-y border-gray-100 py-3 my-3">
                <div>
                    <p class="text-xs text-gray-500">Students</p>
                    <p class="text-sm font-semibold text-gray-800">4,520</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500">Rating</p>
                    <p class="text-sm font-semibold text-gray-800 flex items-center">4.8 <span class="text-yellow-400 ml-1">★</span></p>
                </div>
                <div>
                    <p class="text-xs text-gray-500">Courses</p>
                    <p class="text-sm font-semibold text-gray-800">5</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500">Commission</p>
                    <p class="text-sm font-semibold text-gray-800">60%</p>
                </div>
            </div>
            
            <div class="flex space-x-2 mt-4">
                <a href="{{ route('admin.teachers.show', 1) }}" class="flex-1 text-center py-2 border border-sky-500 text-sky-500 rounded-lg text-sm font-medium hover:bg-sky-50 transition-colors">Profile</a>
                <button class="flex-1 text-center py-2 bg-red-50 text-red-600 rounded-lg text-sm font-medium hover:bg-red-100 transition-colors">Suspend</button>
            </div>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="glassmorphism rounded-2xl shadow-sm border border-gray-100 bg-white overflow-hidden flex flex-col">
        <div class="p-6 relative">
            <span class="absolute top-4 right-4 text-green-500 bg-green-50 p-1 rounded-full" title="Verified">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            </span>
            <div class="flex items-center space-x-4 mb-4">
                <div class="w-16 h-16 rounded-full bg-gray-200 overflow-hidden">
                    <img src="https://placehold.co/100x100" alt="Avatar" class="w-full h-full object-cover">
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-800 hover:text-sky-500 cursor-pointer"><a href="{{ route('admin.teachers.show', 2) }}">Neha Sharma</a></h3>
                    <p class="text-sm text-gray-500">English Grammar</p>
                </div>
            </div>
            
            <div class="grid grid-cols-2 gap-2 border-y border-gray-100 py-3 my-3">
                <div>
                    <p class="text-xs text-gray-500">Students</p>
                    <p class="text-sm font-semibold text-gray-800">2,100</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500">Rating</p>
                    <p class="text-sm font-semibold text-gray-800 flex items-center">4.6 <span class="text-yellow-400 ml-1">★</span></p>
                </div>
                <div>
                    <p class="text-xs text-gray-500">Courses</p>
                    <p class="text-sm font-semibold text-gray-800">2</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500">Commission</p>
                    <p class="text-sm font-semibold text-gray-800">50%</p>
                </div>
            </div>
            
            <div class="flex space-x-2 mt-4">
                <a href="{{ route('admin.teachers.show', 2) }}" class="flex-1 text-center py-2 border border-sky-500 text-sky-500 rounded-lg text-sm font-medium hover:bg-sky-50 transition-colors">Profile</a>
                <button class="flex-1 text-center py-2 bg-red-50 text-red-600 rounded-lg text-sm font-medium hover:bg-red-100 transition-colors">Suspend</button>
            </div>
        </div>
    </div>

    <!-- Pending Card -->
    <div class="glassmorphism rounded-2xl shadow-sm border border-yellow-200 bg-yellow-50 overflow-hidden flex flex-col relative">
        <div class="absolute top-0 right-0 w-16 h-16 overflow-hidden">
            <div class="absolute top-2 -right-6 bg-yellow-400 text-yellow-900 text-[10px] font-bold py-1 px-8 transform rotate-45">PENDING</div>
        </div>
        <div class="p-6">
            <div class="flex items-center space-x-4 mb-4">
                <div class="w-16 h-16 rounded-full bg-gray-200 overflow-hidden flex items-center justify-center text-gray-500 font-bold text-xl">
                    V
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-800">Vikas Patel</h3>
                    <p class="text-sm text-gray-500">Reasoning</p>
                </div>
            </div>
            
            <div class="mb-4">
                <p class="text-xs text-gray-500 mb-1">Applied Date</p>
                <p class="text-sm font-semibold text-gray-800">23 Jul, 2024</p>
            </div>
            
            <div class="flex space-x-2 mt-auto">
                <button class="flex-1 text-center py-2 bg-green-500 text-white rounded-lg text-sm font-medium hover:bg-green-600 transition-colors">Verify & Approve</button>
                <button class="px-3 text-center py-2 border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-100 transition-colors">View</button>
            </div>
        </div>
    </div>
</div>
@endsection
