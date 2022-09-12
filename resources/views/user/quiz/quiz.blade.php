@extends('user.master')
@section('body')


<div class="sl-mainpanel">


    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('admin.home')}}">Talent Hiring Portal</a>
        <span class="breadcrumb-item active">Users</span>
    </nav>

    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h3 class="text-center text-success"> {{Session::get('message')}} </h3>

            <div class="table-wrapper table-responsive">
                <form onsubmit="setFormSubmitting()" id="form" action="{{route('user.submit-quiz')}}" method="POST">
                    @csrf
                    @php
                    $j = 0;
                    @endphp
                    @foreach ($quizzes as $key => $item)
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">{{$key + 1}}. {{$item->question}}</label>
                        <div class="form-inline mt-2">
                            <div class="form-group">
                                <input type="hidden" name="question[]" value="{{$item->id}}">
                                @php
                                $i = 1;

                                @endphp
                                @foreach ($item->options()->get() as $option)
                                <input class="ml-4 form-control-input" type="radio" name="answer{{$item->id}}"
                                    value="{{$i}}" id="option{{$j}}">
                                <label class="ml-1 form-check-label" for="option{{$j}}">{{$option->option}}</label>
                                @php
                                $i++;
                                $j++;
                                @endphp
                                @endforeach

                                {{-- <input class="ml-4 form-control-input" type="radio" name="inlineRadioOptions"
                                    id="option2" value="option2{{$item->id}}">
                                <label class="ml-1 form-check-label" for="option2{{$item->id}}">2</label>
                                <input class="ml-4 form-control-input" type="radio" name="inlineRadioOptions"
                                    id="option3{{$item->id}}" value="option2">
                                <label class="ml-1 form-check-label" for="option3{{$item->id}}">2</label>
                                <input class="ml-4 form-control-input" type="radio" name="inlineRadioOptions"
                                    id="option4{{$item->id}}" value="option2">
                                <label class="ml-1 form-check-label" for="option4{{$item->id}}">2</label> --}}
                            </div>

                        </div>

                    </div>
                    @endforeach

                    <button type="submit" onclick="return confirm('Are you sure to submit?')"
                        class="btn btn-primary">Submit</button>
                </form>
            </div><!-- table-wrapper -->
        </div><!-- card -->

    </div><!-- sl-pagebody -->
</div>

<script>
    window.hideWarning = false;
    window.addEventListener('beforeunload', (event) => {
        if (!hideWarning) {
            event.preventDefault();
            event.returnValue = '';
        }

    });
</script>