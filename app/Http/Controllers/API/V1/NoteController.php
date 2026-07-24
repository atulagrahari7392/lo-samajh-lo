<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    public function index() { return response()->json(['data' => Note::where('is_published', true)->latest()->take(20)->get()]); }
    public function show($id) { return response()->json(['data' => Note::findOrFail($id)]); }
}
