@extends('layouts.teacher')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">My Profile</h2>
    </div>
    <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium transition-colors">
        Update Profile
    </button>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-200 bg-white">
        <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Personal Information</h3>
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input type="text" value="Amit Kumar" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" value="amit.kumar@example.com" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 text-sm" disabled>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Bio</label>
                <textarea rows="4" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 text-sm">Expert in Mathematics.</textarea>
            </div>
        </div>
    </div>
    
    <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-200 bg-white">
        <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Bank Details</h3>
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Account Name</label>
                <input type="text" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Account Number</label>
                <input type="text" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">IFSC</label>
                <input type="text" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 text-sm">
            </div>
        </div>
    </div>
</div>
@endsection
