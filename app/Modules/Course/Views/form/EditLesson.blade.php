@extends('Core::template.index')
@section('content')
    <form action="" method="post" enctype="multipart/form-data">
        <h2>New Lesson</h2>
        <input type="hidden" name="courseid" value="{{$course->id}}">
        <input type="hidden" name="lessonid" value="{{$lesson->id}}">
        <?php
        if (isset($lesson->title)) $action = 'edit'; else $action = 'new';
        ?>
        <input type="hidden" name="action" value="{{$action}}">
        <label for="">Title: </label> <input type="text" name="title" value="{{$lesson->title}}"><br>
        <label for="">Summary: </label> <textarea name="summary" cols="30" rows="10">{{$lesson->summary}}</textarea>
        <label for="">Template: </label>
        <select name="template">
            <option value="1">Lesson Template 1</option>
        </select>
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Activity
        </button>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <h3>Select a activity</h3>
                <ul class="act">

                </ul>
            </div>
        </div>
        <button type="submit">OK</button>
        <button type="button" onclick="window.location.href = '/course/{{$course->id}}'">Cancel</button>
    </form>
@stop
@section('script')
    <script>
        $(document).ready(function () {
            $.ajax({
                method: 'GET',
                url: '/api/course/allactivity',
                success: function (data) {
                    var html = '';
                    $.each(data,function (key, value) {
                       var a = '<li><input type="radio" name="activity" value="'+value.id+'">'+ value.name+'</li>';
                       html += a;
                       $('.act').html(html);
                    });
                },
                error: function (a,b,c) {

                }


            })
        });

    </script>
@stop