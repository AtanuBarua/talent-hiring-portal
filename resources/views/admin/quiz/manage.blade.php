@extends('admin.master')
@section('body')

<div class="sl-mainpanel">


    <!-- Modal -->
    <div class="modal " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="width:500px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Quiz</h5>
                    <button type="button" class="close closemodal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.new-quiz')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Question</label>
                            {{-- <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp"> --}}
                            <textarea required name="question" class="form-control" name="question" id="question"
                                cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="optionA">Option A</label>
                            <input required name="options[]" type="text" class="form-control" id="optionA">

                        </div>
                        <div class="form-group">
                            <label for="optionB">Option B</label>
                            <input required name="options[]" type="text" class="form-control" id="optionB">
                        </div>
                        <div class="form-group">
                            <label for="optionC">Option C</label>
                            <input required id="optionC" name="options[]" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="optionD">Option D</label>
                            <input required id="optionD" name="options[]" type="text" class="form-control">
                        </div>
                        <div class="form-group">

                            <select class="form-control" required name="correct_ans" id="correct_ans">
                                <option value="">Correct Answer</option>
                                <option value="1">Option A</option>
                                <option value="2">Option B</option>
                                <option value="3">Option C</option>
                                <option value="4">Option D</option>
                            </select>

                        </div>
                        {{-- <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div> --}}

                        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary closemodal" data-dismiss="modal">Close</button>
                        <button type="submit" id="modalbtn" class="btn btn-primary">Add</button>
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

                <div class="sl-page-title d-flex justify-content-end">

                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                        Add New Quiz
                    </button>
                </div>

                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>

                            <th class="wd-15p">#</th>
                            <th class="wd-15p">Question</th>
                            <th class="wd-15p">Option A</th>
                            <th class="wd-15p">Option B</th>
                            <th class="wd-15p">Option C</th>
                            <th class="wd-15p">Option D</th>
                            <th class="wd-15p">Answer</th>
                            <th class="wd-15p">Status</th>
                            <th class="wd-15p">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($quizzes as $row)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$row->question}}</td>
                            @foreach ($row->options()->get() as $item)

                            <td>{{$item->option}}</td>
                            @endforeach

                            <td>
                                {{$row->answer == 1 ? 'A' : ($row->answer == 2 ? 'B' : ($row->answer == 3 ? 'C' :
                                ($row->answer == 4 ? 'D' : '')))}}

                            </td>
                            <td>
                                @if ($row->status == 1)
                                Active
                                @else
                                Inactive
                                @endif
                            </td>
                            <td class="">

                                <a href="#" onclick="editQuiz({{$row->id}})" title="Edit"
                                    class="btn btn-primary btn-sm">Edit</a>

                                {{-- <a href="" title="Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"
                                        aria-hidden="true"></i></a> --}}
                                <br> <br>
                                <form action="{{route('admin.delete-quiz')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$row->id}}">
                                    <input onclick="return confirm('Are you sure to delete?')" type="submit"
                                        title="Delete" class="btn btn-danger btn-sm" value="Delete">
                                    {{-- <input class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure to delete?')" type="submit"
                                        value="Delete"> --}}
                                </form>

                                {{-- <a href="{{route('admin.user-details',['id'=>$row->id])}}" title="View"
                                    class="btn btn-warning btn-sm">View</a> --}}
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
    function editQuiz(id){
        
        $.ajax({
            type: "get",
            url: "{{url('admin/quiz/')}}"+'/'+id,
            dataType: "json",
            success: function (response) {
                console.log(response.quiz);
                $("#exampleModal").modal('show');
                $("#id").val(response.quiz.id);
                $("#question").val(response.quiz.question);
                $("#optionA").val(response.quiz.options[0].option);
                $("#optionB").val(response.quiz.options[1].option);
                $("#optionC").val(response.quiz.options[2].option);
                $("#optionD").val(response.quiz.options[3].option);
                $("#correct_ans").val(response.quiz.answer).change();
                $("#modalbtn").text('Update')
            }
        });
    }
</script>