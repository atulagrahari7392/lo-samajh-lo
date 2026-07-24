<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\Download;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::where('is_published', true)->latest()->paginate(12);
        return view('student.notes.index', compact('notes'));
    }

    public function download($noteId)
    {
        $note = Note::findOrFail($noteId);
        Download::create(['user_id' => auth()->id(), 'note_id' => $note->id]);
        $note->increment('downloads_count');
        return redirect($note->file_url)->with('success', 'Download started!');
    }
}
