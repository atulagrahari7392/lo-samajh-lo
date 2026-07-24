<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        $query = Note::where('is_published', true);
        if ($request->type) $query->where('type', $request->type);
        if ($request->search) $query->where('title', 'like', "%{$request->search}%");
        $notes = $query->latest()->paginate(12);
        return view('notes.index', compact('notes'));
    }

    public function show($id)
    {
        $note = Note::where('id', $id)->where('is_published', true)->firstOrFail();
        return view('notes.show', compact('note'));
    }
}
