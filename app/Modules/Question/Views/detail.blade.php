@extends('Core::template.index')
@section('content')
<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">{!! $detail['question_bank']['name'] !!} : Detail</h3>
        </div>
        <div class="panel-body">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="singCourse_content">
                    <!-- QUESTION BANK INFO  -->
                    <h3 class="singCourse_title">Name : {!! $detail['question_bank']['name'] !!}</h3>
                    <h4 class="singCourse_price">Difficulty : {!! $detail['question_bank']['difficulty'] !!}</h4>
                    <h3 class="singCourse_title">Description :</h3>
                    <div  class="col-lg-12">
                        <p>{!! $detail['question_bank']['description'] !!}</p>
                        <br>
                    </div>

                    <!-- LIST OF ALL QUESSTIONS  -->
                    <h3 class="singCourse_title">All Questions : </h3>
                    <!-- <div class="col-lg-12">
                        @foreach ($detail['questions'] as $question)
                            <h4 class="singCourse_price">{!!$loop->iteration . '. ' . $question['question'] !!}</h4>

                            <p class="answer">A. {!! $question['option_0'] !!} </p>
                            <p class="">B. {!! $question['option_1'] !!} </p>
                            <p class="">C. {!! $question['option_2'] !!} </p>
                            <p class="">D. {!! $question['option_3'] !!} </p>
                            <br>
                        @endforeach
                    </div> -->

                </div>
            </div>
                <div class="col-md-11 col-md-offset-1">
                    <a class="btn btn-large btn-success" href="{{ URL::to('/question/detail/'.$detail['question_bank']['id'].'/create') }}">Add new</a>
                    <table class="table table-bordered table-responsive table-hover" id="questions-table">
                       <thead>
                           <tr>
                               <th>ID</th>
                               <th>Questions</th>
                               <th></th>
                           </tr>
                       </thead>
                    </table>
                </div>
        </div>
    </div>
</div>



@stop
@section('slider')
   <section id="imgBanner">
       <h2>Add Question Banks</h2>
   </section>


@stop

@section('sidebar')
@include('Core::template.sidebar')
@stop
@section('script')
<script type="text/javascript" src="{{ URL::asset('js/DataTables-1.10.12/media/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/scripts/list_question.datatables.js') }}"></script>
@stop
