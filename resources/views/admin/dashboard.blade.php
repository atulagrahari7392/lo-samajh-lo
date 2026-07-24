@extends('layouts.app')
@section('title', 'Admin Dashboard — Lo Samajh Lo')
@section('content')
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

    @php
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
    @endphp

    @foreach($adminNav as $nav)
    <a href="{{ route($nav['route']) }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs($nav['route']) ? 'btn-grad text-white shadow-sm' : 'text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800' }} transition-all">
      <span>{{ $nav['icon'] }}</span>{{ $nav['label'] }}
    </a>
    @endforeach

    <div class="pt-4 border-t border-slate-200 dark:border-slate-800 mt-4">
      <a href="{{ route('home') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm text-slate-500 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800">
        🌐 View Site
      </a>
      <form method="POST" action="{{ route('logout') }}">@csrf
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
        <p class="text-slate-500 dark:text-slate-400 text-sm">Platform overview · {{ now()->format('d M Y') }}</p>
      </div>
      <div class="flex items-center gap-3">
        <div class="w-9 h-9 rounded-full btn-grad flex items-center justify-center text-white font-bold text-sm">{{ substr(auth()->user()->name,0,1) }}</div>
        <div class="hidden sm:block">
          <p class="text-sm font-bold text-slate-900 dark:text-white">{{ auth()->user()->name }}</p>
          <p class="text-xs text-sky-500">Administrator</p>
        </div>
      </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-8">
      @foreach([
        ['icon'=>'👨‍🎓','label'=>'Total Students','value'=>number_format($stats['total_students']),'color'=>'sky'],
        ['icon'=>'👨‍🏫','label'=>'Teachers','value'=>number_format($stats['total_teachers']),'color'=>'indigo'],
        ['icon'=>'📚','label'=>'Live Courses','value'=>number_format($stats['total_courses']),'color'=>'emerald'],
        ['icon'=>'💰','label'=>'Revenue','value'=>'₹'.number_format($stats['total_revenue']),'color'=>'amber'],
        ['icon'=>'📝','label'=>'Active Tests','value'=>number_format($stats['total_tests']),'color'=>'violet'],
        ['icon'=>'📋','label'=>'Enrollments','value'=>number_format($stats['active_enrollments']),'color'=>'rose'],
        ['icon'=>'🆕','label'=>'New Today','value'=>$stats['today_signups'],'color'=>'teal'],
        ['icon'=>'📊','label'=>'Attempts Today','value'=>$stats['attempts_today'],'color'=>'orange'],
      ] as $stat)
      <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm p-5 hover:shadow-md transition-all">
        <div class="flex items-start justify-between">
          <div>
            <p class="text-xs text-slate-500 dark:text-slate-400 font-semibold">{{ $stat['label'] }}</p>
            <p class="text-2xl font-black text-slate-900 dark:text-white mt-1">{{ $stat['value'] }}</p>
          </div>
          <span class="text-2xl opacity-80">{{ $stat['icon'] }}</span>
        </div>
      </div>
      @endforeach
    </div>

    <div class="grid lg:grid-cols-2 gap-6">
      <!-- Recent Students -->
      <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm p-5">
        <div class="flex items-center justify-between mb-4">
          <h2 class="font-bold text-slate-900 dark:text-white">Recent Signups</h2>
          <a href="{{ route('admin.students.index') }}" class="text-xs text-sky-500 hover:underline">View All →</a>
        </div>
        <div class="space-y-3">
          @forelse($recentStudents as $student)
          <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center font-bold text-sm text-slate-700 dark:text-slate-200">{{ substr($student->name,0,1) }}</div>
            <div class="flex-1 min-w-0">
              <p class="text-sm font-semibold text-slate-900 dark:text-white truncate">{{ $student->name }}</p>
              <p class="text-xs text-slate-500 truncate">{{ $student->email }}</p>
            </div>
            <span class="text-[10px] text-slate-400">{{ $student->created_at->diffForHumans() }}</span>
          </div>
          @empty
          <p class="text-slate-400 text-sm text-center py-4">No students yet</p>
          @endforelse
        </div>
      </div>

      <!-- Recent Payments -->
      <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm p-5">
        <div class="flex items-center justify-between mb-4">
          <h2 class="font-bold text-slate-900 dark:text-white">Recent Payments</h2>
          <a href="{{ route('admin.payments.index') }}" class="text-xs text-sky-500 hover:underline">View All →</a>
        </div>
        <div class="space-y-3">
          @forelse($recentPayments as $payment)
          <div class="flex items-center gap-3">
            <span class="text-xl">💳</span>
            <div class="flex-1 min-w-0">
              <p class="text-sm font-semibold text-slate-900 dark:text-white truncate">{{ optional($payment->user)->name ?? 'Customer' }}</p>
              <p class="text-xs text-slate-500">{{ $payment->created_at->format('d M, g:i A') }}</p>
            </div>
            <span class="text-sm font-black text-emerald-500">₹{{ number_format($payment->amount/100) }}</span>
          </div>
          @empty
          <p class="text-slate-400 text-sm text-center py-4">No payments yet</p>
          @endforelse
        </div>
      </div>

      <!-- Quick Actions -->
      <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm p-5 lg:col-span-2">
        <h2 class="font-bold text-slate-900 dark:text-white mb-4">Quick Actions</h2>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
          @foreach([
            ['icon'=>'➕','label'=>'Add Course','route'=>'admin.courses.create'],
            ['icon'=>'📝','label'=>'New Test','route'=>'admin.tests.create'],
            ['icon'=>'📰','label'=>'New Blog','route'=>'admin.blog.create'],
            ['icon'=>'🔔','label'=>'Send Notification','route'=>'admin.notifications'],
          ] as $action)
          <a href="{{ route($action['route']) }}" class="flex flex-col items-center gap-2 p-4 rounded-2xl border border-dashed border-slate-300 dark:border-slate-700 hover:border-sky-400 hover:bg-sky-50 dark:hover:bg-sky-900/20 text-sm font-semibold text-slate-700 dark:text-slate-300 transition-all text-center">
            <span class="text-2xl">{{ $action['icon'] }}</span>{{ $action['label'] }}
          </a>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
