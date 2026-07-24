@extends('layouts.admin')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Coupons & Offers</h2>
        <p class="text-gray-500 text-sm mt-1">Manage discount codes for courses and tests.</p>
    </div>
    <div class="flex space-x-3">
        <a href="{{ route('admin.coupons.create') }}" class="px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded-lg text-sm font-medium transition-colors">
            + Create Coupon
        </a>
    </div>
</div>

<div class="glassmorphism rounded-2xl shadow-sm border border-gray-100 bg-white overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="text-xs font-semibold text-gray-500 uppercase tracking-wider bg-gray-50 border-b border-gray-100">
                    <th class="p-4">Coupon Code</th>
                    <th class="p-4">Discount</th>
                    <th class="p-4">Usage Limit</th>
                    <th class="p-4">Validity</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="p-4">
                        <span class="font-mono font-bold text-sky-600 bg-sky-50 px-3 py-1 border border-sky-200 rounded">DIWALI50</span>
                        <p class="text-xs text-gray-500 mt-1">Festive Offer</p>
                    </td>
                    <td class="p-4 text-sm font-bold text-gray-800">50% OFF<br><span class="text-xs font-normal text-gray-500">Upto ₹500</span></td>
                    <td class="p-4 text-sm text-gray-600">45 / 100 Used</td>
                    <td class="p-4 text-sm text-gray-600">Till 31 Dec 2024</td>
                    <td class="p-4">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" checked class="sr-only peer">
                            <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-sky-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-sky-500"></div>
                        </label>
                    </td>
                    <td class="p-4 text-right text-sm">
                        <button class="text-sky-500 hover:text-sky-700 font-medium mr-2">Edit</button>
                        <button class="text-red-500 hover:text-red-700 font-medium">Delete</button>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="p-4">
                        <span class="font-mono font-bold text-sky-600 bg-sky-50 px-3 py-1 border border-sky-200 rounded">FLAT200</span>
                        <p class="text-xs text-gray-500 mt-1">Weekend Sale</p>
                    </td>
                    <td class="p-4 text-sm font-bold text-gray-800">₹200 FLAT OFF<br><span class="text-xs font-normal text-gray-500">Min Cart: ₹1000</span></td>
                    <td class="p-4 text-sm text-gray-600">Unlimited</td>
                    <td class="p-4 text-sm text-gray-600">Expired (10 Aug)</td>
                    <td class="p-4">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" disabled>
                            <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-sky-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-sky-500 opacity-50"></div>
                        </label>
                    </td>
                    <td class="p-4 text-right text-sm">
                        <button class="text-sky-500 hover:text-sky-700 font-medium mr-2">Edit</button>
                        <button class="text-red-500 hover:text-red-700 font-medium">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
