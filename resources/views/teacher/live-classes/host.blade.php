@extends('layouts.app')

@section('content')
<div class="bg-gray-900 min-h-screen text-white">
    <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Broadcasting Area -->
            <div class="lg:w-3/4 flex flex-col">
                <!-- Teacher Toolbar -->
                <div class="bg-gray-800 rounded-t-xl p-4 flex justify-between items-center border-b border-gray-700">
                    <div>
                        <h2 class="text-xl font-bold">{{ $liveClass->title }}</h2>
                        <span class="text-red-500 font-bold text-sm animate-pulse flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-red-500"></span> LIVE
                        </span>
                    </div>
                    <div class="flex space-x-3">
                        <button class="bg-gray-700 hover:bg-gray-600 px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            Share Screen
                        </button>
                        <button class="bg-gray-700 hover:bg-gray-600 px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                            Whiteboard
                        </button>
                        <form action="{{ route('teacher.live-class.end', $liveClass->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg text-sm font-bold shadow-lg transition" onclick="return confirm('Are you sure you want to end the class?');">
                                End Class
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Video Preview -->
                <div class="bg-black rounded-b-xl overflow-hidden shadow-2xl relative aspect-video border border-gray-700">
                    <div class="absolute inset-0 flex items-center justify-center flex-col">
                        <div class="w-32 h-32 rounded-full border-4 border-gray-600 flex items-center justify-center mb-4">
                            <svg class="w-16 h-16 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <p class="text-gray-400 font-medium">Camera Preview</p>
                    </div>
                    
                    <!-- Media Controls -->
                    <div class="absolute bottom-6 inset-x-0 flex justify-center items-center space-x-6">
                        <button class="bg-gray-800 hover:bg-gray-700 p-4 rounded-full border border-gray-600 text-white transition shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path></svg>
                        </button>
                        <button class="bg-gray-800 hover:bg-gray-700 p-4 rounded-full border border-gray-600 text-white transition shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        </button>
                        <button class="bg-gray-800 hover:bg-gray-700 p-4 rounded-full border border-gray-600 text-white transition shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Management Tools Area -->
            <div class="lg:w-1/4 flex flex-col gap-4">
                
                <!-- Q&A and Chat -->
                <div class="flex-1 bg-gray-800 rounded-xl border border-gray-700 flex flex-col min-h-[400px]">
                    <div class="flex border-b border-gray-700">
                        <button class="flex-1 p-3 text-sm font-bold text-indigo-400 border-b-2 border-indigo-500">Live Chat</button>
                        <button class="flex-1 p-3 text-sm font-bold text-gray-400 hover:text-gray-200">Q&A (3)</button>
                    </div>
                    
                    <div class="flex-1 p-4 overflow-y-auto space-y-4">
                        <div class="bg-gray-700/50 p-3 rounded-lg text-sm border border-gray-600">
                            <div class="flex justify-between items-start mb-1">
                                <span class="font-bold text-green-400">Rahul K.</span>
                                <span class="text-xs text-gray-500">10:02 AM</span>
                            </div>
                            <p class="text-gray-200">Sir, can you explain the last concept again?</p>
                            <div class="mt-2 flex gap-2">
                                <button class="text-xs bg-indigo-600/30 text-indigo-400 px-2 py-1 rounded hover:bg-indigo-600/50">Reply</button>
                                <button class="text-xs bg-red-600/30 text-red-400 px-2 py-1 rounded hover:bg-red-600/50">Block</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Class Roster -->
                <div class="bg-gray-800 rounded-xl border border-gray-700 p-4">
                    <h3 class="font-bold text-lg mb-3 flex justify-between">
                        <span>Students</span>
                        <span class="text-indigo-400">124</span>
                    </h3>
                    <div class="space-y-2 max-h-48 overflow-y-auto">
                        <div class="flex items-center justify-between p-2 hover:bg-gray-700 rounded-lg">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full bg-blue-500 flex items-center justify-center text-xs font-bold">R</div>
                                <span class="text-sm">Rahul K.</span>
                            </div>
                            <span class="w-2 h-2 rounded-full bg-green-500"></span>
                        </div>
                        <div class="flex items-center justify-between p-2 hover:bg-gray-700 rounded-lg">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full bg-purple-500 flex items-center justify-center text-xs font-bold">P</div>
                                <span class="text-sm">Priya M.</span>
                            </div>
                            <span class="w-2 h-2 rounded-full bg-green-500"></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
