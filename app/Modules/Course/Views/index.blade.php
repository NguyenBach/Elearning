@extends('Core::template.2columns')
@section('content')
    <div class="courseArchive_content">
        <div class="row">
            @foreach($courses as $course)
            <!-- start single course -->
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="single_course wow fadeInUp">
                    <div class="singCourse_imgarea">
                        <img src="img/course-1.jpg"/>
                        <div class="mask">
                            <a href="{{route('course::show',['id'=>$course->id])}}" class="course_more">View Course</a>
                        </div>
                    </div>
                    <div class="singCourse_content">
                        <h3 class="singCourse_title"><a href="{{route('course::show',['id'=>$course->id])}}">{{$course->fullname}}</a></h3>
                        <p class="singCourse_price"><span>Number Lessons:</span> {{$course->number_lessons}}</p>
                        <p>{{$course->introduction}}</p>
                    </div>
                    <div class="singCourse_author">
                        <img src="img/author.jpg" alt="img">
                        <p>Richard Remus, Teacher</p>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- End single course -->
        </div>
        <!-- start previous & next button -->
        <div class="single_blog_prevnext">
            <a href="#" class="prev_post wow fadeInLeft animated"
               style="visibility: visible; animation-name: fadeInLeft;"><i class="fa fa-angle-left"></i>Previous</a>
            <a href="#" class="next_post wow fadeInRight animated"
               style="visibility: visible; animation-name: fadeInRight;">Next<i class="fa fa-angle-right"></i></a>
        </div>
    </div>
@stop
@section('slider')
    <section id="imgBanner">
        <h2>Course Archive</h2>
    </section>
@stop
@section('sidebar')
@include('Core::template.sidebar')
@stop