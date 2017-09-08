@extends('Dashboard::index')
@section('mainContent')
    <form class="lesson-add-form" style="margin: 30px" action="" method="post" enctype="multipart/form-data">
        <?php
        if (isset($lesson->title)) {
            $action = 'edit';
        } else {
            $action = 'new';
        }
        ?>
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


        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addActivity">Add Activity
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
                    <?php
                    $type = App\Modules\Course\ActivityType::find($activity->type_id);
                    $act = \Illuminate\Support\Facades\DB::table($type->table)->where('id', $activity->instance)->first();
                    ?>
                    <td>{{$key+1}}</td>
                    <td>{{$act->name}}</td>
                    <td>{{$act->description}}</td>
                    <td>{{$type->name}}</td>
                    <td>
                        <div class="btn-group">
                            <?php $route = $type->name . "::addForm"; ?>
                            <a href="{{route($route,['course_id'=>$course,'lesson_id'=>$lesson,'activity_id'=>$activity])}}"
                               class="btn btn-primary">Edit</a>
                            <a href="#" class="btn btn-info">View</a>
                            <a href="#" class="btn btn-danger delete-activity" id="{{$activity->id}}">Delete</a>
                        </div>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br>
        <button class="btn btn-primary" type="submit">OK</button>
        <button class="btn btn-danger" type="button" onclick="window.location.href = '/course/{{$course->id}}'">Cancel
        </button>
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
@stop
@section('script')
    <script>
        $(document).ready(function () {
            $('.delete-activity').click(function (e) {
                $.ajax({
                    url: '{{route('course::deleteactivity')}}',
                    data: {'activity_id': $(this).attr('id'), 'lesson_id':{{$lesson->id}}, 'course_id':{{$course->id}}},
                    method: 'post',
                    async: false,
                    dataType: 'json',
                    success: function (data) {
                        if (data.success) {
                            location.reload();
                        }
                    },
                    error: function (a, b, c) {
                        console.log(a + b + c);
                    }
                });
                e.preventDefault();
            })
        })
    </script>
@stop