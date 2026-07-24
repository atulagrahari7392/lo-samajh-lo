@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 md:px-6 py-12 max-w-4xl">
    
    <!-- Article Header -->
    <div class="text-center mb-10">
        <div class="inline-block bg-primary-100 dark:bg-primary-900/30 text-primary-600 px-3 py-1 rounded-full text-xs font-bold mb-4 uppercase tracking-wider">Exam Strategy</div>
        <h1 class="text-3xl md:text-5xl font-extrabold dark:text-white mb-6 leading-tight">How to Score 80+ in UGC NET Paper 1: A Complete Guide</h1>
        
        <div class="flex items-center justify-center gap-6 text-gray-500 text-sm">
            <div class="flex items-center gap-2">
                <img src="https://ui-avatars.com/api/?name=Dr+Rahul" class="w-10 h-10 rounded-full">
                <div class="text-left">
                    <p class="font-bold dark:text-white text-base">Dr. Rahul Sharma</p>
                    <p class="text-xs">Top Educator</p>
                </div>
            </div>
            <div class="h-10 w-px bg-gray-200 dark:bg-gray-700"></div>
            <div>
                <p class="font-bold dark:text-white">Oct 10, 2023</p>
                <p class="text-xs">5 min read</p>
            </div>
        </div>
    </div>

    <!-- Hero Image -->
    <div class="w-full aspect-video bg-gradient-to-r from-blue-500 to-cyan-400 rounded-2xl mb-12 flex items-center justify-center shadow-xl">
        <span class="text-8xl">🎯</span>
    </div>

    <!-- Article Content -->
    <div class="prose prose-lg dark:prose-invert prose-primary max-w-none">
        <p class="lead text-xl text-gray-600 dark:text-gray-300 font-medium mb-8">
            Paper 1 of the UGC NET exam is common for all candidates and plays a crucial role in securing a JRF. Scoring 80+ (i.e., 40+ correct questions) is highly achievable if you follow a structured approach.
        </p>

        <h3>1. Understand the Unit-wise Weightage</h3>
        <p>There are 10 units in Paper 1, and officially, 5 questions are asked from each unit. However, the actual trend varies slightly:</p>
        <ul>
            <li><strong>Data Interpretation & Maths:</strong> Very scoring if your calculation speed is good. (10 questions approx)</li>
            <li><strong>Teaching & Research Aptitude:</strong> Core conceptual areas. Require deep understanding, not cramming.</li>
            <li><strong>Logical Reasoning:</strong> Focus heavily on Indian Logic (Pramanas), as NTA loves this section.</li>
        </ul>

        <blockquote>
            "Don't try to master everything. Master the high-scoring, high-frequency topics first." 
        </blockquote>

        <h3>2. Practice Previous Year Questions (PYQs)</h3>
        <p>PYQs are your best friends. Solve at least the last 5 years of Paper 1 questions. NTA often repeats concepts, if not the exact questions.</p>
        
        <div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-xl border-l-4 border-primary-500 my-8">
            <h4 class="font-bold mb-2 m-0 text-gray-900 dark:text-white">Pro Tip</h4>
            <p class="text-sm m-0">When analyzing PYQs, don't just look at the correct answer. Study all the other 3 options as well, because the next exam's question might be framed around them.</p>
        </div>

        <h3>3. Time Management during the Exam</h3>
        <p>You have 3 hours for both papers. Ideally, you should wrap up Paper 1 in <strong>60 minutes</strong>. Skip time-consuming DI or Maths questions in the first round and come back to them later.</p>

        <p>Ready to start? Check out our <a href="/courses">Complete Foundation Course</a> to cover the entire syllabus systematically.</p>
    </div>
    
    <!-- Share/Action -->
    <div class="border-t border-gray-200 dark:border-gray-800 mt-12 pt-8 flex justify-between items-center">
        <div class="flex gap-2">
            <button class="bg-blue-600 text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-blue-700 transition">f</button>
            <button class="bg-blue-400 text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-blue-500 transition">t</button>
            <button class="bg-green-500 text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-green-600 transition">w</button>
        </div>
        <button class="btn border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-bold px-6 py-2 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-800">
            🔖 Bookmark
        </button>
    </div>
</div>
@endsection
