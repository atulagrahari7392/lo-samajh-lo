<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index() { $notes = Note::where('teacher_id',auth()->id())->latest()->paginate(10); return view('teacher.notes.index', compact('notes')); }
    public function create() { return view('teacher.notes.create'); }
    public function store(Request $r) { return redirect()->route('teacher.notes.index')->with('success','Note uploaded!'); }
    public function show(Note $note) { return view('teacher.notes.show', compact('note')); }
    public function edit(Note $note) { return view('teacher.notes.edit', compact('note')); }
    public function update(Request $r, Note $note) { $note->update($r->except('_token','_method')); return redirect()->route('teacher.notes.index')->with('success','Note updated!'); }
    public function destroy(Note $note) { $note->delete(); return redirect()->route('teacher.notes.index')->with('success','Note deleted.'); }
}
