<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // return $request;

        $this->validate($request, [
            'comment' => 'required',
        ]);

        $comment = new Comment();

        $comment['user_id'] = Auth::id();
        $comment['task_id'] = $request->task_id;
        $comment['comment'] = $request->comment;
        $comment['is_private'] = 2;

        $comment->save();

        return redirect()->route('tasks.show', ['id' => base64_encode($request->task_id)])->with('success', 'Comment added successfully');
    }
}
