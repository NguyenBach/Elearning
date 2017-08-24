@extends('Dashboard::index')
@section('css')
    <link href="{{url('js/DataTables-1.10.12/media/css/jquery.dataTables.css')}}" rel="stylesheet">
@stop
@section('mainContent')
<div class="col-md-12">
    <div class="panel">
        <div class="panel-body">
            <div class="page-header">
              <h2><b>Edit Quiz</b></h2>
            </div>
            {!! Form::model($quiz, ['url' => ['teacher/quiz/edit', $quiz->id]]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::text('description', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <button class="pull-right btn btn-lg btn-success" type="submit">Save change</button>
            {!! Form::close() !!}
            <br><br>
            <hr>
            <a class="btn btn-info" data-toggle="modal" data-target="#choose-from-bank">Choose from Question Banks</a>
            <a class="btn btn-success" data-toggle="modal" data-target="#random-from-bank">Random from Question Banks</a>
            <a class="btn btn-warning" data-toggle="modal" data-target="#add-manually">Add Questions Manually</a>
            <hr>

            <h3 class="title">Random Banks</h3>
            @foreach ($random_banks as $random_bank)
                <p>{{$random_bank}}</p>
            @endforeach
            <hr>
            <!-- LIST QUESTIONS  -->
            <h3 class="title">List of questions</h3>
            <table class="table table-bordered table-responsive table-hover" id="questions-table">
               <thead>
                   <tr>
                       <th>ID</th>
                       <th>Questions</th>
                       <th></th>
                   </tr>
               </thead>
            </table>



            <!-- CHOOSE QUESTION BANK MODAL -->
            <div class="modal fade" id="choose-from-bank" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Question Banks</h4>
                        </div>
                        {!! Form::open(['url' => url()->current().'/choose_question']) !!}
                            <div class="modal-body" style="height: calc(100vh - 210px);;overflow-y: auto;">

                                {!! Form::Label('question_bank', 'Choose Question Banks: ') !!}
                                {!! Form::select('bank_id', $question_banks, null, ['id' => 'bank', 'class' => 'form-control']) !!}
                                <table class="table" id="list-question">
                                </table>

                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-success" type="submit">Add</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <!-- RANDOM QUESTION BANK MODAL -->
            <div class="modal fade" id="random-from-bank" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Question Banks</h4>
                        </div>
                        {!! Form::open(['url' => url()->current().'/random_question']) !!}
                            <div class="modal-body" style="height: calc(100vh - 210px);;overflow-y: auto;">
                                    {!! Form::Label('question_bank', 'Choose Question Banks: ') !!}
                                    {!! Form::select('bank_id', $question_banks, null, ['id' => 'bank', 'class' => 'form-control']) !!}
                                    {!! Form::Label('randum_num', 'Number of Random: ') !!}
                                    {!! Form::text('random_num', '', ['class' => 'form-control']) !!}

                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-success" type="submit">Add</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <!-- ADD QUESTION MODAL -->
            <div class="modal fade" id="add-manually" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
               <div class="modal-lg" role="document">
                   <div class="modal-content">
                       <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           <h4 class="modal-title" id="myModalLabel">Question Banks</h4>
                       </div>
                       <div class="modal-body" style="max-height: calc(100vh - 210px);;overflow-y: auto;">
                         {!! Form::open(['url' => url()->current().'/create_question']) !!}
                            <div class="form-group">
                                 {!! Form::Label('question_bank', 'Choose Question Banks: ') !!}
                                 {!! Form::select('bank_id', $question_banks, null, ['id' => 'bank', 'class' => 'form-control']) !!}
                             </div>
                             <div class="form-group">
                                 {!! Form::label('question', 'Question') !!}
                                 {!! Form::textarea('question', '', ['class' => 'form-control', 'required' => 'required', 'size' =>'10x3']) !!}
                             </div>
                             <div class="form-group">
                                 {!! Form::label('option_0', 'A (default answer)') !!}
                                 {!! Form::text('option_0', '', ['class' => 'form-control', 'required' => 'required']) !!}
                             </div>
                             <div class="form-group">
                                 {!! Form::label('option_1', 'B') !!}
                                 {!! Form::text('option_1', '', ['class' => 'form-control', 'required' => 'required']) !!}
                             </div>
                             <div class="form-group">
                                 {!! Form::label('option_2', 'C') !!}
                                 {!! Form::text('option_2', '', ['class' => 'form-control', 'required' => 'required']) !!}
                             </div>
                             <div class="form-group">
                                 {!! Form::label('option_3', 'D') !!}
                                 {!! Form::text('option_3', '', ['class' => 'form-control', 'required' => 'required']) !!}
                             </div>
                             <button class="btn btn-success" type="submit">Add question</button>
                         {!! Form::close() !!}
                       </div>
                   </div>
               </div>
            </div>
            <div class="form-group">

            </div>
            <hr>
            <a class="pull-right btn btn-lg btn-danger" href="{{ URL::to('teacher/quiz') }}">Done</a>
        </div>
    </div>
</div>
@stop
@section('script')
<script type="text/javascript" src="{{ URL::asset('js/DataTables-1.10.12/media/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/scripts/quiz.create.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/scripts/quiz_questions.datatable.js') }}"></script>
@stop
