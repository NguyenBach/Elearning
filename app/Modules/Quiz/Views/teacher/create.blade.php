@extends('Dashboard::index')
@section('mainContent')
<div class="col-md-12">
    <div class="panel">
        <div class="panel-body">
            <div class="page-header">
              <h2><b>Create Quiz</b></h2>
            </div>
            {!! Form::open(['url' => 'teacher/quiz/create']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', '', ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::text('description', '', ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <button class="btn btn-success" type="submit">Create</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop
