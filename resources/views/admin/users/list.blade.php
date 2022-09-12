@extends('admin.master')
@section('body')

<div class="sl-mainpanel">

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width:400px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">User</h5>
                    <button type="button" class="close closemodal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.update-user')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="phone">Status</label>

                            <div class="form-check">
                                <input class="form-control-input" type="radio" name="status" id="status1" value="1">
                                <label class="form-control-label" for="status1">
                                    Approved
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-control-input" type="radio" name="status" id="status2" value="2">
                                <label class="form-control-label" for="status2">
                                    Rejected
                                </label>
                            </div>
                        </div>

                        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary closemodal" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('admin.home')}}">Talent Hiring Portal</a>
        <span class="breadcrumb-item active">Users</span>
    </nav>

    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h3 class="text-center text-success"> {{Session::get('message')}} </h3>

            <div class="table-wrapper table-responsive">

                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">Name</th>
                            <th class="wd-15p">Email</th>
                            <th class="wd-15p">Phone</th>
                            <th class="wd-15p">Status</th>
                            <th class="wd-15p">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($users as $row)
                        <tr>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->phone}}</td>
                            <td>
                                @if ($row->status == 1)
                                Approved
                                @elseif($row->status == 2)
                                Rejected
                                @endif
                            </td>
                            <td class="">

                                <a href="#" onclick="editUser({{$row->id}})" title="Edit"
                                    class="btn btn-success btn-sm">Edit</a>
                                {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Edit
                                </button> --}}

                                {{-- <a href="" title="Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"
                                        aria-hidden="true"></i></a> --}}
                                <br> <br>
                                <form action="{{route('admin.delete-user')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{$row->id}}">
                                    <input onclick="return confirm('Are you sure to delete?')" type="submit"
                                        title="Delete" class="btn btn-danger btn-sm" value="Delete">
                                    {{-- <input class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure to delete?')" type="submit"
                                        value="Delete"> --}}
                                </form>

                                <a href="{{route('admin.user-details',['id'=>$row->id])}}" title="View"
                                    class="btn btn-warning btn-sm">View</a>
                            </td>


                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->

    </div><!-- sl-pagebody -->
</div>

<script>
    function editUser(id){
    
    $.ajax({
        type: "get",
        url: "{{url('admin/user/')}}"+'/'+id,
        dataType: "json",
        success: function (response) {
            console.log(response.user);
            $("#exampleModal").modal('show');
            $("#id").val(response.user.id);
            $("#name").val(response.user.name);
            $("#email").val(response.user.email);
            $("#phone").val(response.user.phone);
            if (response.user.status == 1) {
                
                $("#status1").prop("checked",true);
            }
            else if(response.user.status == 2){
                $("#status2").prop("checked",true);

            }
        }
    });
}
</script>