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
              <h2><b>Question Set Detail</b></h2>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="singCourse_content">
                    <!-- QUESTION BANK INFO  -->
                    <h3 class="singCourse_title">Name : {!! $detail['question_set']['name'] !!}</h3>
                    <h3 class="singCourse_title">Question Banks :</h3>
                    <div class="col-lg-12">
                        @foreach ($detail['questionbanks'] as $questionbank)
                            <p class="">{!!$loop->iteration . '. ' .  $questionbank['name'] !!} </p>
                        @endforeach
                    </div>
                    <h3 class="singCourse_title">Description :</h3>
                    <div class="col-lg-12">
                        <p>{!! $detail['question_set']['description'] !!}</p>
                        <br>
                    </div>

                    <!-- LIST OF ALL QUESSTIONS  -->
                    <h3 class="singCourse_title">All Questions :
                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#show-all">Show all</button>
                    </h3>

                    <!-- SHOW ALL MODAL  -->

                    <div class="modal fade" id="show-all" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog modal-lg" role="document">
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
            </div>
        </div>
    </div>
</div>



@stop
@section('script')
<script type="text/javascript" src="{{ URL::asset('js/DataTables-1.10.12/media/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/scripts/list_question.datatables.js') }}"></script>
@stop
