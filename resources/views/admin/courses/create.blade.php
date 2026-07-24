@extends('layouts.admin')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <a href="{{ route('admin.courses.index') }}" class="text-sky-500 hover:underline text-sm mb-2 inline-block">← Back to Courses</a>
        <h2 class="text-2xl font-bold text-gray-800">Create New Course</h2>
        <p class="text-gray-500 text-sm mt-1">Design and publish a new course.</p>
    </div>
    <div class="flex space-x-3">
        <button type="submit" form="courseForm" name="action" value="draft" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
            Save Draft
        </button>
        <button type="submit" form="courseForm" name="action" value="publish" class="px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded-lg text-sm font-medium transition-colors">
            Publish Course
        </button>
    </div>
</div>

<form id="courseForm" action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <!-- Step Indicator -->
    <div class="mb-8">
        <div class="flex items-center justify-between w-full relative">
            <div class="absolute left-0 top-1/2 transform -translate-y-1/2 w-full h-1 bg-gray-200 z-0"></div>
            <div class="absolute left-0 top-1/2 transform -translate-y-1/2 w-1/3 h-1 bg-sky-500 z-0"></div>
            
            <div class="relative z-10 flex flex-col items-center">
                <div class="w-10 h-10 rounded-full bg-sky-500 text-white flex items-center justify-center font-bold border-4 border-white">1</div>
                <span class="text-sm font-semibold mt-2 text-sky-600">Basic Info</span>
            </div>
            <div class="relative z-10 flex flex-col items-center">
                <div class="w-10 h-10 rounded-full bg-white text-gray-400 border-4 border-gray-200 flex items-center justify-center font-bold">2</div>
                <span class="text-sm font-medium mt-2 text-gray-500">Pricing</span>
            </div>
            <div class="relative z-10 flex flex-col items-center">
                <div class="w-10 h-10 rounded-full bg-white text-gray-400 border-4 border-gray-200 flex items-center justify-center font-bold">3</div>
                <span class="text-sm font-medium mt-2 text-gray-500">Media & Settings</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <!-- Step 1: Basic Info -->
            <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Step 1: Basic Information</h3>
                
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Course Title (English) *</label>
                    <input type="text" name="title_en" required placeholder="e.g. Complete Maths Foundation" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Course Title (Hindi)</label>
                    <input type="text" name="title_hi" placeholder="e.g. सम्पूर्ण गणित फाउंडेशन" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm font-['Hind']">
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Category / Exam *</label>
                        <select name="category_id" required class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm">
                            <option value="">Select Category</option>
                            <option value="1">SSC</option>
                            <option value="2">Banking</option>
                            <option value="3">Railway</option>
                            <option value="4">UPSC</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Assign Teacher *</label>
                        <select name="teacher_id" required class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm">
                            <option value="">Select Teacher</option>
                            <option value="1">Amit Kumar (Maths)</option>
                            <option value="2">Neha Sharma (English)</option>
                        </select>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Language</label>
                        <select name="language" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm">
                            <option value="bilingual">Bilingual (EN + HI)</option>
                            <option value="hindi">Hindi Only</option>
                            <option value="english">English Only</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Level</label>
                        <select name="level" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm">
                            <option value="beginner">Beginner</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="advanced">Advanced</option>
                        </select>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description *</label>
                    <!-- Simple textarea for fallback, normally integrate Quill.js or TinyMCE here -->
                    <textarea id="descriptionEditor" name="description" rows="6" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm"></textarea>
                    <p class="text-xs text-gray-500 mt-1">Supports HTML formatting.</p>
                </div>
            </div>
            
            <!-- Step 2: Pricing -->
            <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Step 2: Pricing & Validity</h3>
                
                <div class="flex items-center space-x-6 mb-6">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_free" id="is_free_toggle" class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-sky-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-sky-500"></div>
                        <span class="ml-3 text-sm font-medium text-gray-700">Make this course FREE</span>
                    </label>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4" id="pricing_fields">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Regular Price (₹)</label>
                        <input type="number" name="price" value="0" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Discounted Price (₹)</label>
                        <input type="number" name="discount_price" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Validity (Months)</label>
                        <select name="validity" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm">
                            <option value="6">6 Months</option>
                            <option value="12">12 Months (1 Year)</option>
                            <option value="24">24 Months (2 Years)</option>
                            <option value="0">Lifetime</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="space-y-6">
            <!-- Step 3: Media -->
            <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Media</h3>
                
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Course Thumbnail *</label>
                    <div class="flex flex-col items-center justify-center p-6 border-2 border-dashed border-gray-300 rounded-lg bg-gray-50 hover:bg-gray-100 cursor-pointer">
                        <svg class="w-8 h-8 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <p class="text-xs font-medium text-gray-600">Upload Thumbnail</p>
                        <p class="text-[10px] text-gray-500">1280x720 (16:9) recommended</p>
                        <input type="file" name="thumbnail" accept="image/*" class="hidden">
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Preview Video URL (Optional)</label>
                    <input type="url" name="preview_video" placeholder="YouTube link" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm">
                </div>
            </div>
            
            <!-- What you will learn -->
            <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">What you'll learn</h3>
                <textarea name="benefits" rows="4" placeholder="- Topic 1&#10;- Topic 2" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 text-sm"></textarea>
                <p class="text-xs text-gray-500 mt-1">Add one benefit per line starting with a dash (-).</p>
            </div>
        </div>
    </div>
</form>

<script>
    document.getElementById('is_free_toggle').addEventListener('change', function() {
        const pricingFields = document.getElementById('pricing_fields');
        if(this.checked) {
            pricingFields.style.opacity = '0.5';
            pricingFields.querySelectorAll('input').forEach(input => input.disabled = true);
        } else {
            pricingFields.style.opacity = '1';
            pricingFields.querySelectorAll('input').forEach(input => input.disabled = false);
        }
    });
</script>
<!-- CDN for TinyMCE or Quill would go here to mount on #descriptionEditor -->
@endsection
