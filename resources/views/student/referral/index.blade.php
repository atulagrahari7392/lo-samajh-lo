@extends('layouts.app')

@section('title', 'My Referrals | Lo Samajh Lo')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-5xl">
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl shadow-xl overflow-hidden mb-8">
        <div class="p-8 md:p-12 text-white text-center">
            <h1 class="text-3xl md:text-5xl font-extrabold mb-4">Refer & Earn Rewards!</h1>
            <p class="text-lg md:text-xl text-indigo-100 mb-8 max-w-2xl mx-auto">Invite your friends to join Lo Samajh Lo and earn exclusive discounts and wallet credits for every successful enrollment.</p>
            
            <div class="bg-white/20 backdrop-blur-md rounded-xl p-6 inline-block max-w-md w-full">
                <p class="text-sm font-semibold text-indigo-100 uppercase tracking-wide mb-2">Your Unique Referral Code</p>
                <div class="flex items-center justify-center space-x-3 bg-white text-gray-900 rounded-lg p-3">
                    <span class="text-2xl font-mono font-bold tracking-wider" id="refCode">{{ auth()->user()->referral_code ?? 'LSL-WELCOME' }}</span>
                    <button onclick="copyToClipboard()" class="text-indigo-600 hover:text-indigo-800 p-2 bg-indigo-50 rounded-md transition" title="Copy code">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="grid md:grid-cols-3 gap-6 mb-12">
        <div class="bg-white rounded-xl shadow-sm border p-6 text-center">
            <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <h3 class="text-3xl font-bold text-gray-900">{{ $stats['total_referrals'] ?? 0 }}</h3>
            <p class="text-gray-500 font-medium mt-1">Total Referrals</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border p-6 text-center">
            <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h3 class="text-3xl font-bold text-gray-900">{{ $stats['successful_referrals'] ?? 0 }}</h3>
            <p class="text-gray-500 font-medium mt-1">Successful Enrollments</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border p-6 text-center">
            <div class="w-12 h-12 bg-yellow-100 text-yellow-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h3 class="text-3xl font-bold text-gray-900">₹{{ number_format($stats['earnings'] ?? 0, 2) }}</h3>
            <p class="text-gray-500 font-medium mt-1">Total Earnings</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border overflow-hidden">
        <div class="px-6 py-4 border-b bg-gray-50 flex justify-between items-center">
            <h3 class="font-bold text-lg text-gray-900">Referral History</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-600 text-sm uppercase tracking-wide">
                        <th class="px-6 py-4 font-semibold border-b">Referred User</th>
                        <th class="px-6 py-4 font-semibold border-b">Status</th>
                        <th class="px-6 py-4 font-semibold border-b">Reward</th>
                        <th class="px-6 py-4 font-semibold border-b">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-gray-700">
                    @forelse($referrals ?? [] as $referral)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 font-medium">{{ $referral->referredUser->name }}</td>
                        <td class="px-6 py-4">
                            @if($referral->status == 'completed')
                                <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Completed</span>
                            @else
                                <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Pending</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-green-600 font-semibold">+₹{{ $referral->reward_amount }}</td>
                        <td class="px-6 py-4 text-sm">{{ $referral->created_at->format('M d, Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                            You haven't referred anyone yet. Share your code to get started!
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function copyToClipboard() {
        const code = document.getElementById('refCode').innerText;
        navigator.clipboard.writeText(code).then(() => {
            alert('Referral code copied to clipboard!');
        });
    }
</script>
@endsection
