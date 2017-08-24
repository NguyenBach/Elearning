@extends('Dashboard::index')
@section('mainContent')
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <h2>New Lesson</h2>
            <input type="hidden" name="courseid" value="{{$course->id}}">
            <input type="hidden" name="lessonid" value="{{$lesson->id}}">
            <?php
            if (isset($lesson->title)) $action = 'edit'; else $action = 'new';
            ?>
            <input type="hidden" name="action" value="{{$action}}">

            <div class="form-group">
                <label for="">Title: </label>
                <input class="form-control" type="text" name="title" value="{{$lesson->title}}">
            </div>
            <div class="form-group">
                <label for="">Summary: </label>
                <textarea class="form-control" name="summary" cols="30" rows="5">{{$lesson->summary}}</textarea>
            </div>
            <div class="form-group">
                <label for="">Summary: </label>
                <textarea class="form-control" name="summary" cols="30" rows="5">{{$lesson->summary}}</textarea>
            </div>
            <div class="form-group">
                <label for="">Summary: </label>
                <textarea class="form-control" name="summary" cols="30" rows="5">{{$lesson->summary}}</textarea>
            </div>
            <div class="form-group">
                <label for="">Template: </label>
                <select name="template" class="form-control">
                    <option value="1">Lesson Template 1</option>
                </select>
            </div>
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addActivity">Add
                Activity
            </button>

            <table class="table">
                <tbody>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>
                        <i class="icon-cogs"></i>
                        Action
                    </th>
                </tr>
                @foreach($activities as $key => $activity)
                    <tr>
                        <td>{{$key}}</td>
                        <td>{{$activity->name}}</td>
                        <td>{{$activity->description}}</td>
                        <?php

                        $type = App\Modules\Course\ActivityType::find($activity->type_id); ?>
                        <td>{{$type->name}}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#myModal">Edit
                                </button>
                                <a href="#" class="btn btn-danger">View</a>
                            </div>
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <?php $view = $type->name . '::form.createForm'; ?>
                                            @include($view,['lesson'=>$lesson,'course'=>$course,'activity'=>$activity])
                                    </div>

                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <br>
            <button type="submit" class="btn btn-success">OK</button>
            <button type="button" class="btn btn-danger" onclick="window.location.href = '/course/{{$course->id}}'">Cancel</button>
        </form>
        <div class="modal fade" id="addActivity" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        @include('Course::form.addActivity',['course'=>$course,'lesson' => $lesson])
                    </div>

                </div>

            </div>
        </div>
    </div>
@stop
@section('script')

@stop