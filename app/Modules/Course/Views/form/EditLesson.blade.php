@extends('Dashboard::index')
@section('mainContent')
    <form class="lesson-add-form" style="margin: 30px" action="" method="post" enctype="multipart/form-data">
        <h2>{{strtoupper($action)}} LESSON</h2>
        <input type="hidden" name="courseid" value="{{$course->id}}">
        <input type="hidden" name="lessonid" value="{{$lesson->id}}">
        <input type="hidden" name="action" value="{{$action}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label for="">Title: </label>
            <input class="form-control" type="text" name="title" value="{{$lesson->title}}">
        </div>
        <div class="form-group">
            <label for="">Summary: </label>
            <textarea name="summary" class="form-control" cols="30" rows="10">{{$lesson->summary}}</textarea>

        </div>
        <div class="form-group">
            <label for="">Template: </label>
            <select name="template">
                <option value="1">Lesson Template 1</option>
            </select>
        </div>


        <br>
        <button class="btn btn-primary" type="submit">OK</button>
        <button class="btn btn-danger" type="button" onclick="window.location.href = '/course/{{$course->id}}'">Cancel
        </button>
    </form>
@stop
