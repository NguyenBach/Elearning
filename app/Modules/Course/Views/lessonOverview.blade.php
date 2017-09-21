@extends('Dashboard::index')
@section('mainContent')

        <h2>Lesson Overview</h2>

        <div class="single_course_content">
            <h2>About The Lesson</h2>
            <h4>{{$lesson->title}}</h4>
            <p>{{$lesson->summary}}</p>
            <a href="{{route('course::editlesson',['id'=>$course->id,'lesson'=>$lesson->id])}}" class="btn btn-primary">Edit
                Lesson</a>

            <h5>Activities</h5>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addActivity">Add
                Activity
            </button>

            <table class="table table-striped course_table">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($activities as $key => $activity)
                    <?php  $type = App\Modules\Course\ActivityType::find($activity->type_id);
                    $act = \Illuminate\Support\Facades\DB::table($type->table)->where('id', $activity->instance)->first();
                    ?>
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$act->name}}</td>
                        <td>{{$act->description}}</td>
                        <td>{{$type->name}}</td>
                        <td>
                            <div class="t-btn-group">
                                <?php $route = $type->name . "::addForm"; ?>
                                <a href="{{route($route,['course_id'=>$course->id,'lesson_id'=>$lesson->id,'activity_id'=>$activity])}}"
                                   class="btn btn-primary">Edit</a>
                                <a href="#" class="btn btn-info">View</a>
                                <form action="{{route('course::deleteactivity')}}" method="post">
                                    <input type="hidden" name="course_id" value="{{$course->id}}">
                                    <input type="hidden" name="lesson_id" value="{{$lesson->id}}">
                                    <input type="hidden" name="activity_id" value="{{$activity->id}}">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <a href="#" class="btn btn-danger delete-activity" id="{{$activity->id}}">Delete</a>
                                </form>
                            </div>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @if($lesson->id > 1)
                <a class="btn btn-default"
                   href="{{route('course::lessonOverview',['courseid'=>$course->id,'lessonid'=>$lesson->id-1])}}">Previous</a>
            @endif
            <a class="btn btn-default" href="{{route('course::overview',['id'=>$course->id])}}">OK</a>
            <?php
            $lessons = \App\Modules\Course\Model\Lesson::where('course_id', $course->id)->get();
            $max = count($lessons);
            ?>
            @if($lesson->id < $max)
                <a class="btn btn-default"
                   href="{{route('course::lessonOverview',['courseid'=>$course->id,'lessonid'=>$lesson->id+1])}}">Next</a>
            @endif
        </div>

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
            $('.delete-activity').click(function () {
                alert('Are you sure?');
                $(this).parent().submit();
            })
        })
    </script>
@stop