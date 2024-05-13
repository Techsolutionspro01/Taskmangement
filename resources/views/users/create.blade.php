@extends('layout.app')
@section('title', 'Create User')
@section('pageTitle', 'Add New User')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">User Details required </h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <form action="{{ route('users.store') }}" method="post" id="user_form" class="form-horizontal needs-validation" role="form" novalidate>
                                    @csrf
                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="name">Full Name</label>
                                        <div class="col-md-10">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Type here full name..." required>
                                            <div class="invalid-feedback text-danger">
                                                Name is required.
                                            </div>
                                            @if ($errors->has('name'))
                                                <span class="help-block text-danger">
                                                    {{ $errors->first('name') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="roles">Role</label>
                                        <div class="col-md-10">
                                            <select name="roles" id="roles" class="form-select">
                                                <option selected="">Select Role</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->name }}">{{ $role->name }}</option>  
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback text-danger">
                                                Role is required.
                                            </div>
                                            @if ($errors->has('roles'))
                                                <span class="help-block text-danger">
                                                    {{ $errors->first('roles') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="email">Email</label>
                                        <div class="col-md-10">
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                                            <div class="invalid-feedback text-danger">
                                                Email is required.
                                            </div>
                                            @if ($errors->has('email'))
                                                <span class="help-block text-danger">
                                                    {{ $errors->first('email') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="password">Password</label>
                                        <div class="col-md-10">
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                            <div class="invalid-feedback text-danger">
                                                password is required.
                                            </div>
                                            @if ($errors->has('password'))
                                                <span class="help-block text-danger">
                                                    {{ $errors->first('password') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="profile_pic">Profile Picture</label>
                                        <div class="col-md-10">
                                            <input type="file" name="profile_pic" id="profile_pic" class="form-control" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="joining_date">Joining Date</label>
                                        <div class="col-md-10">
                                            <input type="date" name="joining_date" id="joining_date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="expiry_date">Contract Expired</label>
                                        <div class="col-md-10">
                                            <input type="date" name="expiry_date" id="expiry_date" class="form-control" >
                                        </div>
                                    </div>

                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="start_time">Working Time Start</label>
                                        <div class="col-md-10">
                                            <input type="time" name="start_time" id="start_time" class="form-control">
                                        </div>
                                    </div>

                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="end_time">Working Time End</label>
                                        <div class="col-md-10">
                                            <input type="time" name="end_time" id="end_time" class="form-control">
                                        </div>
                                    </div>

                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="phone">Phone Number</label>
                                        <div class="col-md-10">
                                            <input type="number" name="phone" id="phone" class="form-control">
                                        </div>
                                    </div>

                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="whatsapp">WhatsApp</label>
                                        <div class="col-md-10">
                                            <input type="number" name="whatsapp" id="whatsapp" class="form-control" type="number" name="whatsapp" id="whatsapp">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- end row -->
                </div>
            </div> <!-- end card -->
        </div><!-- end col -->
    </div>

@endsection