<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        return view('admin.notifications.index');
    }

    public function send(Request $request)
    {
        $request->validate(['title' => 'required', 'message' => 'required', 'target' => 'required|in:all,student,teacher']);
        $query = User::query();
        if ($request->target !== 'all') $query->where('role', $request->target);
        $users = $query->get();
        foreach ($users as $user) {
            \App\Models\Notification::create([
                'user_id' => $user->id,
                'type'    => 'announcement',
                'title'   => $request->title,
                'message' => $request->message,
            ]);
        }
        return back()->with('success', 'Notification sent to ' . $users->count() . ' users!');
    }
}
