@extends('layouts.teacher')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Live Classes</h2>
    </div>
    <div class="flex space-x-3">
        <a href="{{ route('teacher.live-classes.create') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium transition-colors">
            + Schedule Class
        </a>
    </div>
</div>

<div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-200 bg-white">
    <p class="text-gray-500 text-sm">Schedule and manage your live sessions for enrolled students.</p>
</div>
@endsection
