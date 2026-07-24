@extends('layouts.admin')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.teachers.index') }}" class="text-sky-500 hover:underline text-sm mb-2 inline-block">← Back to Teachers</a>
    <h2 class="text-2xl font-bold text-gray-800">Add New Teacher</h2>
    <p class="text-gray-500 text-sm mt-1">Create a new teacher account and set their commission rates.</p>
</div>

<form action="{{ route('admin.teachers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Form Column -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Personal Info -->
            <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Personal Information</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Full Name *</label>
                        <input type="text" name="name" required class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email Address *</label>
                        <input type="email" name="email" required class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number *</label>
                        <input type="tel" name="phone" required class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Temporary Password *</label>
                        <input type="password" name="password" required class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm">
                    </div>
                </div>
            </div>
            
            <!-- Professional Info -->
            <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Professional Details</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Specialization / Subject *</label>
                        <select name="subject" required class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm">
                            <option value="">Select Subject</option>
                            <option value="math">Mathematics</option>
                            <option value="english">English</option>
                            <option value="reasoning">Reasoning</option>
                            <option value="gs">General Studies</option>
                            <option value="science">General Science</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Experience (Years)</label>
                        <input type="number" name="experience" min="0" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Qualification</label>
                    <input type="text" name="qualification" placeholder="e.g. M.Sc Mathematics, B.Ed" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm mb-4">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Bio / About</label>
                    <textarea name="bio" rows="4" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm"></textarea>
                </div>
            </div>
            
            <!-- Bank Details -->
            <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Bank Details (For Payouts)</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Account Holder Name</label>
                        <input type="text" name="bank_name" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Account Number</label>
                        <input type="text" name="bank_account" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">IFSC Code</label>
                        <input type="text" name="bank_ifsc" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm uppercase">
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Sidebar Column -->
        <div class="space-y-6">
            <!-- Commission Setup -->
            <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Commission Setup</h3>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Revenue Share (%) *</label>
                    <div class="relative">
                        <input type="number" name="commission_percent" value="50" min="0" max="100" required class="w-full py-2 px-3 pr-8 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm">
                        <span class="absolute right-3 top-2 text-gray-500">%</span>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Percentage of course sales the teacher receives.</p>
                </div>
            </div>
            
            <!-- Profile Photo -->
            <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Profile Photo</h3>
                <div class="flex flex-col items-center justify-center p-6 border-2 border-dashed border-gray-300 rounded-lg bg-gray-50 hover:bg-gray-100 cursor-pointer">
                    <svg class="w-10 h-10 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                    <p class="text-sm font-medium text-gray-600">Click to upload</p>
                    <p class="text-xs text-gray-500">JPG, PNG (Max 2MB)</p>
                    <input type="file" name="avatar" class="hidden">
                </div>
            </div>
            
            <!-- Actions -->
            <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-sm font-medium text-gray-700">Account Status</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" checked class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-sky-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-sky-500"></div>
                    </label>
                </div>
                <button type="submit" class="w-full py-2 px-4 bg-sky-500 hover:bg-sky-600 text-white rounded-lg text-sm font-bold transition-colors">
                    Create Teacher Account
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
