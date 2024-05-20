<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;
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
        $task_id = base64_decode($id);
        $data['task'] = Task::with('project', 'users')->find($task_id);
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
        $task_id = $task->id;

        $users = $request->assign_to;
        $task->users()->attach($users);

        return redirect()->route('tasks.list')->with('success','Task assigned successfully');
    }
}
