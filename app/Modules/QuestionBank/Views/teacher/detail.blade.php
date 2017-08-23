@extends('Dashboard::index')
@section('css')
    <link href="{{url('js/DataTables-1.10.12/media/css/jquery.dataTables.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/main.css')}}" />
@stop
@section('mainContent')
<div class="col-md-12">
    <div class="panel">
        <div class="panel-body">
            <div class="page-header">
              <h2><b>Question Bank Detail</b></h2>
            </div>
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
                    <h3 class="singCourse_title">All Questions :
                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#show-all">Show all</button>
                    </h3>

                    <!-- SHOW ALL MODAL  -->

                    <div class="modal fade" id="show-all" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">All Questions</h4>
                          </div>
                          <div class="modal-body" style="max-height: calc(100vh - 210px);;overflow-y: auto;">
                              @foreach ($detail['questions'] as $question)
                                  <h4 class="singCourse_price">{!!$loop->iteration . '. ' . $question['question'] !!}</h4>

                                  <p class="">A. {!! $question['option_0'] !!} </p>
                                  <p class="">B. {!! $question['option_1'] !!} </p>
                                  <p class="">C. {!! $question['option_2'] !!} </p>
                                  <p class="">D. {!! $question['option_3'] !!} </p>
                                  <br>
                              @endforeach
                          </div>
                        </div>
                      </div>
                    </div>

                </div>


            <!-- QUESTIONS MANAGEMENT  -->
            <div class="col-md-11">
                <a class="btn btn-large btn-success" href="{{ URL::to('teacher/questionbank/detail/'.$detail['question_bank']['id'].'/create') }}">Add new</a>
                <div class="col-md-11 col-md-offset-1">
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
