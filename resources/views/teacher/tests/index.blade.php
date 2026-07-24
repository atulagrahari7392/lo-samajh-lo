@extends('layouts.teacher')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">My Tests</h2>
    </div>
    <div class="flex space-x-3">
        <a href="{{ route('teacher.tests.create') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium transition-colors">
            + Create Test
        </a>
    </div>
</div>

<div class="glassmorphism rounded-2xl shadow-sm border border-gray-200 bg-white overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="text-xs font-semibold text-gray-500 uppercase tracking-wider bg-gray-50 border-b border-gray-100">
                    <th class="p-4">Test Title</th>
                    <th class="p-4">Course</th>
                    <th class="p-4">Questions</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <tr class="hover:bg-gray-50">
                    <td class="p-4 text-sm font-medium text-gray-800">Maths Weekly Test 1</td>
                    <td class="p-4 text-sm text-gray-600">Advanced Maths Crash Course</td>
                    <td class="p-4 text-sm text-gray-600">25</td>
                    <td class="p-4 text-right text-sm">
                        <a href="#" class="text-blue-600 hover:underline">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
