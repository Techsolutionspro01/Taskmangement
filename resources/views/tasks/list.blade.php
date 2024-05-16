@extends('layout.app')
@section('title', 'Task List | TSP - Task Management System')
@section('pageTitle', 'Task List')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="users-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Project</th>
                            <th>Priority</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->description }}</td>
                                <td>{{ $task->project->name }}</td>
                                <td>{{ config('constants.PRIORITY_LIST')[$task->priority] }}</td>
                                <td>{{ config('constants.STATUS_LIST')[$task->status] }}</td>
                                {{-- <td>
                                    <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}">Show</a>
                                    @can('update-roles')
                                        <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
                                    @endcan
                                    @can('delete-roles')
                                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

@endsection

@section('script')
    <script>
        $('#users-datatable').DataTable();
    </script>
@endsection