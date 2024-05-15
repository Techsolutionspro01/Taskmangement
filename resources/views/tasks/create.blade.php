@extends('layout.app')
@section('title', 'Assign Task | TSP - Task Management System')
@section('pageTitle', 'Assign Task')

@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="header-title">Floating labels</h5>
                    <p class="sub-header">Create beautifully simple form labels that float over your input fields.</p>

                    <form>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingnameInput" placeholder="Enter Project Name" value="Tech Solutions Pro Task Management">
                                    <label for="floatingnameInput">Project Name</label>
                                </div>
                            </div>    
                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingnameInput" placeholder="Enter Ticket Number" value="#373">
                                    <label for="floatingnameInput">Ticket Number</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <select class="form-select" name="status" id="status" aria-label="Floating label select example">
                                        @foreach ($status as $key => $val)
                                            <option value="{{ $key }}">{{ $val }}</option>
                                        @endforeach
                                    </select>
                                    <label for="status">Status</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <select class="form-select" name="assign_to" id="assign_to" aria-label="Floating label select example">
                                        <option selected="">Please select one from blow</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="assign_to">Assign To</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                                        <option selected="">Select Task Priority</option>
                                        @foreach ($priority as $key => $val)
                                            <option value="{{ $key }}">{{ $val }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelectGrid">Priority</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="title" placeholder="Enter Task Title">
                                    <label for="title">Task Title</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-floating mb-2">
                            <textarea class="form-control" placeholder="Write description here" id="description" style="height: 100px" data-gramm="false" wt-ignore-input="true"></textarea>
                            <label for="description">Task Description</label>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary w-md">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>

@endsection