@extends('layouts.admin')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Payments & Transactions</h2>
    </div>
    <button class="px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded-lg text-sm font-medium transition-colors">
        Export Transactions
    </button>
</div>

<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
    <div class="glassmorphism p-5 rounded-2xl shadow-sm border border-gray-100 bg-white">
        <p class="text-sm text-gray-500">Total Revenue</p>
        <p class="text-2xl font-bold text-gray-800 mt-1">₹4,250,000</p>
    </div>
    <div class="glassmorphism p-5 rounded-2xl shadow-sm border border-gray-100 bg-white">
        <p class="text-sm text-gray-500">This Month</p>
        <p class="text-2xl font-bold text-gray-800 mt-1">₹350,000</p>
    </div>
    <div class="glassmorphism p-5 rounded-2xl shadow-sm border border-gray-100 bg-white">
        <p class="text-sm text-gray-500">Successful Txns</p>
        <p class="text-2xl font-bold text-green-600 mt-1">12,450</p>
    </div>
    <div class="glassmorphism p-5 rounded-2xl shadow-sm border border-gray-100 bg-white">
        <p class="text-sm text-gray-500">Refunded</p>
        <p class="text-2xl font-bold text-red-500 mt-1">₹15,000</p>
    </div>
</div>

<div class="glassmorphism rounded-2xl shadow-sm border border-gray-100 bg-white overflow-hidden">
    <div class="p-4 border-b border-gray-100 flex flex-wrap gap-4 items-center bg-gray-50">
        <input type="text" placeholder="Search Txn ID, User, or Email..." class="flex-1 min-w-[200px] py-2 px-3 rounded-lg border border-gray-300 text-sm">
        <select class="py-2 px-3 rounded-lg border border-gray-300 text-sm">
            <option>All Gateways</option>
            <option>Razorpay</option>
            <option>PhonePe</option>
        </select>
        <select class="py-2 px-3 rounded-lg border border-gray-300 text-sm">
            <option>All Status</option>
            <option>Success</option>
            <option>Failed</option>
            <option>Refunded</option>
        </select>
        <input type="date" class="py-2 px-3 rounded-lg border border-gray-300 text-sm">
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="text-xs font-semibold text-gray-500 uppercase tracking-wider bg-white border-b border-gray-100">
                    <th class="p-4">Txn ID / Date</th>
                    <th class="p-4">Student</th>
                    <th class="p-4">Course / Item</th>
                    <th class="p-4">Amount</th>
                    <th class="p-4">Gateway</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <tr class="hover:bg-gray-50">
                    <td class="p-4">
                        <p class="text-sm font-mono text-gray-800">TXN_987654321</p>
                        <p class="text-xs text-gray-500">23 Jul 2024, 10:30 AM</p>
                    </td>
                    <td class="p-4 text-sm text-gray-800">Rahul Sharma<br><span class="text-xs text-gray-500">rahul@example.com</span></td>
                    <td class="p-4 text-sm text-gray-800">SSC CGL Foundation</td>
                    <td class="p-4 text-sm font-bold text-gray-800">₹1,499</td>
                    <td class="p-4 text-sm text-gray-800">Razorpay</td>
                    <td class="p-4"><span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">Success</span></td>
                    <td class="p-4 text-right"><a href="#" class="text-sky-500 text-sm">View</a></td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="p-4">
                        <p class="text-sm font-mono text-gray-800">TXN_987654322</p>
                        <p class="text-xs text-gray-500">23 Jul 2024, 09:15 AM</p>
                    </td>
                    <td class="p-4 text-sm text-gray-800">Priya Singh<br><span class="text-xs text-gray-500">priya@example.com</span></td>
                    <td class="p-4 text-sm text-gray-800">RRB NTPC Crash Course</td>
                    <td class="p-4 text-sm font-bold text-gray-800">₹999</td>
                    <td class="p-4 text-sm text-gray-800">PhonePe</td>
                    <td class="p-4"><span class="px-2 py-1 bg-red-100 text-red-700 text-xs rounded-full">Failed</span></td>
                    <td class="p-4 text-right"><a href="#" class="text-sky-500 text-sm">View</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
