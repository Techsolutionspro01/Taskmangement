<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attachment;
use Illuminate\Support\Facades\Auth;

class AttachmentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|max:2048',
        ]);

        $task_id = $request->task_id;

        if ($request->file('file')) {
            $file       = $request->file('file');
            $file_name  = time() . '_' . uniqid('', true) . '.' . $file->getClientOriginalExtension();
            $org_name   = $file->getClientOriginalName();
            $request->file('file')->storeAs('public/tasks_file/', $file_name);

            $file_data = new Attachment();

            $file_data['task_id']       = $task_id;
            $file_data['file_name']     = $org_name;
            $file_data['path']          = $file_name;
            $file_data['created_by']    = Auth::id();

            $file_data->save();

            if($file_data){
                return response()->json(['success' => 'File uploaded'], 200);
            }
        }
    }
}
