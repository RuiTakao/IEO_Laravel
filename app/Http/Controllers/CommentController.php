<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, Idea $idea)
    {
        $comment = new Comment();
        $comment->idea_id = $idea->id;
        $comment->body = $request->body;
        $comment->save();

        return redirect()
            ->route('ideas.show', $idea);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()
            ->route('ideas.show', $comment->idea);
    }
}
