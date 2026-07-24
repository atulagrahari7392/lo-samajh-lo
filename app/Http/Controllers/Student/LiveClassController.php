<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\LiveClass;
use Illuminate\Http\Request;

class LiveClassController extends Controller
{
    public function index()
    {
        $classes = LiveClass::where('status', '!=', 'cancelled')->orderBy('scheduled_at')->paginate(10);
        return view('student.live-classes.index', compact('classes'));
    }

    public function join($classId)
    {
        $class = LiveClass::findOrFail($classId);
        return redirect($class->meeting_link ?? route('student.live-classes.index'))->with('info', 'Joining live class...');
    }
}
