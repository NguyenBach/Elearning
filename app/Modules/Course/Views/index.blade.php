@extends('Core::template.index')
@section('content')
    <button onclick="addcourse()">Add Course</button>
    @include('Course::form.addForm')
    <script>
        function addcourse() {
            var a = document.getElementById('addform');
            a.style = "";
        }
    </script>

    <?php
            $courses = new \App\Modules\Course\Model\Course();
            $courses = $courses->all();
    ?>
    @foreach($courses as $course)
    <div style="margin-top: 30px">
        <a href="" style="color: #000">{{$course->name}}</a>
        <p>{{$course->introduction}}</p>
        <i>{{$course->coursetype}}</i>
    </div>
    @endforeach
@stop
@section('slider')
@stop