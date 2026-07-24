$BaseDir = "C:\Users\atula\.gemini\antigravity\scratch\lo-samajh-lo"

$Controllers = @(
    "Admin/StudentController",
    "Admin/TeacherController",
    "Admin/CourseController",
    "Admin/TestController",
    "Admin/QuestionController",
    "Admin/NoteController",
    "Admin/LiveClassController",
    "Admin/PaymentController",
    "Admin/CouponController",
    "Admin/CurrentAffairsController",
    "Admin/BlogController",
    "Admin/SettingsController",
    "Admin/NotificationController",
    "Teacher/DashboardController",
    "Teacher/CourseController",
    "Teacher/LessonController",
    "Teacher/TestController",
    "Teacher/QuestionController",
    "Teacher/LiveClassController",
    "Teacher/NoteController",
    "Teacher/StudentController",
    "Teacher/ReportController"
)

foreach ($c in $Controllers) {
    $parts = $c -split "/"
    $ns = "App\Http\Controllers\" + $parts[0]
    $className = $parts[1]
    $viewFolder = $parts[0].ToLower() + "." + $className.Replace("Controller","").ToLower()

    $content = @"
<?php

namespace $ns;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class $className extends Controller
{
    public function index()
    {
        return view('$viewFolder.index');
    }

    public function create()
    {
        return view('$viewFolder.create');
    }

    public function store(Request `$request)
    {
        // Validation and logic here
        return redirect()->route('$viewFolder.index')->with('success', 'Created successfully!');
    }

    public function show(`$id)
    {
        return view('$viewFolder.show', compact('id'));
    }

    public function edit(`$id)
    {
        return view('$viewFolder.edit', compact('id'));
    }

    public function update(Request `$request, `$id)
    {
        // Logic here
        return redirect()->route('$viewFolder.index')->with('success', 'Updated successfully!');
    }

    public function destroy(`$id)
    {
        return redirect()->route('$viewFolder.index')->with('success', 'Deleted successfully!');
    }
}
"@
    $dir = "$BaseDir\app\Http\Controllers\" + $parts[0]
    if (!(Test-Path -Path $dir)) { New-Item -ItemType Directory -Force -Path $dir | Out-Null }
    $file = "$dir\$className.php"
    Set-Content -Path $file -Value $content
}

$Views = @(
    "admin/students/index.blade.php",
    "admin/students/show.blade.php",
    "admin/teachers/index.blade.php",
    "admin/teachers/create.blade.php",
    "admin/teachers/show.blade.php",
    "admin/courses/index.blade.php",
    "admin/courses/create.blade.php",
    "admin/courses/edit.blade.php",
    "admin/tests/index.blade.php",
    "admin/tests/create.blade.php",
    "admin/questions/index.blade.php",
    "admin/questions/create.blade.php",
    "admin/questions/import.blade.php",
    "admin/notes/index.blade.php",
    "admin/notes/create.blade.php",
    "admin/live-classes/index.blade.php",
    "admin/live-classes/create.blade.php",
    "admin/payments/index.blade.php",
    "admin/payments/show.blade.php",
    "admin/coupons/index.blade.php",
    "admin/coupons/create.blade.php",
    "admin/current-affairs/index.blade.php",
    "admin/current-affairs/create.blade.php",
    "admin/blog/index.blade.php",
    "admin/blog/create.blade.php",
    "admin/notifications/index.blade.php",
    "admin/settings/index.blade.php",
    "teacher/courses/index.blade.php",
    "teacher/courses/create.blade.php",
    "teacher/lessons/create.blade.php",
    "teacher/tests/index.blade.php",
    "teacher/tests/create.blade.php",
    "teacher/questions/index.blade.php",
    "teacher/questions/create.blade.php",
    "teacher/live-classes/index.blade.php",
    "teacher/live-classes/create.blade.php",
    "teacher/notes/index.blade.php",
    "teacher/notes/upload.blade.php",
    "teacher/students/index.blade.php",
    "teacher/reports/index.blade.php",
    "teacher/profile/index.blade.php"
)

foreach ($v in $Views) {
    $dir = "$BaseDir\resources\views\" + ($v | Split-Path -Parent)
    if (!(Test-Path -Path $dir)) { New-Item -ItemType Directory -Force -Path $dir | Out-Null }
    $file = "$BaseDir\resources\views\$v"
    
    if ($v -match "^admin") {
        $layout = "layouts.admin"
    } else {
        $layout = "layouts.teacher"
    }
    
    $title = ($v | Split-Path -Leaf).Replace(".blade.php", "").ToUpper()
    
    $content = @"
@extends('$layout')

@section('content')
<div class="glassmorphism p-6 rounded-2xl shadow-sm border border-gray-100">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">$title</h2>
    </div>
    <div class="text-gray-500">
        <p>This is the auto-generated boilerplate for $v.</p>
        <p class="mt-4">Please implement the full UI specification according to the design system (White/Sky-blue/Navy).</p>
    </div>
</div>
@endsection
"@
    Set-Content -Path $file -Value $content
}

Write-Host "Scaffolding Complete."
