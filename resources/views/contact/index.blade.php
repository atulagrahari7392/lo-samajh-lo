@extends('layouts.app')

@section('title', 'Contact Us | Lo Samajh Lo')

@section('content')
<div class="container mx-auto px-4 py-16 max-w-6xl">
    <div class="text-center mb-16">
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">Get in Touch</h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Have a question, need technical support, or want to give feedback? We'd love to hear from you.</p>
    </div>

    <div class="grid lg:grid-cols-3 gap-12">
        <!-- Contact Info -->
        <div class="lg:col-span-1 space-y-8">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <div class="flex items-start">
                    <div class="flex-shrink-0 mt-1 text-indigo-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-bold text-gray-900">Head Office</h3>
                        <p class="mt-2 text-gray-600">123 Education Hub, Knowledge Park<br>New Delhi, 110001, India</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <div class="flex items-start">
                    <div class="flex-shrink-0 mt-1 text-indigo-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-bold text-gray-900">Email Us</h3>
                        <p class="mt-2 text-gray-600">support@losamajhlo.com<br>info@losamajhlo.com</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <div class="flex items-start">
                    <div class="flex-shrink-0 mt-1 text-indigo-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-bold text-gray-900">Call Us</h3>
                        <p class="mt-2 text-gray-600">+91 98765 43210<br>Mon-Sat, 9am - 6pm</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 border border-gray-100">
                @if(session('success'))
                    <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-8 rounded">
                        <p class="text-green-700 font-medium">{{ session('success') }}</p>
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Your Name</label>
                            <input type="text" name="name" id="name" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors bg-gray-50 focus:bg-white">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                            <input type="email" name="email" id="email" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors bg-gray-50 focus:bg-white">
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                        <select name="subject" id="subject" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors bg-gray-50 focus:bg-white">
                            <option value="general">General Inquiry</option>
                            <option value="support">Technical Support</option>
                            <option value="billing">Billing Issue</option>
                            <option value="feedback">Feedback</option>
                        </select>
                    </div>

                    <div class="mb-8">
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                        <textarea name="message" id="message" rows="5" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors bg-gray-50 focus:bg-white"></textarea>
                    </div>

                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 px-8 rounded-lg shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-0.5">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
