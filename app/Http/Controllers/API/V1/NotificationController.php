<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index(Request $r) { return response()->json(['data' => Notification::where('user_id', $r->user()->id)->latest()->take(20)->get()]); }
    public function markAllAsRead(Request $r) { Notification::where('user_id', $r->user()->id)->whereNull('read_at')->update(['read_at' => now()]); return response()->json(['message' => 'All notifications marked as read']); }
}
