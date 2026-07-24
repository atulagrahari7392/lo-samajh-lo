@extends('layouts.admin')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <a href="{{ route('admin.questions.index') }}" class="text-sky-500 hover:underline text-sm mb-2 inline-block">← Back to Question Bank</a>
        <h2 class="text-2xl font-bold text-gray-800">Add New Question</h2>
    </div>
    <div class="flex space-x-3">
        <button class="px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded-lg text-sm font-medium transition-colors">
            Save Question
        </button>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
    <!-- Left Sidebar: Settings -->
    <div class="lg:col-span-1 space-y-6">
        <div class="glassmorphism p-5 rounded-2xl shadow-sm border border-gray-100 bg-white">
            <h3 class="text-sm font-bold text-gray-800 mb-4 uppercase tracking-wider">Classification</h3>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Subject</label>
                    <select class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm">
                        <option>Mathematics</option>
                        <option>English</option>
                        <option>Reasoning</option>
                        <option>General Studies</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Topic</label>
                    <select class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm">
                        <option>Algebra</option>
                        <option>Geometry</option>
                        <option>Trigonometry</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Difficulty</label>
                    <select class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm">
                        <option>Easy</option>
                        <option selected>Medium</option>
                        <option>Hard</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="glassmorphism p-5 rounded-2xl shadow-sm border border-gray-100 bg-white">
            <h3 class="text-sm font-bold text-gray-800 mb-4 uppercase tracking-wider">Marking Scheme</h3>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Marks (+)</label>
                    <input type="number" value="2" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm text-center font-bold text-green-600">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Negative (-)</label>
                    <input type="number" step="0.25" value="0.5" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm text-center font-bold text-red-500">
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content: Editor -->
    <div class="lg:col-span-3">
        <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white mb-6">
            <div class="flex items-center justify-between border-b pb-4 mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Question Content</h3>
                <div class="flex items-center">
                    <label class="text-sm text-gray-600 mr-2">Question Type:</label>
                    <select id="questionTypeSelector" class="py-1 px-3 rounded border border-gray-300 text-sm font-medium focus:ring-sky-500">
                        <option value="mcq">Multiple Choice (MCQ)</option>
                        <option value="msq">Multiple Select (MSQ)</option>
                        <option value="numerical">Numerical Value</option>
                        <option value="tf">True / False</option>
                    </select>
                </div>
            </div>

            <!-- English Content -->
            <div class="mb-6">
                <label class="flex items-center text-sm font-medium text-gray-700 mb-2">
                    <span class="w-6 h-6 rounded bg-blue-100 text-blue-700 flex items-center justify-center text-xs font-bold mr-2">EN</span>
                    Question Text (English)
                </label>
                <textarea rows="3" placeholder="Enter question here..." class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm"></textarea>
                <button class="text-xs text-sky-500 mt-2 hover:underline">📎 Add Image to Question</button>
            </div>

            <!-- Hindi Content -->
            <div class="mb-6">
                <label class="flex items-center text-sm font-medium text-gray-700 mb-2">
                    <span class="w-6 h-6 rounded bg-orange-100 text-orange-700 flex items-center justify-center text-xs font-bold mr-2">HI</span>
                    Question Text (Hindi) - Optional
                </label>
                <textarea rows="3" placeholder="प्रश्न यहाँ दर्ज करें..." class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm font-['Hind']"></textarea>
            </div>
        </div>

        <!-- Options Section (Dynamic based on Type) -->
        <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white mb-6" id="optionsSection">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Options</h3>
                <span class="text-xs bg-yellow-100 text-yellow-800 py-1 px-2 rounded">Select correct option(s) using the radio buttons</span>
            </div>

            <div class="space-y-4">
                <!-- Option A -->
                <div class="flex items-start">
                    <div class="pt-3 pr-4">
                        <input type="radio" name="correct_option" value="A" class="w-5 h-5 text-sky-500 focus:ring-sky-500 border-gray-300">
                    </div>
                    <div class="flex-1 border rounded-lg border-gray-200 p-3 flex">
                        <div class="w-8 flex-shrink-0 font-bold text-gray-400 pt-2">A.</div>
                        <div class="flex-1 space-y-3">
                            <input type="text" placeholder="Option A (English)" class="w-full text-sm border-0 border-b border-gray-200 focus:ring-0 focus:border-sky-500 px-0 pb-1">
                            <input type="text" placeholder="विकल्प A (Hindi)" class="w-full text-sm border-0 border-b border-gray-200 focus:ring-0 focus:border-sky-500 px-0 pb-1 font-['Hind']">
                        </div>
                    </div>
                </div>

                <!-- Option B -->
                <div class="flex items-start">
                    <div class="pt-3 pr-4">
                        <input type="radio" name="correct_option" value="B" class="w-5 h-5 text-sky-500 focus:ring-sky-500 border-gray-300">
                    </div>
                    <div class="flex-1 border rounded-lg border-gray-200 p-3 flex">
                        <div class="w-8 flex-shrink-0 font-bold text-gray-400 pt-2">B.</div>
                        <div class="flex-1 space-y-3">
                            <input type="text" placeholder="Option B (English)" class="w-full text-sm border-0 border-b border-gray-200 focus:ring-0 focus:border-sky-500 px-0 pb-1">
                            <input type="text" placeholder="विकल्प B (Hindi)" class="w-full text-sm border-0 border-b border-gray-200 focus:ring-0 focus:border-sky-500 px-0 pb-1 font-['Hind']">
                        </div>
                    </div>
                </div>

                <!-- Option C -->
                <div class="flex items-start">
                    <div class="pt-3 pr-4">
                        <input type="radio" name="correct_option" value="C" class="w-5 h-5 text-sky-500 focus:ring-sky-500 border-gray-300">
                    </div>
                    <div class="flex-1 border rounded-lg border-gray-200 p-3 flex">
                        <div class="w-8 flex-shrink-0 font-bold text-gray-400 pt-2">C.</div>
                        <div class="flex-1 space-y-3">
                            <input type="text" placeholder="Option C (English)" class="w-full text-sm border-0 border-b border-gray-200 focus:ring-0 focus:border-sky-500 px-0 pb-1">
                            <input type="text" placeholder="विकल्प C (Hindi)" class="w-full text-sm border-0 border-b border-gray-200 focus:ring-0 focus:border-sky-500 px-0 pb-1 font-['Hind']">
                        </div>
                    </div>
                </div>

                <!-- Option D -->
                <div class="flex items-start">
                    <div class="pt-3 pr-4">
                        <input type="radio" name="correct_option" value="D" class="w-5 h-5 text-sky-500 focus:ring-sky-500 border-gray-300">
                    </div>
                    <div class="flex-1 border rounded-lg border-gray-200 p-3 flex">
                        <div class="w-8 flex-shrink-0 font-bold text-gray-400 pt-2">D.</div>
                        <div class="flex-1 space-y-3">
                            <input type="text" placeholder="Option D (English)" class="w-full text-sm border-0 border-b border-gray-200 focus:ring-0 focus:border-sky-500 px-0 pb-1">
                            <input type="text" placeholder="विकल्प D (Hindi)" class="w-full text-sm border-0 border-b border-gray-200 focus:ring-0 focus:border-sky-500 px-0 pb-1 font-['Hind']">
                        </div>
                    </div>
                </div>
            </div>
            
            <button class="mt-4 text-sm font-medium text-sky-500 hover:text-sky-600 border border-dashed border-sky-300 rounded px-4 py-2 w-full text-center">
                + Add Another Option
            </button>
        </div>

        <!-- Explanation Section -->
        <div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Detailed Explanation / Solution</h3>
            <div class="space-y-4">
                <textarea rows="4" placeholder="English Explanation..." class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm"></textarea>
                <textarea rows="4" placeholder="Hindi Explanation..." class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-sky-500 text-sm font-['Hind']"></textarea>
            </div>
        </div>
    </div>
</div>
@endsection
