@extends('layouts.admin')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <a href="{{ route('admin.payments.index') }}" class="text-sky-500 hover:underline text-sm mb-2 inline-block">← Back to Payments</a>
        <h2 class="text-2xl font-bold text-gray-800">Transaction Details</h2>
    </div>
    <div class="flex space-x-3">
        <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
            Download Invoice
        </button>
        <button class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm font-medium transition-colors">
            Initiate Refund
        </button>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Transaction Info -->
    <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white">
        <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Payment Info</h3>
        <div class="space-y-4">
            <div class="flex justify-between">
                <span class="text-gray-500 text-sm">Transaction ID:</span>
                <span class="font-mono text-gray-800 text-sm font-medium">TXN_987654321</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500 text-sm">Date & Time:</span>
                <span class="text-gray-800 text-sm">23 Jul 2024, 10:30 AM</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500 text-sm">Status:</span>
                <span class="px-2 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full">SUCCESS</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500 text-sm">Payment Gateway:</span>
                <span class="text-gray-800 text-sm font-medium">Razorpay</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500 text-sm">Gateway Order ID:</span>
                <span class="font-mono text-gray-800 text-sm">order_Kdf8s9fs8d</span>
            </div>
            <div class="border-t pt-3 flex justify-between">
                <span class="text-gray-800 font-semibold">Total Amount:</span>
                <span class="text-sky-600 font-bold text-lg">₹1,499.00</span>
            </div>
        </div>
    </div>

    <!-- Student & Item Info -->
    <div class="space-y-6">
        <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Customer Details</h3>
            <div class="flex items-center space-x-4 mb-4">
                <div class="w-12 h-12 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xl">R</div>
                <div>
                    <h4 class="font-semibold text-gray-800">Rahul Sharma</h4>
                    <p class="text-sm text-gray-500">rahul@example.com</p>
                </div>
            </div>
            <div class="text-sm text-gray-600">
                <p><strong>Phone:</strong> +91 9876543210</p>
                <p class="mt-1"><strong>User ID:</strong> UID-4589</p>
            </div>
        </div>
        
        <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Purchased Item</h3>
            <div class="flex justify-between items-center">
                <div>
                    <h4 class="font-semibold text-gray-800">SSC CGL Complete Foundation</h4>
                    <p class="text-sm text-gray-500">Type: Course</p>
                </div>
                <div class="text-right">
                    <p class="font-bold text-gray-800">₹1,499.00</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
