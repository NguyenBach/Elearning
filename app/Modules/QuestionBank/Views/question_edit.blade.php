@extends('Core::template.index')
@section('content')
<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <a class="panel-title" href="{{ URL::previous() }}">< Back</a>
            <h3 class="panel-title">Question Banks</h3>
        </div>
        <div class="panel-body">
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
@section('slider')
   <section id="imgBanner">
       <h2>Add Question Banks</h2>
   </section>


@stop

@section('sidebar')
@include('Core::template.sidebar')
@stop
