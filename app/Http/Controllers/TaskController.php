<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('permission:view-tasks|create-tasks|update-tasks|delete-tasks', ['only' => ['index','store']]);
        // $this->middleware('permission:create-tasks', ['only' => ['create','store']]);
        // $this->middleware('permission:update-tasks', ['only' => ['edit','update']]);
        // $this->middleware('permission:delete-tasks', ['only' => ['destroy']]);
    }

    public function index()
    {
        
    }

    public function create()
    {
        $data['users'] = User::where('is_enable', 1)->get();
        $data['status'] = config('constants.STATUS_LIST');
        $data['priority'] = config('constants.PRIORITY_LIST');

        return view('tasks.create', $data);
    }
}
