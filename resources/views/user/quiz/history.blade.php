@extends('user.master')
@section('body')

<div class="sl-mainpanel">

    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('admin.home')}}">Talent Hiring Portal</a>
        <span class="breadcrumb-item active">Quiz</span>
    </nav>

    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h3 class="text-center text-success"> {{Session::get('message')}} </h3>

            <div class="table-wrapper table-responsive">

                <div class="sl-page-title d-flex justify-content-start">    
                    <a class="btn btn-success" href="{{route('user.quiz')}}" onclick="return confirm('Are you sure to start quiz?')">Give Quiz</a>
                </div>

                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">#</th>
                            <th class="wd-15p">Name</th>
                            <th class="wd-15p">Marks</th>
                            <th class="wd-15p">Date</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($results as $row)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->marks}}/{{$row->out_of}}</td>
                            <td>{{\Carbon\Carbon::parse($row->created_at)->diffForHumans()}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->

    </div><!-- sl-pagebody -->
</div>