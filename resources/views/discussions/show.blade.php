<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Discussion') }}
            </h2>
            <a href="{{ route('discussions.index') }}" class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">
                &larr; Back to all discussions
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Main Discussion Post -->
            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6">
                    <h1 class="text-2xl font-bold text-gray-900 mb-4">{{ $discussion->title }}</h1>
                    <div class="flex items-center space-x-4 mb-6 pb-6 border-b border-gray-200">
                        <div class="flex-shrink-0">
                            <span class="inline-block h-10 w-10 rounded-full overflow-hidden bg-gray-100">
                                <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </span>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">{{ $discussion->user->name ?? 'Anonymous' }}</p>
                            <p class="text-sm text-gray-500">{{ $discussion->created_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                    
                    <div class="prose max-w-none text-gray-700">
                        {!! nl2br(e($discussion->body)) !!}
                    </div>
                </div>
            </div>

            <!-- Replies -->
            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6 border-b border-gray-200 bg-gray-50">
                    <h3 class="text-lg font-medium text-gray-900">{{ $discussion->replies->count() ?? 0 }} Replies</h3>
                </div>
                
                <div class="divide-y divide-gray-200">
                    @forelse($discussion->replies ?? [] as $reply)
                        <div class="p-6">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="flex-shrink-0">
                                    <span class="inline-block h-8 w-8 rounded-full overflow-hidden bg-gray-100">
                                        <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                    </span>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $reply->user->name ?? 'Anonymous' }}</p>
                                    <p class="text-xs text-gray-500">{{ $reply->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            <div class="text-gray-700 text-sm">
                                {!! nl2br(e($reply->body)) !!}
                            </div>
                        </div>
                    @empty
                        <div class="p-6 text-center text-gray-500">
                            No replies yet. Be the first to join the discussion!
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Reply Form -->
            @auth
            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6 border-b border-gray-200 bg-gray-50">
                    <h3 class="text-lg font-medium text-gray-900">Post a Reply</h3>
                </div>
                <div class="p-6">
                    <form action="{{ route('discussions.replies.store', $discussion) }}" method="POST">
                        @csrf
                        <div>
                            <label for="body" class="sr-only">Reply Content</label>
                            <textarea id="body" name="body" rows="4" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Add to the discussion..." required></textarea>
                            @error('body')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-4 flex justify-end">
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Post Reply
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @else
            <div class="bg-indigo-50 border-l-4 border-indigo-400 p-4 rounded-md">
                <div class="flex">
                    <div class="ml-3">
                        <p class="text-sm text-indigo-700">
                            Please <a href="{{ route('login') }}" class="font-medium underline hover:text-indigo-600">log in</a> to post a reply.
                        </p>
                    </div>
                </div>
            </div>
            @endauth
        </div>
    </div>
</x-app-layout>
