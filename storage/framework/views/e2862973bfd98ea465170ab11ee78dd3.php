<?php $__env->startSection('content'); ?>
<div class="mb-6 flex justify-between items-center">
    <div>
        <a href="<?php echo e(route('teacher.courses.index')); ?>" class="text-sky-500 hover:underline text-sm mb-2 inline-block">← Back to Courses</a>
        <h2 class="text-2xl font-bold text-gray-800">Submit New Course</h2>
        <p class="text-gray-500 text-sm mt-1">Design a new course. It will be published after admin approval.</p>
    </div>
    <div class="flex space-x-3">
        <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium transition-colors">
            Submit for Approval
        </button>
    </div>
</div>

<!-- Simplified version of the admin course create view -->
<div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100 bg-white max-w-4xl">
    <div class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Course Title (EN) *</label>
                <input type="text" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 text-sm">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Category *</label>
                <select class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 text-sm">
                    <option>SSC</option>
                    <option>Banking</option>
                </select>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Proposed Price (₹) *</label>
                <input type="number" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 text-sm">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Description *</label>
                <textarea rows="5" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 text-sm"></textarea>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Thumbnail Image</label>
                <input type="file" class="w-full py-2 px-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 text-sm">
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.teacher', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\atula\.gemini\antigravity\scratch\lo-samajh-lo\resources\views/teacher/courses/create.blade.php ENDPATH**/ ?>