<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $post = Post::findOrFail($postId);
        $comment = new Comment([
            'content' => $request->content,
            'post_id' => $post->id,
            'user_id' => auth()->id(),
        ]);

        $post->comments()->save($comment);

        return back();
    }

    public function reply(Request $request, $postId, $commentId)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $post = Post::findOrFail($postId);
        $parentComment = Comment::findOrFail($commentId);
        $comment = new Comment([
            'content' => $request->content,
            'post_id' => $post->id,
            'parent_id' => $parentComment->id,
            'user_id' => auth()->id(),
        ]);

        $post->comments()->save($comment);

        return back();
    }
}
