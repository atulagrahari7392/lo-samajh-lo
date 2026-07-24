<?php $__env->startSection('content'); ?>
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">My Courses</h2>
        <p class="text-gray-500 text-sm mt-1">Manage courses you've created.</p>
    </div>
    <div class="flex space-x-3">
        <a href="<?php echo e(route('teacher.courses.create')); ?>" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium transition-colors">
            + Create New Course
        </a>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Course Card -->
    <div class="glassmorphism rounded-2xl shadow-sm border border-gray-200 bg-white overflow-hidden flex flex-col">
        <div class="h-40 bg-gray-200 bg-cover bg-center" style="background-image: url('https://placehold.co/600x400?text=Maths')"></div>
        <div class="p-5 flex-1 flex flex-col">
            <div class="flex justify-between items-start mb-2">
                <span class="px-2 py-1 bg-green-100 text-green-700 text-[10px] font-bold rounded uppercase">Active</span>
                <span class="text-sm font-bold text-gray-800">₹1,499</span>
            </div>
            <h3 class="text-lg font-bold text-gray-800 mb-1">Advanced Maths Crash Course</h3>
            <p class="text-xs text-gray-500 mb-4">Target: SSC CGL • 25 Lessons</p>
            
            <div class="mt-auto border-t border-gray-100 pt-3 flex justify-between items-center">
                <div class="text-sm">
                    <span class="font-bold text-gray-800">1,240</span>
                    <span class="text-gray-500 text-xs"> Students</span>
                </div>
                <a href="#" class="text-blue-600 text-sm font-medium hover:underline">Manage</a>
            </div>
        </div>
    </div>
    
    <!-- Draft Course Card -->
    <div class="glassmorphism rounded-2xl shadow-sm border border-gray-200 bg-white overflow-hidden flex flex-col">
        <div class="h-40 bg-gray-200 bg-cover bg-center opacity-70 flex items-center justify-center">
            <span class="text-gray-500 font-medium">No Thumbnail</span>
        </div>
        <div class="p-5 flex-1 flex flex-col">
            <div class="flex justify-between items-start mb-2">
                <span class="px-2 py-1 bg-yellow-100 text-yellow-700 text-[10px] font-bold rounded uppercase">Draft</span>
                <span class="text-sm font-bold text-gray-800">₹999</span>
            </div>
            <h3 class="text-lg font-bold text-gray-800 mb-1">Reasoning Basics</h3>
            <p class="text-xs text-gray-500 mb-4">Target: Banking • 0 Lessons</p>
            
            <div class="mt-auto border-t border-gray-100 pt-3 flex justify-between items-center">
                <div class="text-sm">
                    <span class="font-bold text-gray-800">0</span>
                    <span class="text-gray-500 text-xs"> Students</span>
                </div>
                <a href="<?php echo e(route('teacher.courses.create')); ?>" class="text-blue-600 text-sm font-medium hover:underline">Edit Draft</a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.teacher', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\atula\.gemini\antigravity\scratch\lo-samajh-lo\resources\views/teacher/courses/index.blade.php ENDPATH**/ ?>