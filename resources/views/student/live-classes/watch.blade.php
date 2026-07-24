@extends('layouts.app')

@section('content')
<div class="bg-gray-900 min-h-screen text-white">
    <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Main Video Area -->
            <div class="lg:w-3/4 flex flex-col">
                <div class="bg-black rounded-xl overflow-hidden shadow-2xl relative aspect-video">
                    <!-- Placeholder for WebRTC/Zoom Player -->
                    <div class="absolute inset-0 flex items-center justify-center flex-col">
                        <svg class="w-20 h-20 text-gray-600 mb-4 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        <p class="text-gray-400 font-medium">Connecting to live stream...</p>
                        <p class="text-sm text-gray-500 mt-2">Powered by WebRTC</p>
                    </div>
                    
                    <!-- Controls Overlay -->
                    <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-black/80 to-transparent p-4 flex justify-between items-center opacity-0 hover:opacity-100 transition-opacity duration-300">
                        <div class="flex space-x-4 items-center">
                            <button class="text-white hover:text-indigo-400"><svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path></svg></button>
                            <span class="text-sm font-medium">LIVE <span class="w-2 h-2 rounded-full bg-red-500 inline-block ml-2 animate-pulse"></span></span>
                        </div>
                        <div class="flex space-x-4">
                            <button class="text-white hover:text-gray-300"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"></path></svg></button>
                            <button class="text-white hover:text-gray-300"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path></svg></button>
                        </div>
                    </div>
                </div>
                
                <div class="mt-6">
                    <h1 class="text-3xl font-bold text-white mb-2">{{ $liveClass->title }}</h1>
                    <div class="flex items-center text-gray-400 text-sm mb-4">
                        <span class="bg-indigo-600 text-white px-2 py-1 rounded text-xs font-bold mr-3">{{ $liveClass->subject }}</span>
                        <span>Instructor: <span class="font-medium text-gray-200">{{ $liveClass->teacher->name }}</span></span>
                        <span class="mx-2">•</span>
                        <span>Started at {{ $liveClass->started_at->format('h:i A') }}</span>
                    </div>
                    <p class="text-gray-300 leading-relaxed">{{ $liveClass->description }}</p>
                </div>
            </div>

            <!-- Chat and Interactions Area -->
            <div class="lg:w-1/4 flex flex-col bg-gray-800 rounded-xl border border-gray-700 h-[600px] lg:h-auto">
                <div class="p-4 border-b border-gray-700 bg-gray-800 rounded-t-xl flex justify-between items-center">
                    <h3 class="font-bold text-lg">Live Chat</h3>
                    <span class="text-xs bg-gray-700 px-2 py-1 rounded-full text-gray-300">124 Watching</span>
                </div>
                
                <!-- Chat Messages -->
                <div class="flex-1 p-4 overflow-y-auto space-y-4" id="chat-messages">
                    <div class="text-sm">
                        <span class="font-bold text-indigo-400">System:</span>
                        <span class="text-gray-300">Welcome to the live class! Please be respectful in the chat.</span>
                    </div>
                    <!-- Sample Messages -->
                    <div class="text-sm">
                        <span class="font-bold text-green-400">Rahul K:</span>
                        <span class="text-gray-200">Sir, can you explain the last concept again?</span>
                    </div>
                    <div class="text-sm">
                        <span class="font-bold text-yellow-400">Priya M:</span>
                        <span class="text-gray-200">Yes, it was a bit confusing.</span>
                    </div>
                </div>

                <!-- Chat Input -->
                <div class="p-4 border-t border-gray-700 bg-gray-850 rounded-b-xl">
                    <form onsubmit="event.preventDefault(); addMessage();" class="flex items-center space-x-2">
                        <input type="text" id="chat-input" class="flex-1 bg-gray-700 text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 border-none" placeholder="Ask a doubt...">
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg p-2 transition">
                            <svg class="w-5 h-5 transform rotate-90" fill="currentColor" viewBox="0 0 20 20"><path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function addMessage() {
        const input = document.getElementById('chat-input');
        const msg = input.value.trim();
        if(!msg) return;
        
        const chatBox = document.getElementById('chat-messages');
        const div = document.createElement('div');
        div.className = 'text-sm mb-2';
        div.innerHTML = `<span class="font-bold text-blue-400">You:</span> <span class="text-gray-200">${msg}</span>`;
        chatBox.appendChild(div);
        
        input.value = '';
        chatBox.scrollTop = chatBox.scrollHeight;
    }
</script>
@endsection
