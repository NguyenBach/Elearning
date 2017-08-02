@extends('Core::template.index')
@section('content')
<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
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

        <!-- QUESTION FORM -->
        <div class="panel-heading">
            <h3 class="panel-title">Add Questions</h3>
        </div>
        <div class="panel-body">
            {!! Form::open(['url' => 'question/create_question']) !!}
            <input name="bank_id" value="{!! $question_bank->id !!}" style="display:none;" >
            <div class="form-group">
                {!! Form::label('question', 'Question') !!}
                {!! Form::text('question', '', ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('answer', 'Answer') !!}
                {!! Form::select('answer', [0 => "A", 1 => "B", 2 => "C", 3 => "D"], null, ['class' => 'form-control']) !!}
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    {!! Form::label('option_0', 'A. ') !!}
                    {!! Form::text('option_0', '', ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('option_1', 'B. ') !!}
                    {!! Form::text('option_1', '', ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('option_2', 'C. ') !!}
                    {!! Form::text('option_2', '', ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('option_3', 'D. ') !!}
                    {!! Form::text('option_3', '', ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
            <button class="btn btn-success" type="submit">Add question</button>
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
