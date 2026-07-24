<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LiveClass;
use App\Models\Notification;
use App\Models\Course;

class LiveClassController extends Controller
{
    public function index() { return response()->json(['data' => LiveClass::where('status', '!=', 'cancelled')->orderBy('scheduled_at')->take(20)->get()]); }
    public function show($id) { return response()->json(['data' => LiveClass::findOrFail($id)]); }
}

// Notification API controller
