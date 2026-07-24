@extends('layouts.admin')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <a href="{{ route('admin.students.index') }}" class="text-sky-500 hover:underline text-sm mb-2 inline-block">← Back to Students</a>
        <h2 class="text-2xl font-bold text-gray-800">Student Profile</h2>
    </div>
    <div class="flex space-x-3">
        <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
            Send Message
        </button>
        <button class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm font-medium transition-colors">
            Block Account
        </button>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Left Column: Profile Card -->
    <div class="col-span-1 space-y-6">
        <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white text-center">
            <div class="w-24 h-24 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-3xl mx-auto mb-4">R</div>
            <h3 class="text-xl font-bold text-gray-800">Rahul Sharma</h3>
            <p class="text-sm text-gray-500 mb-4">Target: SSC CGL • Since Jan 2024</p>
            
            <div class="flex justify-center space-x-2 mb-6">
                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Active</span>
                <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Premium</span>
            </div>

            <div class="border-t border-gray-100 pt-4 text-left">
                <div class="mb-3">
                    <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Email</p>
                    <p class="text-sm text-gray-800">rahul.sharma@example.com</p>
                </div>
                <div class="mb-3">
                    <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Phone</p>
                    <p class="text-sm text-gray-800">+91 9876543210</p>
                </div>
                <div class="mb-3">
                    <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">State</p>
                    <p class="text-sm text-gray-800">Uttar Pradesh</p>
                </div>
            </div>
        </div>

        <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Performance Stats</h3>
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-50 p-3 rounded-lg text-center">
                    <p class="text-2xl font-bold text-gray-800">3</p>
                    <p class="text-xs text-gray-500">Courses</p>
                </div>
                <div class="bg-gray-50 p-3 rounded-lg text-center">
                    <p class="text-2xl font-bold text-gray-800">12</p>
                    <p class="text-xs text-gray-500">Tests Attempted</p>
                </div>
                <div class="bg-gray-50 p-3 rounded-lg text-center">
                    <p class="text-2xl font-bold text-gray-800">76%</p>
                    <p class="text-xs text-gray-500">Avg Score</p>
                </div>
                <div class="bg-gray-50 p-3 rounded-lg text-center">
                    <p class="text-xl font-bold text-gray-800 mt-1">2h ago</p>
                    <p class="text-xs text-gray-500">Last Active</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column: Tabs (Courses, Tests, Payments, Activity) -->
    <div class="col-span-2 space-y-6">
        <div class="glassmorphism rounded-2xl shadow-sm border border-gray-100 bg-white overflow-hidden">
            <div class="border-b border-gray-100">
                <nav class="flex px-4" aria-label="Tabs">
                    <a href="#" class="border-b-2 border-sky-500 text-sky-600 whitespace-nowrap py-4 px-4 text-sm font-medium" aria-current="page">Enrolled Courses</a>
                    <a href="#" class="border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-4 text-sm font-medium">Test History</a>
                    <a href="#" class="border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-4 text-sm font-medium">Payments</a>
                    <a href="#" class="border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-4 text-sm font-medium">Activity Log</a>
                </nav>
            </div>
            
            <div class="p-6">
                <!-- Courses List -->
                <div class="space-y-4">
                    <div class="flex items-center p-4 border border-gray-100 rounded-xl hover:shadow-md transition-shadow">
                        <div class="w-16 h-16 bg-gray-200 rounded-lg mr-4 bg-cover bg-center" style="background-image: url('https://placehold.co/100x100?text=SSC')"></div>
                        <div class="flex-1">
                            <h4 class="text-md font-semibold text-gray-800">SSC CGL Complete Foundation Batch</h4>
                            <div class="w-full bg-gray-200 rounded-full h-2 mt-2 mb-1">
                                <div class="bg-sky-500 h-2 rounded-full" style="width: 45%"></div>
                            </div>
                            <p class="text-xs text-gray-500">45% Completed • Enrolled: 15 Jan 2024</p>
                        </div>
                        <div class="ml-4">
                            <button class="px-3 py-1 bg-white border border-gray-300 text-gray-700 rounded text-xs hover:bg-gray-50">Manage</button>
                        </div>
                    </div>
                    
                    <div class="flex items-center p-4 border border-gray-100 rounded-xl hover:shadow-md transition-shadow">
                        <div class="w-16 h-16 bg-gray-200 rounded-lg mr-4 bg-cover bg-center" style="background-image: url('https://placehold.co/100x100?text=Maths')"></div>
                        <div class="flex-1">
                            <h4 class="text-md font-semibold text-gray-800">Advanced Mathematics for SSC</h4>
                            <div class="w-full bg-gray-200 rounded-full h-2 mt-2 mb-1">
                                <div class="bg-sky-500 h-2 rounded-full" style="width: 10%"></div>
                            </div>
                            <p class="text-xs text-gray-500">10% Completed • Enrolled: 02 Feb 2024</p>
                        </div>
                        <div class="ml-4">
                            <button class="px-3 py-1 bg-white border border-gray-300 text-gray-700 rounded text-xs hover:bg-gray-50">Manage</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
