<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use App\Models\Task;

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


        // Notification
        $task = Task::with('users')->find($request->task_id);
        
        $notification = new Notification();

        $notification['task_id']    = $request->task_id;
        $notification['title']      = 'New Comment';
        $notification['message']    = 'A new comment is added by '. Auth::user()->name;
        $notification['created_by'] = Auth::id();

        if (Auth::id() == $task->created_by) {
            // If the commenter is the creator, notify the assigned user
            $notification['user_id'] = $task->users[0]->id;
        } else {
            // If the commenter is the assigned user, notify the creator
            $notification['user_id'] = $task->created_by;
        }

        $notification->save();

        return redirect()->route('tasks.show', ['id' => base64_encode($request->task_id)])->with('success', 'Comment added successfully');
    }
}
