<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LiveClass;
use Illuminate\Support\Facades\Auth;

class LiveClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * For Students: View and participate in a live class
     */
    public function watch($id)
    {
        $liveClass = LiveClass::with('teacher')->findOrFail($id);
        
        // Ensure student has access (e.g. enrolled in course)
        // Check Enrollment Logic Here
        
        return view('student.live-classes.watch', compact('liveClass'));
    }

    /**
     * For Teachers: Host a live class
     */
    public function host($id)
    {
        $liveClass = LiveClass::findOrFail($id);
        
        // Ensure the logged in user is the teacher of this class
        if (Auth::id() !== $liveClass->teacher_id) {
            abort(403, 'Unauthorized action.');
        }

        // Update class status to live
        if ($liveClass->status !== 'live') {
            $liveClass->update([
                'status' => 'live',
                'started_at' => now()
            ]);
            
            // Trigger Notification to enrolled students
            // event(new LiveClassStarted($liveClass));
        }

        return view('teacher.live-classes.host', compact('liveClass'));
    }

    /**
     * For Teachers: End a live class
     */
    public function endClass(Request $request, $id)
    {
        $liveClass = LiveClass::findOrFail($id);
        
        if (Auth::id() !== $liveClass->teacher_id) {
            abort(403, 'Unauthorized action.');
        }

        $liveClass->update([
            'status' => 'completed',
            'ended_at' => now()
        ]);

        return redirect()->route('teacher.dashboard')->with('success', 'Live class ended successfully. Recording is being processed.');
    }
}
