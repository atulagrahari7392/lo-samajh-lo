@extends('layouts.app')

@section('title', $affair->title . ' - Current Affairs | Lo Samajh Lo')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <a href="{{ route('current-affairs.index') }}" class="text-blue-600 hover:underline mb-6 inline-block">&larr; Back to Current Affairs</a>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
        <header class="mb-8 border-b pb-6">
            <div class="flex items-center space-x-4 mb-4">
                <span class="bg-blue-100 text-blue-800 text-sm font-semibold px-3 py-1 rounded-full">{{ $affair->date->format('F d, Y') }}</span>
                <span class="text-gray-500 text-sm">{{ $affair->category }}</span>
            </div>
            <h1 class="text-3xl font-bold text-gray-900 leading-tight">{{ $affair->title }}</h1>
        </header>

        <div class="prose max-w-none text-gray-700">
            {!! $affair->content !!}
        </div>
        
        @if($affair->pdf_link)
        <div class="mt-8 pt-6 border-t">
            <a href="{{ $affair->pdf_link }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                Download PDF
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
