@extends('admin.master')
@section('body')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('admin.home')}}">Talent Hiring Portal</a>
        <span class="breadcrumb-item active">Dashboard</span>
    </nav>

    <div class="sl-pagebody">
        <div class="container">

            <div class="col-md-8">
                <dl class="row">
                    <dt class="col-sm-3">Name</dt>
                    <dd class="col-sm-9">{{$user->name}}</dd>
                  
                    <dt class="col-sm-3">Email</dt>
                    <dd class="col-sm-9">{{$user->email}}</dd>
                  
                    <dt class="col-sm-3">Phone</dt>
                    <dd class="col-sm-9">{{$user->phone}}</dd>
                  
                    <dt class="col-sm-3">CV Link</dt>
                    <dd class="col-sm-9">{{$user->cv_link}}</dd>
                    <br><br>
                    @if ($user->status == null) 
                    <dt class="col-sm-3"></dt>
                    <dd class="row col-sm-9">
                    <form action="{{route('admin.user-status')}}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="1">
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <input class="btn btn-sm btn-success" onclick="return confirm('Are you sure to approve?')" type="submit" value="Approve">
                    </form>
                    <form action="{{route('admin.user-status')}}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="2">
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <input class="ml-2 btn btn-sm btn-danger" onclick="return confirm('Are you sure to reject?')" type="submit" value="Reject">
                    </form>
                </dd>
                    {{-- <a href="{{route('admin.reject-user')}}" onclick="return confirm('Are you sure to reject?')" class="btn btn-sm btn-danger">Reject</a> --}}
                    @endif
                  </dl>
            </div>
        </div>
        

    </div><!-- sl-pagebody -->
</div>