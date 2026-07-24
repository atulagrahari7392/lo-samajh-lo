@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 md:px-6 py-12 max-w-6xl">
    <h1 class="text-3xl font-bold dark:text-white mb-8">Checkout</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Payment Details & Methods -->
        <div class="lg:col-span-2 space-y-6">
            <div class="glass-card bg-white dark:bg-dark-card border border-gray-200 dark:border-gray-800 p-6 shadow-sm">
                <h3 class="font-bold text-xl dark:text-white mb-6">Payment Method</h3>
                
                <div class="space-y-4">
                    <label class="flex items-center p-4 border border-primary-500 bg-primary-50 dark:bg-primary-900/10 rounded-xl cursor-pointer">
                        <input type="radio" name="payment" checked class="text-primary-500 w-5 h-5 focus:ring-primary-500">
                        <div class="ml-4 flex-1">
                            <h4 class="font-bold dark:text-white">UPI (GPay, PhonePe, Paytm)</h4>
                            <p class="text-sm text-gray-500">Instant payment using UPI apps.</p>
                        </div>
                        <span class="text-2xl">📱</span>
                    </label>
                    <label class="flex items-center p-4 border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 rounded-xl cursor-pointer transition">
                        <input type="radio" name="payment" class="text-primary-500 w-5 h-5 focus:ring-primary-500">
                        <div class="ml-4 flex-1">
                            <h4 class="font-bold dark:text-white">Credit / Debit Card</h4>
                            <p class="text-sm text-gray-500">Visa, Mastercard, RuPay.</p>
                        </div>
                        <span class="text-2xl">💳</span>
                    </label>
                    <label class="flex items-center p-4 border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 rounded-xl cursor-pointer transition">
                        <input type="radio" name="payment" class="text-primary-500 w-5 h-5 focus:ring-primary-500">
                        <div class="ml-4 flex-1">
                            <h4 class="font-bold dark:text-white">Net Banking</h4>
                            <p class="text-sm text-gray-500">All major Indian banks supported.</p>
                        </div>
                        <span class="text-2xl">🏦</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="lg:col-span-1">
            <div class="glass-card bg-white dark:bg-dark-card border border-gray-200 dark:border-gray-800 p-6 shadow-sm sticky top-28">
                <h3 class="font-bold text-xl dark:text-white mb-6">Order Summary</h3>
                
                <div class="flex gap-4 mb-6 pb-6 border-b border-gray-100 dark:border-gray-800">
                    <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900 rounded flex items-center justify-center text-2xl shrink-0">📚</div>
                    <div>
                        <h4 class="font-bold text-sm dark:text-white leading-snug">Complete UGC NET Paper 1 Foundation</h4>
                        <p class="text-xs text-gray-500 mt-1">Lifetime Access</p>
                    </div>
                </div>

                <!-- Coupon -->
                <div class="flex gap-2 mb-6">
                    <input type="text" placeholder="Coupon Code" class="flex-1 border border-gray-300 dark:border-gray-700 bg-transparent rounded-lg px-3 py-2 text-sm dark:text-white outline-none focus:border-primary-500">
                    <button class="bg-gray-900 dark:bg-white text-white dark:text-gray-900 px-4 py-2 rounded-lg text-sm font-bold">Apply</button>
                </div>

                <!-- Price Breakdown -->
                <div class="space-y-3 text-sm mb-6 pb-6 border-b border-gray-100 dark:border-gray-800">
                    <div class="flex justify-between text-gray-600 dark:text-gray-400">
                        <span>Original Price</span>
                        <span class="line-through">₹4,999</span>
                    </div>
                    <div class="flex justify-between font-bold text-green-500">
                        <span>Discount (60%)</span>
                        <span>- ₹3,000</span>
                    </div>
                    <div class="flex justify-between text-gray-600 dark:text-gray-400">
                        <span>GST (18%)</span>
                        <span>₹360</span>
                    </div>
                </div>

                <div class="flex justify-between items-center mb-8">
                    <span class="font-bold text-lg dark:text-white">Total Amount</span>
                    <span class="font-bold text-2xl dark:text-white">₹2,359</span>
                </div>

                <a href="/payment/success" class="btn btn-primary w-full py-4 text-lg">Pay Now (₹2,359)</a>
                
                <p class="text-xs text-center text-gray-400 mt-4">Safe & secure payment powered by Razorpay. 100% money back guarantee for 7 days.</p>
            </div>
        </div>
    </div>
</div>
@endsection
