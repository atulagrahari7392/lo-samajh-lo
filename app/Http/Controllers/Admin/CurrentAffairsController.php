<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CurrentAffair;
use Illuminate\Http\Request;

class CurrentAffairsController extends Controller
{
    public function index() { $affairs = CurrentAffair::latest()->paginate(15); return view('admin.current-affairs.index', compact('affairs')); }
    public function create() { return view('admin.current-affairs.create'); }
    public function store(Request $request) { return redirect()->route('admin.current-affairs.index')->with('success','Article added!'); }
    public function show(CurrentAffair $currentAffair) { return view('admin.current-affairs.show', compact('currentAffair')); }
    public function edit(CurrentAffair $currentAffair) { return view('admin.current-affairs.edit', compact('currentAffair')); }
    public function update(Request $request, CurrentAffair $currentAffair) { $currentAffair->update($request->except('_token','_method')); return redirect()->route('admin.current-affairs.index')->with('success','Article updated!'); }
    public function destroy(CurrentAffair $currentAffair) { $currentAffair->delete(); return redirect()->route('admin.current-affairs.index')->with('success','Article deleted.'); }
}
