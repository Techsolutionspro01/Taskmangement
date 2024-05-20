@extends('layout.app')
@section('title', 'Task Detail | TSP - Task Management System')
@section('pageTitle', 'Task Detail')

@section('content')

<div class="row">
    <!--  Modal content for the Large example -->
    <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Log History</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="col-lg-8">
        <div class="card card-body">
            <div>
                <h2 class="card-title "><u> Summary </u></h2>
                <h3 class="card-title">{{ $task->title }}</h3>
            </div>
            <div>
                <h2 class="card-title "><u> Description </u></h2>
                <p class="card-title">{{ $task->description }}</p>
            </div>
            <hr>
            <div class="col-md-12">
                <i class="fa fa-paperclip m-r-10 m-b-10"></i> Attachments
            </div>
            <div class="col-md-12 col-xs-12">
                <a data-toggle="modal" data-target="#ata_model" class="btn btn-primary btn-sm rounded-pill waves-effect waves-light">
                    <span class="btn-label task-span-margin-left-minus"><i class="fa fa-plus"></i></span> <span class="" style=" text-transform: capitalize;">New Attachments </span>
                </a>
            </div>
            <hr>
            <a href="">attachment 1</a>
            <a href="">attachment 2</a>
            <hr>
            <h5>Comments</h5>
            <form action="">
                <div class="mb-3">
                    <textarea class="form-control" name="description" placeholder="Write description here" id="description" style="height: 100px" required></textarea>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary w-md">Submit</button>
                </div>
            </form>
            <hr>
            <div>
                <h6>Usman DJ <span class="float-end">{{ $task->formatted_created_at }}</span></h6>
                <p>kindly provide all detail</p>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card card-body">
            <button type="button" class="btn btn-primary rounded-pill waves-effect waves-light mt-2" data-bs-toggle="modal" data-bs-target="#bs-example-modal-lg">Task Log</button>
            <p>
                <h4>Status <span class="badge badge-soft-success float-end">{{ config('constants.STATUS_LIST')[$task->status] }}</span></h4>
                <h4>Priority <span class="badge badge-soft-success float-end">{{ config('constants.PRIORITY_LIST')[$task->priority] }}</span></h4>
                <h4>Project <span class="float-end">{{ $task->project->name }}</span></h4>
                <h4>Created At <span class="float-end">{{ $task->formatted_created_at }}</span></h4>
                <h4>Created By <span class="float-end">{{ $task->creator->name }}</span></h4>
                <h4>Start Task <span class="float-end">{{ $task->formatted_start_date }}</span></h4>
                <h4>End Task <span class="float-end">{{ $task->end_date ? $task->formatted_end_date : '' }}</span></h4>
                <h4>Assign To </h4> 
                <span class="float-end">@foreach ($task->users as $user)
                    <span>{{ $user->name }}</span>@if(!$loop->last), @endif
                @endforeach</span>
            </p>
        </div>
    </div>
</div>

@endsection

@section('script')
   
@endsection