@extends('layouts.admin')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Courses</h2>
        <p class="text-gray-500 text-sm mt-1">Manage all educational courses on the platform.</p>
    </div>
    <div class="flex space-x-3">
        <a href="{{ route('admin.courses.create') }}" class="px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded-lg text-sm font-medium transition-colors">
            Create Course
        </a>
    </div>
</div>

<div class="glassmorphism rounded-2xl shadow-sm border border-gray-100 bg-white overflow-hidden">
    <!-- Filters -->
    <div class="p-4 border-b border-gray-100 flex flex-wrap gap-4 items-center bg-gray-50">
        <div class="flex-1 min-w-[200px] relative">
            <input type="text" placeholder="Search courses..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm">
            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <select class="py-2 px-3 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:ring-sky-500">
            <option value="">All Categories</option>
            <option value="ssc">SSC</option>
            <option value="banking">Banking</option>
            <option value="railway">Railway</option>
        </select>
        <select class="py-2 px-3 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:ring-sky-500">
            <option value="">Status</option>
            <option value="published">Published</option>
            <option value="draft">Draft</option>
        </select>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="text-xs font-semibold text-gray-500 uppercase tracking-wider bg-white border-b border-gray-100">
                    <th class="p-4">Course Info</th>
                    <th class="p-4">Category</th>
                    <th class="p-4">Teacher</th>
                    <th class="p-4">Price / Enrollments</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="p-4">
                        <div class="flex items-center">
                            <div class="w-16 h-12 bg-gray-200 rounded mr-3 bg-cover bg-center" style="background-image: url('https://placehold.co/320x180')"></div>
                            <div>
                                <p class="text-sm font-bold text-gray-800">SSC CGL Complete Foundation</p>
                                <p class="text-xs text-gray-500 font-['Hind']">एसएससी सीजीएल सम्पूर्ण फाउंडेशन</p>
                            </div>
                        </div>
                    </td>
                    <td class="p-4 text-sm text-gray-800">SSC</td>
                    <td class="p-4 text-sm text-gray-800">Amit Kumar</td>
                    <td class="p-4">
                        <p class="text-sm font-bold text-gray-800">₹1,499</p>
                        <p class="text-xs text-gray-500">12,450 enrolled</p>
                    </td>
                    <td class="p-4">
                        <label class="relative inline-flex items-center cursor-pointer" title="Toggle Publish Status">
                            <input type="checkbox" checked class="sr-only peer">
                            <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-sky-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-sky-500"></div>
                        </label>
                    </td>
                    <td class="p-4 text-right flex justify-end space-x-2">
                        <a href="{{ route('admin.courses.edit', 1) }}" class="text-sky-500 hover:text-sky-700 p-1"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg></a>
                        <button class="text-red-500 hover:text-red-700 p-1"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
