@extends('layouts.admin')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <a href="{{ route('admin.teachers.index') }}" class="text-sky-500 hover:underline text-sm mb-2 inline-block">← Back to Teachers</a>
        <h2 class="text-2xl font-bold text-gray-800">Teacher Profile: Amit Kumar</h2>
    </div>
    <div class="flex space-x-3">
        <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
            Edit Details
        </button>
        <button class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm font-medium transition-colors">
            Suspend Account
        </button>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <!-- Left Column: Profile Card -->
    <div class="col-span-1 space-y-6">
        <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white text-center">
            <div class="w-24 h-24 rounded-full bg-gray-200 overflow-hidden mx-auto mb-4">
                <img src="https://placehold.co/150x150" alt="Avatar" class="w-full h-full object-cover">
            </div>
            <h3 class="text-xl font-bold text-gray-800">Amit Kumar</h3>
            <p class="text-sm text-gray-500 mb-4">Mathematics • 5 Years Experience</p>
            
            <div class="flex justify-center space-x-2 mb-6">
                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium flex items-center"><svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg> Verified</span>
            </div>

            <div class="border-t border-gray-100 pt-4 text-left">
                <div class="mb-3">
                    <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Email</p>
                    <p class="text-sm text-gray-800">amit.kumar@example.com</p>
                </div>
                <div class="mb-3">
                    <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Phone</p>
                    <p class="text-sm text-gray-800">+91 9876543210</p>
                </div>
                <div class="mb-3">
                    <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Commission Share</p>
                    <p class="text-sm text-gray-800 font-semibold text-green-600">60% Teacher / 40% Platform</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column: Stats & Chart -->
    <div class="col-span-2 space-y-6">
        <div class="grid grid-cols-3 gap-4">
            <div class="glassmorphism p-4 rounded-2xl shadow-sm border border-gray-100 bg-white text-center">
                <p class="text-3xl font-bold text-gray-800">5</p>
                <p class="text-xs text-gray-500 mt-1">Total Courses</p>
            </div>
            <div class="glassmorphism p-4 rounded-2xl shadow-sm border border-gray-100 bg-white text-center">
                <p class="text-3xl font-bold text-gray-800">4,520</p>
                <p class="text-xs text-gray-500 mt-1">Total Students</p>
            </div>
            <div class="glassmorphism p-4 rounded-2xl shadow-sm border border-gray-100 bg-white text-center">
                <p class="text-3xl font-bold text-gray-800">₹8.5L</p>
                <p class="text-xs text-gray-500 mt-1">Total Revenue Generated</p>
            </div>
        </div>

        <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Revenue & Students (Last 6 Months)</h3>
            <canvas id="teacherChart" height="200"></canvas>
        </div>
    </div>
</div>

<div class="glassmorphism rounded-2xl shadow-sm border border-gray-100 bg-white overflow-hidden">
    <div class="p-6 border-b border-gray-100">
        <h3 class="text-lg font-semibold text-gray-800">Courses by this Teacher</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="text-xs font-semibold text-gray-500 uppercase tracking-wider bg-gray-50 border-b border-gray-100">
                    <th class="p-4">Course Name</th>
                    <th class="p-4">Enrollments</th>
                    <th class="p-4">Price</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <tr class="hover:bg-gray-50">
                    <td class="p-4 font-medium text-gray-800">SSC CGL Advanced Maths</td>
                    <td class="p-4 text-gray-600">2,150</td>
                    <td class="p-4 text-gray-600">₹1,499</td>
                    <td class="p-4"><span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">Published</span></td>
                    <td class="p-4 text-right"><a href="#" class="text-sky-500 hover:underline text-sm">View</a></td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="p-4 font-medium text-gray-800">RRB NTPC Maths Crash Course</td>
                    <td class="p-4 text-gray-600">1,820</td>
                    <td class="p-4 text-gray-600">₹999</td>
                    <td class="p-4"><span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">Published</span></td>
                    <td class="p-4 text-right"><a href="#" class="text-sky-500 hover:underline text-sm">View</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    const ctx = document.getElementById('teacherChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [
                {
                    label: 'Revenue (₹)',
                    data: [120000, 150000, 140000, 180000, 130000, 160000],
                    backgroundColor: '#38BDF8',
                    yAxisID: 'y'
                },
                {
                    label: 'New Students',
                    data: [450, 520, 480, 610, 430, 550],
                    type: 'line',
                    borderColor: '#0F172A',
                    yAxisID: 'y1'
                }
            ]
        },
        options: {
            scales: {
                y: { type: 'linear', display: true, position: 'left' },
                y1: { type: 'linear', display: true, position: 'right', grid: { drawOnChartArea: false } }
            }
        }
    });
</script>
@endsection
