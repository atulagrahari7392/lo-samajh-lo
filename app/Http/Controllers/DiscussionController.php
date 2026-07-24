<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discussion;
use App\Models\DiscussionReply;
use Illuminate\Support\Facades\Auth;

class DiscussionController extends Controller
{
    public function index()
    {
        $discussions = Discussion::with('user')->latest()->paginate(15);
        return view('discussions.index', compact('discussions'));
    }

    public function show($id)
    {
        $discussion = Discussion::with(['user', 'replies.user', 'replies.children'])->findOrFail($id);
        $discussion->increment('views');

        return view('discussions.show', compact('discussion'));
    }

    public function create()
    {
        return view('discussions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $discussion = Discussion::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('discussions.show', $discussion->id)->with('success', 'Discussion created successfully.');
    }

    public function reply(Request $request, Discussion $discussion)
    {
        $request->validate([
            'content' => 'required|string',
            'parent_id' => 'nullable|exists:discussion_replies,id',
        ]);

        DiscussionReply::create([
            'discussion_id' => $discussion->id,
            'user_id' => Auth::id(),
            'content' => $request->content,
            'parent_id' => $request->parent_id,
        ]);

        return back()->with('success', 'Reply posted successfully.');
    }

    public function markAnswer(DiscussionReply $reply)
    {
        $discussion = $reply->discussion;
        
        if ($discussion->user_id !== Auth::id()) {
            abort(403);
        }

        $discussion->replies()->update(['is_answer' => false]);
        $reply->update(['is_answer' => true]);
        $discussion->update(['is_resolved' => true]);

        return back()->with('success', 'Answer marked successfully.');
    }

    public function upvote(Request $request, $id, $type = 'discussion')
    {
        if ($type === 'discussion') {
            Discussion::where('id', $id)->increment('upvotes');
        } else {
            DiscussionReply::where('id', $id)->increment('upvotes');
        }

        return back()->with('success', 'Upvoted successfully.');
    }
}
