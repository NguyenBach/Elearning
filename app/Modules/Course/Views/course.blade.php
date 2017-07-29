@extends('Core::template.2columns')
@section('content')
    <div class="courseArchive_content">
        <div class="singlecourse_ferimg_area">
            <div class="singlecourse_ferimg">
                <img src="{{url('img/course-single.jpg')}}" alt="img">
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
            <table class="table table-striped course_table">
                <thead>
                <tr>
                    <th>Lesson Title</th>
                    <th>Instructor</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lessons as $lesson)
                <tr>
                    <td><a href="{{route('course::lesson',['id'=>$course->id,'lessonid'=>$lesson->id])}}">{{$lesson->title}}</a></td>
                    <td>Dr. Steve Palmer</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- start related course -->
        <div class="related_course">
            <h2>More Courses</h2>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="single_course wow fadeInUp" >
                        <div class="singCourse_imgarea">
                            <img src="img/course-1.jpg">
                            <div class="mask">
                                <a class="course_more" href="#">View Course</a>
                            </div>
                        </div>
                        <div class="singCourse_content">
                            <h3 class="singCourse_title"><a href="#">Introduction To Matrix</a></h3>
                            <p class="singCourse_price"><span>$20</span> Per One Month</p>
                            <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                        </div>
                        <div class="singCourse_author">
                            <img alt="img" src="img/author.jpg">
                            <p>Richard Remus, Teacher</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="single_course wow fadeInUp" >
                        <div class="singCourse_imgarea">
                            <img src="img/course-1.jpg">
                            <div class="mask">
                                <a class="course_more" href="#">View Course</a>
                            </div>
                        </div>
                        <div class="singCourse_content">
                            <h3 class="singCourse_title"><a href="#">Introduction To Matrix</a></h3>
                            <p class="singCourse_price"><span>$20</span> Per One Month</p>
                            <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                        </div>
                        <div class="singCourse_author">
                            <img alt="img" src="img/author.jpg">
                            <p>Richard Remus, Teacher</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End related course -->
    </div>
@stop
@section('slider')
    <section id="imgBanner">
        <h2>Course Detail</h2>
    </section>
@stop
@section('sidebar')
    @include('Core::template.sidebar')
@stop