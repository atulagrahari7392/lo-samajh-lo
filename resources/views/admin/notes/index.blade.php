@extends('layouts.admin')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Study Notes / PDFs</h2>
    </div>
    <a href="{{ route('admin.notes.create') }}" class="px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded-lg text-sm font-medium transition-colors">
        Upload Notes
    </a>
</div>

<div class="glassmorphism rounded-2xl shadow-sm border border-gray-100 bg-white overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="text-xs font-semibold text-gray-500 uppercase tracking-wider bg-gray-50 border-b border-gray-100">
                    <th class="p-4">Title</th>
                    <th class="p-4">Category</th>
                    <th class="p-4">Size/Type</th>
                    <th class="p-4">Access</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <tr class="hover:bg-gray-50">
                    <td class="p-4">
                        <p class="text-sm font-medium text-gray-800">History NCERT Summary</p>
                        <p class="text-xs text-gray-500 font-['Hind']">इतिहास एनसीईआरटी सारांश</p>
                    </td>
                    <td class="p-4 text-sm text-gray-600">UPSC > History</td>
                    <td class="p-4 text-sm text-gray-600">2.4 MB (PDF)</td>
                    <td class="p-4"><span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">Free</span></td>
                    <td class="p-4 text-right text-sm">
                        <a href="#" class="text-sky-500 hover:underline mr-2">Download</a>
                        <button class="text-red-500 hover:underline">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
