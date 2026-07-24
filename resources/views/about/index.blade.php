@extends('layouts.app')

@section('title', 'About Us | Lo Samajh Lo')

@section('content')
<div class="bg-gray-50 pt-16 pb-24">
    <div class="container mx-auto px-4 max-w-6xl">
        <!-- Hero Section -->
        <div class="text-center mb-20">
            <h1 class="text-5xl font-extrabold text-gray-900 tracking-tight mb-6">Empowering Learners, <br><span class="text-indigo-600">Transforming Futures.</span></h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">Lo Samajh Lo is dedicated to providing high-quality, accessible education to help students conquer competitive exams and achieve their dreams.</p>
        </div>

        <!-- Vision & Mission -->
        <div class="grid md:grid-cols-2 gap-12 mb-20">
            <div class="bg-white p-10 rounded-2xl shadow-xl border border-gray-100 transform hover:-translate-y-1 transition duration-300">
                <div class="w-14 h-14 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Our Vision</h2>
                <p class="text-gray-600 text-lg leading-relaxed">To be the most trusted and innovative digital learning platform, breaking geographical barriers and making premier education available to every aspiring student in India.</p>
            </div>
            
            <div class="bg-white p-10 rounded-2xl shadow-xl border border-gray-100 transform hover:-translate-y-1 transition duration-300">
                <div class="w-14 h-14 bg-green-100 text-green-600 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m3-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Our Mission</h2>
                <p class="text-gray-600 text-lg leading-relaxed">To simplify complex concepts through expert-led courses, interactive materials, and data-driven insights, ensuring our students are thoroughly prepared for success.</p>
            </div>
        </div>

        <!-- Team Section -->
        <div class="text-center">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Meet the Team</h2>
            <p class="text-gray-600 mb-12 max-w-2xl mx-auto">Our educators and industry experts are passionate about your success.</p>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Team Member 1 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100">
                    <div class="h-48 bg-gray-200"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900">Rahul Sharma</h3>
                        <p class="text-indigo-600 font-medium mb-3">Founder & Lead Educator</p>
                        <p class="text-gray-600 text-sm">10+ years of experience in guiding students for UPSC and State PSC exams.</p>
                    </div>
                </div>
                
                <!-- Placeholder for more -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100">
                    <div class="h-48 bg-gray-200"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900">Priya Singh</h3>
                        <p class="text-indigo-600 font-medium mb-3">Head of Content Strategy</p>
                        <p class="text-gray-600 text-sm">Expert in crafting engaging and comprehensive study materials and test series.</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100">
                    <div class="h-48 bg-gray-200"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900">Amit Verma</h3>
                        <p class="text-indigo-600 font-medium mb-3">Technical Director</p>
                        <p class="text-gray-600 text-sm">Ensuring a seamless, bug-free, and interactive platform experience for all users.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
