@extends('Core::template.index')
@section('css')
    <link href="{{url('js/DataTables-1.10.12/media/css/jquery.dataTables.css')}}" rel="stylesheet">
@stop
@section('content')
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="single_course wow fadeInUp">
            <div class="singCourse_imgarea">
                <img src="img/course-1.jpg"/>
                <div class="mask">
                    <a href="" class="course_more">View Course</a>
                </div>
            </div>
            <div class="singCourse_content">
                <h3 class="singCourse_title"><a href="{{}}">fullname</a></h3>
                <p class="singCourse_price"><span>Number Lessons:</span>number_lessons</p>
                <p>introduction</p>
            </div>
            <div class="singCourse_author">
                <img src="img/author.jpg" alt="img">
                <p>Richard Remus, Teacher</p>
            </div>
        </div>
    </div>

@stop
@section('slider')
    <section id="imgBanner">
        <h2>Question Sets</h2>
    </section>


@stop

@section('script')
@stop
