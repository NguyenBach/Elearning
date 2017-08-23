@extends('Dashboard::index')
@section('mainContent')
<div class="col-md-12">
    <div class="panel">
        <div class="panel-body">
            <div class="page-header">
            {!! Form::model($question_bank, ['url' => ['question/edit', $question_bank->id]]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::text('description', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('difficulty', 'Difficulty') !!}
                    {!! Form::select('difficulty', [0 => "BEGINNER", 1 => "INTERMEDIATE", 2 => "ADVANCED"], null, ['class' => 'form-control']) !!}
                </div>
                <button class="btn btn-success" type="submit">Save changes</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@stop
