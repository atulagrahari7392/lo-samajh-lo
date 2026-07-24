@extends('layouts.dashboard')
@section('title', 'Profile')
@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header Card -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm border border-gray-100 dark:border-gray-700 flex flex-col md:flex-row items-center gap-6">
        <div class="relative">
            <img src="https://ui-avatars.com/api/?name=Aarav+Kumar&size=120" class="rounded-full border-4 border-white dark:border-gray-800 shadow-md">
            <button class="absolute bottom-0 right-0 bg-primary text-white w-8 h-8 rounded-full flex items-center justify-center border-2 border-white dark:border-gray-800 hover:bg-blue-600 transition">
                <i class="fas fa-camera text-xs"></i>
            </button>
        </div>
        <div class="text-center md:text-left flex-1">
            <h1 class="text-2xl font-bold dark:text-white">Aarav Kumar</h1>
            <p class="text-gray-500 mb-2">aarav.k@example.com • +91 9876543210</p>
            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 border border-blue-200 dark:border-blue-800">Target: UPSC CSE</span>
        </div>
    </div>

    <!-- Settings Tabs -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden" x-data="{ tab: 'personal' }">
        <div class="flex border-b border-gray-100 dark:border-gray-700 overflow-x-auto">
            <button @click="tab = 'personal'" :class="tab === 'personal' ? 'border-primary text-primary' : 'border-transparent text-gray-500 hover:text-gray-700'" class="px-6 py-4 border-b-2 font-medium text-sm transition whitespace-nowrap">Personal Info</button>
            <button @click="tab = 'security'" :class="tab === 'security' ? 'border-primary text-primary' : 'border-transparent text-gray-500 hover:text-gray-700'" class="px-6 py-4 border-b-2 font-medium text-sm transition whitespace-nowrap">Security</button>
            <button @click="tab = 'preferences'" :class="tab === 'preferences' ? 'border-primary text-primary' : 'border-transparent text-gray-500 hover:text-gray-700'" class="px-6 py-4 border-b-2 font-medium text-sm transition whitespace-nowrap">Preferences</button>
        </div>
        
        <div class="p-6">
            <!-- Personal Info -->
            <div x-show="tab === 'personal'" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                        <input type="text" value="Aarav Kumar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                        <input type="tel" value="+91 9876543210" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">State / City</label>
                        <input type="text" value="New Delhi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    </div>
                </div>
                <div class="pt-4">
                    <button class="bg-primary hover:bg-blue-600 text-white font-medium py-2 px-6 rounded-lg transition shadow-sm">Save Changes</button>
                </div>
            </div>
            
            <!-- Security -->
            <div x-show="tab === 'security'" style="display: none;" class="space-y-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current Password</label>
                    <input type="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Password</label>
                    <input type="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>
                <div class="pt-4">
                    <button class="bg-gray-800 hover:bg-gray-900 text-white font-medium py-2 px-6 rounded-lg transition shadow-sm">Update Password</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
