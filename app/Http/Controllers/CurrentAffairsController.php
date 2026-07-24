<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurrentAffairsController extends Controller
{
    public function index()
    {
        try {
            $affairs = \App\Models\CurrentAffair::latest('published_at')->paginate(20);
        } catch (\Exception $e) {
            $affairs = collect();
        }
        return view('current-affairs.index', compact('affairs'));
    }

    public function show($id)
    {
        try {
            $affair = \App\Models\CurrentAffair::findOrFail($id);
        } catch (\Exception $e) {
            abort(404);
        }
        return view('current-affairs.show', compact('affair'));
    }
}
