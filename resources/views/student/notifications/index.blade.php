@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen py-10">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900">Notifications</h1>
            @if(count($notifications) > 0)
            <form action="{{ route('student.notifications.markAllRead') }}" method="POST">
                @csrf
                <button type="submit" class="text-sm font-medium text-indigo-600 hover:text-indigo-800 transition">
                    Mark all as read
                </button>
            </form>
            @endif
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            @forelse($notifications as $notification)
                <div class="p-6 border-b border-gray-50 hover:bg-gray-50 transition duration-150 flex gap-4 {{ is_null($notification->read_at) ? 'bg-indigo-50/30' : '' }}">
                    
                    <!-- Icon based on type -->
                    <div class="flex-shrink-0 mt-1">
                        @if($notification->type == 'live_class')
                            <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center text-red-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            </div>
                        @elseif($notification->type == 'course_update')
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                            </div>
                        @elseif($notification->type == 'assignment')
                            <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                            </div>
                        @else
                            <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                        @endif
                    </div>

                    <div class="flex-1">
                        <div class="flex justify-between items-start">
                            <h4 class="text-lg font-bold text-gray-900">{{ $notification->title }}</h4>
                            <span class="text-xs font-medium text-gray-500 whitespace-nowrap">{{ $notification->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-gray-600 mt-1 mb-3">{{ $notification->message }}</p>
                        
                        @if($notification->action_url)
                        <a href="{{ $notification->action_url }}" class="inline-flex items-center text-sm font-bold text-indigo-600 hover:text-indigo-800">
                            {{ $notification->action_text ?? 'View Details' }}
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                        @endif
                    </div>
                    
                    @if(is_null($notification->read_at))
                    <div class="flex-shrink-0 flex items-center">
                        <span class="w-3 h-3 bg-indigo-600 rounded-full"></span>
                    </div>
                    @endif
                </div>
            @empty
                <div class="p-12 text-center flex flex-col items-center">
                    <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    <h3 class="text-xl font-bold text-gray-700">All Caught Up!</h3>
                    <p class="text-gray-500 mt-2">You don't have any new notifications at the moment.</p>
                </div>
            @endforelse
            
            @if(count($notifications) > 0)
            <div class="p-4 border-t border-gray-100 bg-gray-50">
                {{ $notifications->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
