@extends('Dashboard::index')
@section('mainContent')
    <div class="container">
        <h2>Lesson Overview</h2>

        <div class="single_course_content">
            <h2>About The Lesson</h2>
            <h4>{{$lesson->title}}</h4>
            <p>{{$lesson->summary}}</p>
            <a href="{{route('course::editlesson',['id'=>$course->id,'lesson'=>$lesson->id])}}" class="btn btn-primary">Edit Lesson</a>

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


        </div>
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