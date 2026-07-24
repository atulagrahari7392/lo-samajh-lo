@extends('layouts.admin')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <a href="{{ route('admin.coupons.index') }}" class="text-sky-500 hover:underline text-sm mb-2 inline-block">← Back to Coupons</a>
        <h2 class="text-2xl font-bold text-gray-800">Create Coupon</h2>
    </div>
    <button class="px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded-lg text-sm font-medium transition-colors">
        Save Coupon
    </button>
</div>

<div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white max-w-3xl">
    <div class="space-y-6">
        
        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Coupon Code *</label>
                <div class="flex">
                    <input type="text" placeholder="e.g. DIWALI50" class="w-full py-2 px-3 rounded-l-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 uppercase font-mono text-sm">
                    <button class="bg-gray-100 px-3 py-2 border border-l-0 border-gray-300 rounded-r-lg text-sm font-medium text-gray-600 hover:bg-gray-200">Generate</button>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Description (Internal)</label>
                <input type="text" placeholder="e.g. Festive offer for all users" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Discount Type *</label>
                <select class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm">
                    <option value="percent">Percentage (%)</option>
                    <option value="fixed">Fixed Amount (₹)</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Discount Value *</label>
                <input type="number" placeholder="50" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm font-bold text-green-600">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Maximum Discount Amount (₹)</label>
                <input type="number" placeholder="Leave blank for no limit" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm">
                <p class="text-xs text-gray-500 mt-1">Only applicable for percentage discounts</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Minimum Cart Value (₹)</label>
                <input type="number" placeholder="0" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Total Usage Limit</label>
                <input type="number" placeholder="e.g. 100 uses" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Valid Until *</label>
                <input type="datetime-local" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm">
            </div>
        </div>

    </div>
</div>
@endsection
