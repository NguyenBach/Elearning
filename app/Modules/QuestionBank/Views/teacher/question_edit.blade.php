@extends('Dashboard::index')
@section('mainContent')
<div class="col-md-12">
    <div class="panel">
        <div class="panel-body">
            <div class="page-header">
              <h2><b>Edit Question</b></h2>
            </div>
            {!! Form::model($question, ['url' => [Request::url(), $question->id]]) !!}
                <div class="form-group">
                    {!! Form::label('question', 'Question') !!}
                    {!! Form::textarea('question', null, ['class' => 'form-control', 'required' => 'required', 'size' => '10x3']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('option_0', 'A (default answer)') !!}
                    {!! Form::text('option_0', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('option_1', 'B') !!}
                    {!! Form::text('option_1', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('option_2', 'C') !!}
                    {!! Form::text('option_2', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('option_3', 'D') !!}
                    {!! Form::text('option_3', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <button class="btn btn-success" type="submit">Save changes</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>



@stop
