@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center px-4">
    <div class="max-w-md w-full glass glass-card p-8 bg-white dark:bg-dark-card shadow-xl border border-gray-200 dark:border-gray-800 text-center">
        
        <div class="w-16 h-16 bg-green-100 dark:bg-green-900/50 text-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
        </div>
        
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Verify Your OTP</h2>
        <p class="text-gray-500 text-sm mb-8">We've sent a 6-digit code to your phone +91-98765*****</p>
        
        <form action="/verify-otp" method="POST" class="space-y-8 text-left">
            <!-- OTP Input Boxes -->
            <div class="flex justify-between gap-2">
                <input type="text" maxlength="1" class="otp-input" autofocus>
                <input type="text" maxlength="1" class="otp-input">
                <input type="text" maxlength="1" class="otp-input">
                <input type="text" maxlength="1" class="otp-input">
                <input type="text" maxlength="1" class="otp-input">
                <input type="text" maxlength="1" class="otp-input">
            </div>
            
            <button type="submit" class="w-full btn btn-primary py-3">Verify & Proceed</button>
        </form>
        
        <div class="mt-6 flex flex-col items-center gap-2 text-sm text-gray-500">
            <p>Didn't receive code?</p>
            <button class="font-bold text-primary-500 disabled:opacity-50" disabled id="resend-btn">
                Resend in <span id="timer">00:30</span>
            </button>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Simple Timer Logic
    let timeLeft = 30;
    const timerEl = document.getElementById('timer');
    const resendBtn = document.getElementById('resend-btn');
    
    const countdown = setInterval(() => {
        timeLeft--;
        timerEl.innerText = `00:${timeLeft < 10 ? '0' : ''}${timeLeft}`;
        
        if (timeLeft <= 0) {
            clearInterval(countdown);
            timerEl.innerText = "";
            resendBtn.innerText = "Resend OTP Now";
            resendBtn.disabled = false;
        }
    }, 1000);
</script>
@endpush
@endsection
