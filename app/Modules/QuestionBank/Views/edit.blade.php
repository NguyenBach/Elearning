@extends('Core::template.index')
@section('content')
<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <a class="panel-title" href="{{ URL::previous() }}">< Back</a>
            <h3 class="panel-title">Question Banks</h3>
        </div>
        <div class="panel-body">
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
@section('slider')
   <section id="imgBanner">
       <h2>Add Question Banks</h2>
   </section>


@stop

@section('sidebar')
@include('Core::template.sidebar')
@stop
