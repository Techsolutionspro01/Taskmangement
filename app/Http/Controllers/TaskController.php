<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use App\Models\Attachment;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('permission:view-tasks|create-tasks|update-tasks|delete-tasks', ['only' => ['index','store']]);
        $this->middleware('permission:create-tasks', ['only' => ['create','store']]);
        $this->middleware('permission:update-tasks', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-tasks', ['only' => ['destroy']]);
    }

    public function index()
    {
        $data['tasks'] = Task::where('is_enable', 1)->with('project', 'users', 'creator')->orderBy('id', 'desc')->get();
        // return $data['tasks'];
        return view('tasks.list', $data);
    }

    public function show($id)
    {
        $task_id        = base64_decode($id);
        $data['task']   = Task::with('project', 'users', 'attachments')->find($task_id);
        $data['status'] = config('constants.STATUS_LIST');

        return view('tasks.show', $data);
    }

    public function create()
    {
        $data['users']      = User::where('is_enable', 1)->get();
        $data['projects']   = Project::where('is_enable', 1)->get();
        $data['status']     = config('constants.STATUS_LIST');
        $data['priority']   = config('constants.PRIORITY_LIST');

        return view('tasks.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'project_id'    => 'required|numeric',
            'priority'      => 'required|numeric',
            'status'        => 'required|numeric',
            // 'assign_to'     => 'required|numeric',
            'attachment'   => 'max:2048',
            'title'         => 'required',
            'description'   => 'required',
        ]);

        $task = new Task();

        $task['project_id']     = $request->project_id;
        $task['priority']       = $request->priority;
        $task['status']         = $request->status;
        $task['title']          = $request->title;
        $task['description']    = $request->description;
        $task['created_by']     = Auth::id();
        $task['start_date']     = $request->start_date ?? NULL;
        $task['end_date']       = $request->end_date ?? NULL;

        $response = $task->save();

        $users = $request->assign_to;
        $task->users()->attach($users);

        if($request->hasFile('attachment')){
            $file       = $request->file('attachment');
            $file_name  = time() . '_' . uniqid('', true) . '.' . $file->getClientOriginalExtension();
            $org_name   = $file->getClientOriginalName();
            
            $request->file('attachment')->storeAs('public/tasks_file/', $file_name);

            $file_data = new Attachment();

            $file_data['task_id']       = $task->id;
            $file_data['file_name']     = $org_name;
            $file_data['path']          = $file_name;
            $file_data['created_by']    = Auth::id();

            $file_data->save();
        }

        return redirect()->route('tasks.list')->with('success','Task assigned successfully');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'task_id' => 'required',
            'status' => 'required',
        ]);
        
        // Find the task and store the old status
        $task = Task::find($request->task_id);
        $old_status = $task->status;

        // Prepare the task data for update
        $task_data['status'] = $request->status;
        $task_data['updated_by'] = Auth::id();
        $task_response = $task->update($task_data);
        

        // Create a log entry
        $log_data = new Log();
        $log_data['user_id']    = Auth::id();
        $log_data['task_id']    = $request->task_id;
        $log_data['old_status'] = $old_status;
        $log_data['status']     = $request->status;

        $log_data->save();
    
        return redirect()->route('tasks.show', ['id' => base64_encode($request->task_id)])->with('success', 'Task updated successfully');
    }
}
