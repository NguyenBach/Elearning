@extends('Dashboard::index')
@section('mainContent')
<div class="col-md-12">
    <div class="panel">
        <div class="panel-body">
            <div class="page-header">
              <h2><b>Create Question</b></h2>
            </div>
            {!! Form::open(['url' => 'teacher/questionbank/detail/{id}/create']) !!}
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
                <input type='text' value={{$id}} name='bank_id' style="display:none;">
                <button class="btn btn-success" type="submit">Add new question</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>



@stop
