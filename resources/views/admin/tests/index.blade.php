@extends('layouts.admin')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Tests / Mocks</h2>
        <p class="text-gray-500 text-sm mt-1">Manage mock tests, PYQs, and topic-wise tests.</p>
    </div>
    <div class="flex space-x-3">
        <a href="{{ route('admin.tests.create') }}" class="px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded-lg text-sm font-medium transition-colors">
            Create Test
        </a>
    </div>
</div>

<div class="glassmorphism rounded-2xl shadow-sm border border-gray-100 bg-white overflow-hidden">
    <div class="p-4 border-b border-gray-100 flex flex-wrap gap-4 items-center bg-gray-50">
        <div class="flex-1 min-w-[200px] relative">
            <input type="text" placeholder="Search tests..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm">
            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <select class="py-2 px-3 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:ring-sky-500">
            <option value="">All Types</option>
            <option value="mock">Full Mock Test</option>
            <option value="topic">Topic Test</option>
            <option value="pyq">Previous Year Paper</option>
            <option value="live">Live Test</option>
        </select>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="text-xs font-semibold text-gray-500 uppercase tracking-wider bg-white border-b border-gray-100">
                    <th class="p-4">Test Title</th>
                    <th class="p-4">Type</th>
                    <th class="p-4">Questions</th>
                    <th class="p-4">Duration</th>
                    <th class="p-4">Attempts</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="p-4">
                        <p class="text-sm font-bold text-gray-800">SSC CGL Tier 1 Full Mock - 01</p>
                        <p class="text-xs text-gray-500">Category: SSC CGL</p>
                    </td>
                    <td class="p-4"><span class="px-2 py-1 bg-purple-100 text-purple-700 text-xs font-medium rounded-full">Full Mock</span></td>
                    <td class="p-4 text-sm text-gray-800">100</td>
                    <td class="p-4 text-sm text-gray-800">60 mins</td>
                    <td class="p-4 text-sm text-gray-800">5,432</td>
                    <td class="p-4"><span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">Published</span></td>
                    <td class="p-4 text-right">
                        <a href="{{ route('admin.tests.edit', 1) }}" class="text-sky-500 hover:text-sky-700 mr-2 text-sm font-medium">Edit</a>
                        <button class="text-red-500 hover:text-red-700 text-sm font-medium">Delete</button>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="p-4">
                        <p class="text-sm font-bold text-gray-800">Percentage - Advanced Level</p>
                        <p class="text-xs text-gray-500">Category: Mathematics</p>
                    </td>
                    <td class="p-4"><span class="px-2 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded-full">Topic Test</span></td>
                    <td class="p-4 text-sm text-gray-800">25</td>
                    <td class="p-4 text-sm text-gray-800">30 mins</td>
                    <td class="p-4 text-sm text-gray-800">1,240</td>
                    <td class="p-4"><span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">Published</span></td>
                    <td class="p-4 text-right">
                        <a href="{{ route('admin.tests.edit', 2) }}" class="text-sky-500 hover:text-sky-700 mr-2 text-sm font-medium">Edit</a>
                        <button class="text-red-500 hover:text-red-700 text-sm font-medium">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
