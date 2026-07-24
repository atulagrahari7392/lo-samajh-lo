@extends('layouts.teacher')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Reports & Analytics</h2>
    </div>
    <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
        Download Payout Statement
    </button>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <div class="glassmorphism p-5 rounded-2xl shadow-sm border border-gray-200 bg-white border-l-4 border-l-blue-500">
        <p class="text-sm text-gray-500 font-medium">Total Lifetime Earnings</p>
        <p class="text-3xl font-bold text-gray-800 mt-2">₹125,000</p>
    </div>
    <div class="glassmorphism p-5 rounded-2xl shadow-sm border border-gray-200 bg-white border-l-4 border-l-green-500">
        <p class="text-sm text-gray-500 font-medium">Current Month Earnings</p>
        <p class="text-3xl font-bold text-gray-800 mt-2">₹15,400</p>
    </div>
    <div class="glassmorphism p-5 rounded-2xl shadow-sm border border-gray-200 bg-white border-l-4 border-l-yellow-500">
        <p class="text-sm text-gray-500 font-medium">Pending Payout</p>
        <p class="text-3xl font-bold text-gray-800 mt-2">₹8,200</p>
        <p class="text-xs text-gray-400 mt-1">Will be disbursed on 5th of next month</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Chart -->
    <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-200 bg-white">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Revenue Trend (Last 6 Months)</h3>
        <canvas id="earningsChart" height="250"></canvas>
    </div>

    <!-- Course wise breakdown -->
    <div class="glassmorphism rounded-2xl shadow-sm border border-gray-200 bg-white overflow-hidden">
        <div class="p-5 border-b border-gray-100">
            <h3 class="text-lg font-semibold text-gray-800">Course-wise Breakdown</h3>
        </div>
        <div class="p-0">
            <table class="w-full text-left">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="p-4 text-xs font-medium text-gray-500 uppercase">Course</th>
                        <th class="p-4 text-xs font-medium text-gray-500 uppercase">Sales</th>
                        <th class="p-4 text-xs font-medium text-gray-500 uppercase text-right">Your Share</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr>
                        <td class="p-4 text-sm font-medium text-gray-800">Advanced Maths</td>
                        <td class="p-4 text-sm text-gray-600">120</td>
                        <td class="p-4 text-sm font-bold text-green-600 text-right">₹60,000</td>
                    </tr>
                    <tr>
                        <td class="p-4 text-sm font-medium text-gray-800">Basic Geometry</td>
                        <td class="p-4 text-sm text-gray-600">85</td>
                        <td class="p-4 text-sm font-bold text-green-600 text-right">₹42,500</td>
                    </tr>
                    <tr>
                        <td class="p-4 text-sm font-medium text-gray-800">Algebra Tricks</td>
                        <td class="p-4 text-sm text-gray-600">45</td>
                        <td class="p-4 text-sm font-bold text-green-600 text-right">₹22,500</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    const earnCtx = document.getElementById('earningsChart').getContext('2d');
    new Chart(earnCtx, {
        type: 'line',
        data: {
            labels: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            datasets: [{
                label: 'Earnings (₹)',
                data: [15000, 18000, 16500, 22000, 20500, 24000],
                borderColor: '#2563EB',
                tension: 0.4,
                fill: true,
                backgroundColor: 'rgba(37, 99, 235, 0.1)'
            }]
        }
    });
</script>
@endsection
