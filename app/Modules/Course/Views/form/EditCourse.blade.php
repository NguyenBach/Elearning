@extends('Dashboard::index')
@section('mainContent')

        <form method="post" enctype="multipart/form-data" action="">
            <input type="hidden" name="id" value="{{$course->id}}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="action"
                   value="<?php if (isset($course->fullname)) echo 'edit'; else echo 'new';  ?>">
            <div class="form-group">
                <label for="">Full Name: </label>
                <input class="form-control" type="text" name="fullname" placeholder="Full Name" value="{{$course->fullname}}">
            </div>

            <div class="form-group">
                <label for="">Short Name: </label>
                <input class="form-control" type="text" name="shortname" placeholder="Short name" value="{{$course->shortname}}">
            </div>
            <div class="form-group">
                <label for="">Introduction: </label>
                <textarea class="form-control" name="intro" cols="30" rows="10">{{$course->introduction}}</textarea>
            </div>
            <div class="form-group">
                <label for="">Feature Picture: </label>
                <input class="form-control" type="file" name="featurepicture" value="{{$course->feature_picture}}">
            </div>
            <div class="form-group">
                <label for="">Start Date: </label>
                <input class="form-control" type="date" name="startdate" value="{{$course->start_date}}"></div>
            <div class="form-group">
                <label for="">Course Format:</label>
                <select name="courseformat" class="form-control">
                    <option value="1">Lesson</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Number Of Lesson: </label>
                <input class="form-control" type="number" name="numberlessons" value="{{$course->number_lessons}}"><br>
            </div>
            <div class="form-group">
                <label for="">Active: </label>
                <select name="active" class="form-control">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Visible: </label>
                <select name="visible" class="form-control">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">OK</button>
            <button type="button" class="btn btn-danger">Cancel</button>
        </form>

@stop