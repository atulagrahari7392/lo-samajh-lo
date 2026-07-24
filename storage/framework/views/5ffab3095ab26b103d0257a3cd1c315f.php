<?php $__env->startSection('title', 'Admin Dashboard — Lo Samajh Lo'); ?>
<?php $__env->startSection('content'); ?>
<div class="bg-slate-100 dark:bg-slate-950 min-h-screen flex">

  <!-- Admin Sidebar -->
  <aside class="w-64 flex-shrink-0 bg-white dark:bg-slate-900 border-r border-slate-200 dark:border-slate-800 min-h-screen sticky top-0 p-5 space-y-1 hidden lg:block">
    <div class="flex items-center gap-3 mb-6 px-2">
      <div class="w-9 h-9 rounded-xl btn-grad flex items-center justify-center font-black text-white text-sm">LS</div>
      <div>
        <p class="font-black text-slate-900 dark:text-white text-sm">Lo Samajh Lo</p>
        <p class="text-[10px] text-sky-500 font-bold">ADMIN PANEL</p>
      </div>
    </div>

    <?php
    $adminNav = [
      ['icon'=>'📊','label'=>'Dashboard','route'=>'admin.dashboard'],
      ['icon'=>'👨‍🎓','label'=>'Students','route'=>'admin.students.index'],
      ['icon'=>'👨‍🏫','label'=>'Teachers','route'=>'admin.teachers.index'],
      ['icon'=>'📚','label'=>'Courses','route'=>'admin.courses.index'],
      ['icon'=>'📝','label'=>'Tests','route'=>'admin.tests.index'],
      ['icon'=>'📄','label'=>'Notes','route'=>'admin.notes.index'],
      ['icon'=>'🔴','label'=>'Live Classes','route'=>'admin.live-classes.index'],
      ['icon'=>'📰','label'=>'Blog','route'=>'admin.blog.index'],
      ['icon'=>'🗞','label'=>'Current Affairs','route'=>'admin.current-affairs.index'],
      ['icon'=>'💰','label'=>'Payments','route'=>'admin.payments.index'],
      ['icon'=>'🎟','label'=>'Coupons','route'=>'admin.coupons.index'],
      ['icon'=>'🔔','label'=>'Notifications','route'=>'admin.notifications'],
      ['icon'=>'⚙️','label'=>'Settings','route'=>'admin.settings.index'],
    ];
    ?>

    <?php $__currentLoopData = $adminNav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(route($nav['route'])); ?>" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold <?php echo e(request()->routeIs($nav['route']) ? 'btn-grad text-white shadow-sm' : 'text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800'); ?> transition-all">
      <span><?php echo e($nav['icon']); ?></span><?php echo e($nav['label']); ?>

    </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <div class="pt-4 border-t border-slate-200 dark:border-slate-800 mt-4">
      <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm text-slate-500 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800">
        🌐 View Site
      </a>
      <form method="POST" action="<?php echo e(route('logout')); ?>"><?php echo csrf_field(); ?>
        <button class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 w-full text-left">🚪 Logout</button>
      </form>
    </div>
  </aside>

  <!-- Main Content -->
  <div class="flex-1 min-w-0 p-6">
    <!-- Top bar -->
    <div class="flex items-center justify-between mb-7">
      <div>
        <h1 class="text-2xl font-black text-slate-900 dark:text-white">Admin Dashboard</h1>
        <p class="text-slate-500 dark:text-slate-400 text-sm">Platform overview · <?php echo e(now()->format('d M Y')); ?></p>
      </div>
      <div class="flex items-center gap-3">
        <div class="w-9 h-9 rounded-full btn-grad flex items-center justify-center text-white font-bold text-sm"><?php echo e(substr(auth()->user()->name,0,1)); ?></div>
        <div class="hidden sm:block">
          <p class="text-sm font-bold text-slate-900 dark:text-white"><?php echo e(auth()->user()->name); ?></p>
          <p class="text-xs text-sky-500">Administrator</p>
        </div>
      </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-8">
      <?php $__currentLoopData = [
        ['icon'=>'👨‍🎓','label'=>'Total Students','value'=>number_format($stats['total_students']),'color'=>'sky'],
        ['icon'=>'👨‍🏫','label'=>'Teachers','value'=>number_format($stats['total_teachers']),'color'=>'indigo'],
        ['icon'=>'📚','label'=>'Live Courses','value'=>number_format($stats['total_courses']),'color'=>'emerald'],
        ['icon'=>'💰','label'=>'Revenue','value'=>'₹'.number_format($stats['total_revenue']),'color'=>'amber'],
        ['icon'=>'📝','label'=>'Active Tests','value'=>number_format($stats['total_tests']),'color'=>'violet'],
        ['icon'=>'📋','label'=>'Enrollments','value'=>number_format($stats['active_enrollments']),'color'=>'rose'],
        ['icon'=>'🆕','label'=>'New Today','value'=>$stats['today_signups'],'color'=>'teal'],
        ['icon'=>'📊','label'=>'Attempts Today','value'=>$stats['attempts_today'],'color'=>'orange'],
      ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm p-5 hover:shadow-md transition-all">
        <div class="flex items-start justify-between">
          <div>
            <p class="text-xs text-slate-500 dark:text-slate-400 font-semibold"><?php echo e($stat['label']); ?></p>
            <p class="text-2xl font-black text-slate-900 dark:text-white mt-1"><?php echo e($stat['value']); ?></p>
          </div>
          <span class="text-2xl opacity-80"><?php echo e($stat['icon']); ?></span>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="grid lg:grid-cols-2 gap-6">
      <!-- Recent Students -->
      <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm p-5">
        <div class="flex items-center justify-between mb-4">
          <h2 class="font-bold text-slate-900 dark:text-white">Recent Signups</h2>
          <a href="<?php echo e(route('admin.students.index')); ?>" class="text-xs text-sky-500 hover:underline">View All →</a>
        </div>
        <div class="space-y-3">
          <?php $__empty_1 = true; $__currentLoopData = $recentStudents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center font-bold text-sm text-slate-700 dark:text-slate-200"><?php echo e(substr($student->name,0,1)); ?></div>
            <div class="flex-1 min-w-0">
              <p class="text-sm font-semibold text-slate-900 dark:text-white truncate"><?php echo e($student->name); ?></p>
              <p class="text-xs text-slate-500 truncate"><?php echo e($student->email); ?></p>
            </div>
            <span class="text-[10px] text-slate-400"><?php echo e($student->created_at->diffForHumans()); ?></span>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <p class="text-slate-400 text-sm text-center py-4">No students yet</p>
          <?php endif; ?>
        </div>
      </div>

      <!-- Recent Payments -->
      <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm p-5">
        <div class="flex items-center justify-between mb-4">
          <h2 class="font-bold text-slate-900 dark:text-white">Recent Payments</h2>
          <a href="<?php echo e(route('admin.payments.index')); ?>" class="text-xs text-sky-500 hover:underline">View All →</a>
        </div>
        <div class="space-y-3">
          <?php $__empty_1 = true; $__currentLoopData = $recentPayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <div class="flex items-center gap-3">
            <span class="text-xl">💳</span>
            <div class="flex-1 min-w-0">
              <p class="text-sm font-semibold text-slate-900 dark:text-white truncate"><?php echo e(optional($payment->user)->name ?? 'Customer'); ?></p>
              <p class="text-xs text-slate-500"><?php echo e($payment->created_at->format('d M, g:i A')); ?></p>
            </div>
            <span class="text-sm font-black text-emerald-500">₹<?php echo e(number_format($payment->amount/100)); ?></span>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <p class="text-slate-400 text-sm text-center py-4">No payments yet</p>
          <?php endif; ?>
        </div>
      </div>

      <!-- Quick Actions -->
      <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm p-5 lg:col-span-2">
        <h2 class="font-bold text-slate-900 dark:text-white mb-4">Quick Actions</h2>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
          <?php $__currentLoopData = [
            ['icon'=>'➕','label'=>'Add Course','route'=>'admin.courses.create'],
            ['icon'=>'📝','label'=>'New Test','route'=>'admin.tests.create'],
            ['icon'=>'📰','label'=>'New Blog','route'=>'admin.blog.create'],
            ['icon'=>'🔔','label'=>'Send Notification','route'=>'admin.notifications'],
          ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="<?php echo e(route($action['route'])); ?>" class="flex flex-col items-center gap-2 p-4 rounded-2xl border border-dashed border-slate-300 dark:border-slate-700 hover:border-sky-400 hover:bg-sky-50 dark:hover:bg-sky-900/20 text-sm font-semibold text-slate-700 dark:text-slate-300 transition-all text-center">
            <span class="text-2xl"><?php echo e($action['icon']); ?></span><?php echo e($action['label']); ?>

          </a>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\atula\.gemini\antigravity\scratch\lo-samajh-lo\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>