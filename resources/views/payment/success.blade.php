@extends('layouts.app')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center py-12 px-4">
    <div class="max-w-md w-full glass-card bg-white dark:bg-dark-card border border-gray-200 dark:border-gray-800 p-8 text-center shadow-2xl">
        
        <div class="w-24 h-24 mx-auto bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mb-6">
            <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
        </div>
        
        <h1 class="text-3xl font-bold dark:text-white mb-2">Payment Successful!</h1>
        <p class="text-gray-500 dark:text-gray-400 mb-8">Thank you for your purchase. Your course has been added to your dashboard.</p>
        
        <div class="bg-gray-50 dark:bg-gray-800/50 p-4 rounded-xl mb-8 border border-gray-100 dark:border-gray-700 text-left">
            <div class="flex justify-between text-sm mb-2">
                <span class="text-gray-500">Transaction ID</span>
                <span class="font-bold dark:text-white font-mono">TXN-84739201</span>
            </div>
            <div class="flex justify-between text-sm mb-2">
                <span class="text-gray-500">Amount Paid</span>
                <span class="font-bold dark:text-white">₹2,359</span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-gray-500">Date</span>
                <span class="font-bold dark:text-white">{{ date('d M Y, h:i A') }}</span>
            </div>
        </div>
        
        <div class="flex gap-4">
            <a href="/student/dashboard" class="flex-1 btn btn-primary py-3">Go to Dashboard</a>
            <button class="flex-1 bg-white border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-xl font-bold py-3 hover:bg-gray-50 dark:hover:bg-gray-800 transition">View Receipt</button>
        </div>
    </div>
</div>
@endsection
