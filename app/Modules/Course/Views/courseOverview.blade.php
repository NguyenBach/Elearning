@extends('Dashboard::index')
@section('mainContent')
    <h2>Course Overview</h2>
    <div class="courseArchive_content">
        <div class="singlecourse_ferimg_area">
            <div class="singlecourse_ferimg">
                <img src="{{url($course->feature_picture)}}" alt="img">
            </div>
            <div class="singlecourse_bottom">
                <h2>{{$course->fullname}}</h2>
                <span class="singlecourse_author">
                    <img alt="img" src="{{url('img/author.jpg')}}">
                    Richard Remus, Teacher
                  </span>
                <span class="singlecourse_price">$20</span>
            </div>
        </div>
        <div class="single_course_content">
            <h2>About The Coures</h2>
            <p>{{$course->introduction}}</p>

            <a href="#" class="btn btn-primary">Add Lesson</a>
            <table class="table table-striped course_table">
                <thead>
                <tr>
                    <th>Lesson Title</th>
                    <th>Instructor</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lessons as $lesson)
                    <tr>
                        <td><a href="{{route('course::lesson',['id'=>$course->id,'lessonid'=>$lesson->id])}}">{{$lesson->title}}</a></td>
                        <td>Dr. Steve Palmer</td>
                        <td><div class="btn-group">
                                <a class="btn btn-primary" href="{{route('course::editlesson',['id'=>$course->id,'lesson'=>$lesson->id])}}">Edit</a>
                                <a href="#"
                                   class="btn btn-danger">Delete</a>
                            </div></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@stop