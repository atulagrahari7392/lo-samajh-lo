@extends('layouts.app')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center py-12 px-4">
    <div class="max-w-md w-full glass-card bg-white dark:bg-dark-card border border-gray-200 dark:border-gray-800 p-8 text-center shadow-2xl">
        
        <div class="w-24 h-24 mx-auto bg-red-100 dark:bg-red-900/30 rounded-full flex items-center justify-center mb-6">
            <svg class="w-12 h-12 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path></svg>
        </div>
        
        <h1 class="text-3xl font-bold dark:text-white mb-2">Payment Failed</h1>
        <p class="text-gray-500 dark:text-gray-400 mb-8">Unfortunately, your transaction could not be completed. No amount has been deducted.</p>
        
        <div class="bg-gray-50 dark:bg-gray-800/50 p-4 rounded-xl mb-8 border border-gray-100 dark:border-gray-700 text-left">
            <div class="flex justify-between text-sm mb-2">
                <span class="text-gray-500">Error Code</span>
                <span class="font-bold text-red-500 font-mono">ERR_BANK_DECLINED</span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-gray-500">Transaction ID</span>
                <span class="font-bold dark:text-white font-mono">TXN-84739202</span>
            </div>
        </div>
        
        <div class="flex gap-4 flex-col">
            <a href="/checkout" class="w-full btn btn-primary py-3">Try Again</a>
            <button class="w-full bg-transparent text-gray-500 hover:text-gray-800 dark:hover:text-white font-bold py-3 transition">Contact Support</button>
        </div>
    </div>
</div>
@endsection
