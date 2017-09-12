@extends('Dashboard::index')
@section('mainContent')
    <form action="{{route('PDF::add')}}" enctype="multipart/form-data" method="post" style="margin: 30px" class="">
        <h3>{{ucfirst($action)}} PDF</h3>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="action" value="{{$action}}">
        <input type="hidden" name="course_id" value="{{$course->id}}">
        <input type="hidden" name="lesson_id" value="{{$lesson->id}}">
        <input type="hidden" name="activity_id" value="{{$activity->id}}">
        <?php
        if(isset($activity->id)){
            $act = \App\Modules\mod\PDF\Model\PDF::find($activity->instance);
            $content = \App\Modules\mod\PDF\Model\PDFContent::where('mod_id',$act->id)->first();
        }else{
            $act = new App\Modules\mod\PDF\Model\PDF();
            $content = new \App\Modules\mod\PDF\Model\PDFContent();
        }
        ?>
        <h5 style="font-weight: bold ">General Setting</h5>
        <div class="form-group">
            <label for="">Name: </label>
            <input class="form-control" type="text" name="name" value="{{$act->name}}"> <br>
        </div>
        <div class="form-group">
            <label for="">Description: </label>
            <textarea class="form-control" name="description" cols="30" rows="10">{{$act->description}}</textarea>
        </div>
        <div class="form-group" style="border-bottom: 1px solid #000000;">
            <label for="">Template:</label>
            <select name="template"  class="form-control" style="margin-bottom: 50px">

                <option value="template.template1">Template1</option>
            </select>

        </div>

        <br>

        <h5 style="font-weight: bold">PDF Content</h5>
        <div class="form-group">
            <label>Title:</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="">PDF:</label>
            <input class="form-control" type="file" name="pdf"> <br>
        </div>
        <button type="submit" class="btn btn-primary">OK</button>
        <button id="cancel" type="button" class="btn btn-danger">Cancel</button>

    </form>
@stop
@section('script')

@stop