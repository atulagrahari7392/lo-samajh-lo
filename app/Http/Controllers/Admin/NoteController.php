<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index() { $notes = Note::latest()->paginate(15); return view('admin.notes.index', compact('notes')); }
    public function create() { return view('admin.notes.create'); }
    public function store(Request $request) { return redirect()->route('admin.notes.index')->with('success','Note added!'); }
    public function show(Note $note) { return view('admin.notes.show', compact('note')); }
    public function edit(Note $note) { return view('admin.notes.edit', compact('note')); }
    public function update(Request $request, Note $note) { $note->update($request->except('_token','_method')); return redirect()->route('admin.notes.index')->with('success','Note updated!'); }
    public function destroy(Note $note) { $note->delete(); return redirect()->route('admin.notes.index')->with('success','Note deleted.'); }
}
