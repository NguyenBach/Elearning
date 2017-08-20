@extends('Dashboard::index')
@section('mainContent')
<div class="col-md-12">
    <div class="panel">
        <div class="panel-body">
            <div class="page-header">
              <h2><b>Create Question Set</b></h2>
            </div>
            {!! Form::open(['url' => 'questionset/generate']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', '', ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::text('description', '', ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('question_per_bank', 'Number of question per bank') !!}
                    {!! Form::select('question_per_bank', [1=>1,
                    2=>'2',
                    3=>'3',
                    4=>'4',
                    5=>'5',
                    6=>'6',
                    7=>'7',
                    8=>'8',
                    9=>'9',
                    10=>'10'], null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::Label('question_bank', 'Question Banks: (ctrl + click to choose)') !!}
                    {!! Form::select('bank_ids[]', $question_banks, null, ['class' => 'form-control', 'multiple '=> 'multiple']) !!}
                </div>
                <button class="btn btn-success" type="submit">Generate</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>



@stop
