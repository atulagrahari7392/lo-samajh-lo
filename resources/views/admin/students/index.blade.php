@extends('layouts.admin')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Students</h2>
        <p class="text-gray-500 text-sm mt-1">Manage all registered students.</p>
    </div>
    <div class="flex space-x-3">
        <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
            Export CSV
        </button>
        <button class="px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded-lg text-sm font-medium transition-colors">
            Send Notification
        </button>
    </div>
</div>

<div class="glassmorphism rounded-2xl shadow-sm border border-gray-100 bg-white overflow-hidden">
    <!-- Filters -->
    <div class="p-4 border-b border-gray-100 flex flex-wrap gap-4 items-center bg-gray-50">
        <div class="flex-1 min-w-[200px] relative">
            <input type="text" placeholder="Search by name, email or phone..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm">
            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <select class="py-2 px-3 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:ring-sky-500">
            <option value="">All Exams</option>
            <option value="ssc">SSC</option>
            <option value="banking">Banking</option>
            <option value="railway">Railway</option>
        </select>
        <select class="py-2 px-3 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:ring-sky-500">
            <option value="">All Status</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
        <input type="date" class="py-2 px-3 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:ring-sky-500">
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="text-xs font-semibold text-gray-500 uppercase tracking-wider bg-white border-b border-gray-100">
                    <th class="p-4 w-10">
                        <input type="checkbox" class="rounded border-gray-300 text-sky-500 focus:ring-sky-500">
                    </th>
                    <th class="p-4">Student</th>
                    <th class="p-4">Contact Info</th>
                    <th class="p-4">Enrolled Courses</th>
                    <th class="p-4">Joined Date</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <!-- Row 1 -->
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="p-4">
                        <input type="checkbox" class="rounded border-gray-300 text-sky-500 focus:ring-sky-500">
                    </td>
                    <td class="p-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold mr-3">R</div>
                            <div>
                                <p class="text-sm font-medium text-gray-800">Rahul Sharma</p>
                                <p class="text-xs text-gray-500">Target: SSC CGL</p>
                            </div>
                        </div>
                    </td>
                    <td class="p-4">
                        <p class="text-sm text-gray-800">rahul@example.com</p>
                        <p class="text-xs text-gray-500">+91 9876543210</p>
                    </td>
                    <td class="p-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                            3 Courses
                        </span>
                    </td>
                    <td class="p-4 text-sm text-gray-600">
                        15 Jan, 2024
                    </td>
                    <td class="p-4">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" checked class="sr-only peer">
                            <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-sky-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-sky-500"></div>
                        </label>
                    </td>
                    <td class="p-4 text-right">
                        <a href="{{ route('admin.students.show', 1) }}" class="text-sky-500 hover:text-sky-700 font-medium text-sm">View</a>
                    </td>
                </tr>
                
                <!-- Row 2 -->
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="p-4">
                        <input type="checkbox" class="rounded border-gray-300 text-sky-500 focus:ring-sky-500">
                    </td>
                    <td class="p-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-pink-100 text-pink-600 flex items-center justify-center font-bold mr-3">P</div>
                            <div>
                                <p class="text-sm font-medium text-gray-800">Priya Singh</p>
                                <p class="text-xs text-gray-500">Target: Banking</p>
                            </div>
                        </div>
                    </td>
                    <td class="p-4">
                        <p class="text-sm text-gray-800">priya@example.com</p>
                        <p class="text-xs text-gray-500">+91 8765432109</p>
                    </td>
                    <td class="p-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                            1 Course
                        </span>
                    </td>
                    <td class="p-4 text-sm text-gray-600">
                        20 Feb, 2024
                    </td>
                    <td class="p-4">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" checked class="sr-only peer">
                            <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-sky-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-sky-500"></div>
                        </label>
                    </td>
                    <td class="p-4 text-right">
                        <a href="{{ route('admin.students.show', 2) }}" class="text-sky-500 hover:text-sky-700 font-medium text-sm">View</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <div class="p-4 border-t border-gray-100 flex items-center justify-between">
        <p class="text-sm text-gray-500">Showing <span class="font-medium">1</span> to <span class="font-medium">10</span> of <span class="font-medium">97</span> results</p>
        <div class="flex space-x-1">
            <button class="px-3 py-1 rounded border border-gray-300 text-sm text-gray-500 hover:bg-gray-50">Previous</button>
            <button class="px-3 py-1 rounded bg-sky-50 text-sky-600 text-sm font-medium">1</button>
            <button class="px-3 py-1 rounded border border-gray-300 text-sm text-gray-500 hover:bg-gray-50">2</button>
            <button class="px-3 py-1 rounded border border-gray-300 text-sm text-gray-500 hover:bg-gray-50">3</button>
            <button class="px-3 py-1 rounded border border-gray-300 text-sm text-gray-500 hover:bg-gray-50">Next</button>
        </div>
    </div>
</div>
@endsection
