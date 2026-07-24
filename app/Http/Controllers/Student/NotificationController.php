<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::where('user_id', auth()->id())->latest()->paginate(20);
        return view('student.notifications.index', compact('notifications'));
    }

    public function markRead($id)
    {
        Notification::where('id', $id)->where('user_id', auth()->id())->update(['read_at' => now()]);
        return response()->json(['success' => true]);
    }
}
