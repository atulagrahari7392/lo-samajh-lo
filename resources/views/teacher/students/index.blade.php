@extends('layouts.teacher')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">My Students</h2>
        <p class="text-gray-500 text-sm mt-1">Students enrolled in your courses.</p>
    </div>
</div>

<div class="glassmorphism rounded-2xl shadow-sm border border-gray-200 bg-white overflow-hidden">
    <div class="p-4 border-b border-gray-100 flex flex-wrap gap-4 items-center bg-gray-50">
        <input type="text" placeholder="Search student name..." class="flex-1 min-w-[200px] py-2 px-3 rounded-lg border border-gray-300 text-sm">
        <select class="py-2 px-3 rounded-lg border border-gray-300 text-sm">
            <option>All Courses</option>
        </select>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="text-xs font-semibold text-gray-500 uppercase tracking-wider bg-white border-b border-gray-100">
                    <th class="p-4">Student Name</th>
                    <th class="p-4">Course Enrolled</th>
                    <th class="p-4">Enroll Date</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <tr class="hover:bg-gray-50">
                    <td class="p-4">
                        <div class="flex items-center">
                            <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold mr-3">A</div>
                            <span class="text-sm font-medium text-gray-800">Aarav Patel</span>
                        </div>
                    </td>
                    <td class="p-4 text-sm text-gray-600">Advanced Maths</td>
                    <td class="p-4 text-sm text-gray-600">12 Jan 2024</td>
                    <td class="p-4 text-right">
                        <button class="text-blue-600 hover:underline text-sm font-medium">Message</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
