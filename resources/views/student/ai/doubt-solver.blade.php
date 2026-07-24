@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50 py-8">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight mb-3">AI Doubt Solver</h1>
            <p class="text-lg text-slate-600 max-w-2xl mx-auto">Stuck on a tricky problem? Snap a photo or type it out, and our AI will break it down step-by-step.</p>
        </div>

        <div class="bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden">
            <div class="p-8 md:p-12">
                <form id="doubt-form" class="space-y-8">
                    <!-- Text Area for Doubt -->
                    <div>
                        <label for="doubt_text" class="block text-sm font-semibold text-slate-700 mb-2">Describe your doubt</label>
                        <div class="mt-1">
                            <textarea id="doubt_text" name="doubt_text" rows="4" class="block w-full rounded-xl border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm p-4 bg-slate-50 placeholder-slate-400 transition" placeholder="E.g., How do I calculate the integral of x^2?"></textarea>
                        </div>
                    </div>

                    <!-- File Upload -->
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Or upload an image of the problem</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-300 border-dashed rounded-xl hover:border-purple-500 hover:bg-purple-50 transition cursor-pointer group" onclick="document.getElementById('file-upload').click()">
                            <div class="space-y-2 text-center">
                                <svg class="mx-auto h-12 w-12 text-slate-400 group-hover:text-purple-500 transition" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-slate-600 justify-center">
                                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                                        <span>Upload a file</span>
                                        <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1 group-hover:text-purple-600">or drag and drop</p>
                                </div>
                                <p class="text-xs text-slate-500">PNG, JPG, GIF up to 5MB</p>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-xl shadow-lg text-sm font-bold text-white bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition transform hover:-translate-y-0.5">
                            Solve My Doubt Now
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Result Section (Initially Hidden) -->
            <div id="solution-container" class="hidden bg-slate-50 border-t border-slate-200 p-8 md:p-12">
                <h3 class="text-xl font-bold text-slate-900 mb-4 flex items-center">
                    <svg class="h-6 w-6 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Solution
                </h3>
                <div class="prose prose-purple max-w-none text-slate-700 bg-white p-6 rounded-xl border border-slate-200 shadow-sm" id="solution-content">
                    <!-- AI Solution will be injected here -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
