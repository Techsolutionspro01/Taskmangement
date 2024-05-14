<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('permission:view-users|create-users|update-users|delete-users', ['only' => ['index','store']]);
        $this->middleware('permission:create-users', ['only' => ['create','store']]);
        $this->middleware('permission:update-users', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-users', ['only' => ['destroy']]);
    }

    public function index()
    {
        $data['users'] = User::get();
        return view('users.list', $data);
    }

    public function create()
    {
        $data['roles'] = Role::get();
        return view('users.create', $data);
    }

    public function store(Request $request)
    {
        // check for spatie role id instead of name
        $this->validate($request, [
            'name' => 'required',
            'roles' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);
    
        $user = new User();
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->password     = Hash::make($request->password);
        // $user->profile_pic  = $request->profile_pic;
        $user->joining_date = $request->joining_date;
        $user->expiry_date  = $request->expiry_date;
        $user->start_time   = $request->start_time;
        $user->end_time     = $request->end_time;
        $user->phone        = $request->phone;
        $user->whatsapp     = $request->whatsapp;
        $user->created_by   = Auth::id();

        $response = $user->save();
        $user->assignRole($request->roles);
    
        return redirect()->route('users.list')->with('success','User created successfully');
    }

    public function edit($id)
    {
        $data['user'] = User::find($id);
        $data['user_role'] = $data['user']->roles->pluck('name','name')->all();
        $data['roles'] = Role::get();
        return view('users.edit', $data);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$request->id,
            'roles' => 'required'
        ]);
    
        $post_data['name']         = $request->name;
        $post_data['email']        = $request->email;
        // $user->profile_pic  = $request->profile_pic;
        $post_data['joining_date'] = $request->joining_date;
        $post_data['expiry_date']  = $request->expiry_date;
        $post_data['start_time']   = $request->start_time;
        $post_data['end_time']     = $request->end_time;
        $post_data['phone']        = $request->phone;
        $post_data['whatsapp']     = $request->whatsapp;
        $post_data['updated_by']   = Auth::id();


        if(!empty($request->password)){ 
            $post_data['password'] = Hash::make($request->password);
        }
    
        $user = User::find($request->id);
        $response = $user->update($post_data);
        // return $response;
        DB::table('model_has_roles')->where('model_id',$request->id)->delete();
    
        $user->assignRole($request->roles);
    
        return redirect()->route('users.list')->with('success','User updated successfully');
    }
}
