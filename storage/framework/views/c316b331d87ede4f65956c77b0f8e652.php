<?php $__env->startSection('title', 'Test Series — Lo Samajh Lo'); ?>
<?php $__env->startSection('content'); ?>
<div class="bg-slate-50 dark:bg-slate-950 min-h-screen">
  <div class="bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-black text-slate-900 dark:text-white">Test Series / <span class="grad-text">टेस्ट सीरीज</span></h1>
      <p class="text-slate-500 dark:text-slate-400 mt-1">50,000+ questions · Mock tests, PYQs, Daily Quizzes</p>
    </div>
  </div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <!-- Filter Tabs -->
    <div class="flex flex-wrap gap-2 mb-8">
      <?php $__currentLoopData = ['all'=>'All Tests','mock'=>'Mock Tests','pyq'=>'PYQ Papers','topic'=>'Topic Tests','daily_quiz'=>'Daily Quiz','live'=>'Live Tests']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <a href="<?php echo e(route('tests.index', ['type'=>$val=='all'?null:$val])); ?>" class="px-4 py-2 rounded-xl text-sm font-bold transition-all <?php echo e(request('type', 'all') == $val ? 'btn-grad text-white shadow' : 'bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 text-slate-700 dark:text-slate-300 hover:border-sky-300'); ?>">
        <?php echo e($label); ?>

      </a>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php $__empty_1 = true; $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all overflow-hidden flex flex-col">
        <div class="p-5 flex-1 space-y-3">
          <div class="flex items-start justify-between gap-2">
            <span class="px-2.5 py-1 rounded-full text-[10px] font-black uppercase
              <?php echo e($test->type=='mock' ? 'bg-red-100 text-red-700 dark:bg-red-900/40 dark:text-red-300' :
                ($test->type=='pyq' ? 'bg-amber-100 text-amber-700 dark:bg-amber-900/40 dark:text-amber-300' :
                ($test->type=='live' ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300' : 'bg-sky-100 text-sky-700 dark:bg-sky-900/40 dark:text-sky-300'))); ?>">
              <?php echo e(strtoupper(str_replace('_', ' ', $test->type))); ?>

            </span>
            <?php if($test->is_live): ?><span class="flex h-2 w-2 relative ml-1 mt-1.5"><span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span><span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span></span><?php endif; ?>
          </div>
          <h3 class="font-bold text-slate-900 dark:text-white text-base leading-tight"><?php echo e($test->title); ?></h3>
          <div class="flex flex-wrap gap-3 text-xs text-slate-500 dark:text-slate-400">
            <span>❓ <?php echo e($test->total_questions); ?> Questions</span>
            <span>📊 <?php echo e($test->total_marks); ?> Marks</span>
            <span>⏱ <?php echo e($test->duration_minutes); ?> mins</span>
            <?php if($test->negative_marking): ?><span class="text-red-500">⚠ -<?php echo e($test->negative_marks_value); ?></span><?php endif; ?>
          </div>
        </div>
        <div class="p-4 pt-0 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between">
          <span class="<?php echo e($test->is_free ? 'text-emerald-600 dark:text-emerald-400' : 'text-sky-600 dark:text-sky-400'); ?> font-black text-sm"><?php echo e($test->is_free ? 'FREE' : '₹'.number_format($test->price ?? 0)); ?></span>
          <a href="<?php echo e(route('tests.show', $test->slug)); ?>" class="px-4 py-2 rounded-xl btn-grad text-white font-bold text-xs shadow">Attempt →</a>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <div class="col-span-3 text-center py-20">
        <span class="text-6xl block mb-4">📝</span>
        <h3 class="text-xl font-bold text-slate-700 dark:text-slate-300">No tests found</h3>
        <p class="text-slate-500 mt-2">Check back soon for new test series</p>
      </div>
      <?php endif; ?>
    </div>

    <div class="mt-8 flex justify-center"><?php echo e($tests->links()); ?></div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\atula\.gemini\antigravity\scratch\lo-samajh-lo\resources\views/tests/index.blade.php ENDPATH**/ ?>