<?php $__env->startSection('title', 'Teacher Dashboard — Lo Samajh Lo'); ?>
<?php $__env->startSection('content'); ?>
<div class="bg-slate-100 dark:bg-slate-950 min-h-screen flex">

  <!-- Teacher Sidebar -->
  <aside class="w-60 flex-shrink-0 bg-white dark:bg-slate-900 border-r border-slate-200 dark:border-slate-800 min-h-screen sticky top-0 p-5 space-y-1 hidden lg:block">
    <div class="flex items-center gap-3 mb-6 px-2">
      <div class="w-9 h-9 rounded-xl btn-grad flex items-center justify-center font-black text-white text-sm">T</div>
      <div>
        <p class="font-black text-slate-900 dark:text-white text-sm line-clamp-1"><?php echo e(auth()->user()->name); ?></p>
        <p class="text-[10px] text-indigo-500 font-bold">TEACHER PANEL</p>
      </div>
    </div>

    <?php $teacherNav = [
      ['icon'=>'📊','label'=>'Dashboard','route'=>'teacher.dashboard'],
      ['icon'=>'📚','label'=>'My Courses','route'=>'teacher.courses.index'],
      ['icon'=>'📝','label'=>'My Tests','route'=>'teacher.tests.index'],
      ['icon'=>'📄','label'=>'Notes & PDFs','route'=>'teacher.notes.index'],
      ['icon'=>'🔴','label'=>'Live Classes','route'=>'teacher.live-classes.index'],
      ['icon'=>'👨‍🎓','label'=>'My Students','route'=>'teacher.students.index'],
      ['icon'=>'💰','label'=>'Earnings','route'=>'teacher.earnings'],
      ['icon'=>'👤','label'=>'My Profile','route'=>'teacher.profile'],
    ]; ?>

    <?php $__currentLoopData = $teacherNav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(route($nav['route'])); ?>" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold <?php echo e(request()->routeIs($nav['route']) ? 'bg-indigo-500 text-white shadow-sm' : 'text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800'); ?> transition-all">
      <span><?php echo e($nav['icon']); ?></span><?php echo e($nav['label']); ?>

    </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <div class="pt-4 border-t border-slate-200 dark:border-slate-800 mt-4">
      <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-800">🌐 View Site</a>
      <form method="POST" action="<?php echo e(route('logout')); ?>"><?php echo csrf_field(); ?>
        <button class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 w-full">🚪 Logout</button>
      </form>
    </div>
  </aside>

  <!-- Main -->
  <div class="flex-1 min-w-0 p-6">
    <div class="flex items-center justify-between mb-7">
      <div>
        <h1 class="text-2xl font-black text-slate-900 dark:text-white">Welcome, <?php echo e(auth()->user()->name); ?> 👋</h1>
        <p class="text-slate-500 text-sm">Your teaching overview for <?php echo e(now()->format('d M Y')); ?></p>
      </div>
      <a href="<?php echo e(route('teacher.courses.create')); ?>" class="px-4 py-2.5 rounded-xl btn-grad text-white font-bold text-sm shadow">+ New Course</a>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-8">
      <?php $__currentLoopData = [
        ['icon'=>'📚','label'=>'My Courses','value'=>$stats['total_courses'],'color'=>'indigo'],
        ['icon'=>'👨‍🎓','label'=>'My Students','value'=>$stats['total_students'],'color'=>'sky'],
        ['icon'=>'📝','label'=>'Tests Created','value'=>$stats['total_tests'],'color'=>'emerald'],
        ['icon'=>'📹','label'=>'Upcoming Lives','value'=>$stats['upcoming_lives'],'color'=>'red'],
      ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 p-5 shadow-sm hover:shadow-md transition-all">
        <span class="text-2xl block mb-2"><?php echo e($stat['icon']); ?></span>
        <p class="text-2xl font-black text-slate-900 dark:text-white"><?php echo e($stat['value']); ?></p>
        <p class="text-xs text-slate-500 mt-1"><?php echo e($stat['label']); ?></p>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <!-- My Courses List -->
    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm p-5">
      <div class="flex items-center justify-between mb-4">
        <h2 class="font-bold text-slate-900 dark:text-white">My Courses</h2>
        <a href="<?php echo e(route('teacher.courses.create')); ?>" class="text-xs text-sky-500 hover:underline">+ Add New</a>
      </div>
      <?php $__empty_1 = true; $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <div class="flex items-center gap-4 py-3 border-b border-slate-100 dark:border-slate-800 last:border-0">
        <div class="w-10 h-10 rounded-xl bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-lg">📚</div>
        <div class="flex-1 min-w-0">
          <p class="font-semibold text-sm text-slate-900 dark:text-white truncate"><?php echo e($course->title); ?></p>
          <div class="flex items-center gap-3 mt-0.5">
            <span class="<?php echo e($course->is_published ? 'text-emerald-500' : 'text-amber-500'); ?> text-[10px] font-bold"><?php echo e($course->is_published ? '● Published' : '● Draft'); ?></span>
          </div>
        </div>
        <div class="flex gap-2">
          <a href="<?php echo e(route('teacher.courses.show', $course->id)); ?>" class="px-3 py-1.5 rounded-lg border border-slate-200 dark:border-slate-700 text-xs font-bold text-slate-600 dark:text-slate-300 hover:border-sky-400">View</a>
          <a href="<?php echo e(route('teacher.courses.edit', $course->id)); ?>" class="px-3 py-1.5 rounded-lg btn-grad text-white text-xs font-bold">Edit</a>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <div class="text-center py-8">
        <span class="text-4xl block mb-2">📚</span>
        <p class="text-slate-500 text-sm">No courses yet. <a href="<?php echo e(route('teacher.courses.create')); ?>" class="text-sky-500 font-bold hover:underline">Create your first course!</a></p>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\atula\.gemini\antigravity\scratch\lo-samajh-lo\resources\views/teacher/dashboard.blade.php ENDPATH**/ ?>