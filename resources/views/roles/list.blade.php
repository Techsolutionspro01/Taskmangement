@extends('layout.app')
@section('title', 'User Roles List')
@section('pageTitle', 'User Roles List')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="roles-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>
                                    {{-- <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}">Show</a> --}}
                                    @can('update-roles')
                                        <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                                    @endcan
                                    {{-- @can('delete-roles')
                                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endcan --}}
                                </td>
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
        $('#roles-datatable').DataTable();
    </script>
@endsection