<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // Validate request
        $this->validate($request, [
            'content' => 'required',
            'post_id' => 'required|exists:posts,id'
        ]);

        // Create a new comment
        $comment = new Comment;
        $comment->content = $request->content;
        $comment->post_id = $request->post_id;
        $comment->user_id = auth()->user()->id; // Assuming there's a logged-in user
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully!');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }
}
