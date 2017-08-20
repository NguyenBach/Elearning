@extends('Core::template.index')
@section('css')
    <link href="{{url('js/DataTables-1.10.12/media/css/jquery.dataTables.css')}}" rel="stylesheet">
@stop
@section('content')
<section id="courseArchive">
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-md-10 col-sm-10">
            <div class="courseArchive_content">
                <div class="row">
        <!-- start Quiz list -->
        <?php foreach ($quizzes as $quiz): ?>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="single_course wow fadeInUp">
                                <div class="singCourse_imgarea">
                                    <img src="img/quiz.jpg" />
                                    <div class="mask">
                                      <a href="{{ URL::to('quiz/'.$quiz->id)}}" class="course_more">View Quiz</a>
                                    </div>
                                </div>
                                <div class="singCourse_content">
                                    <h3 class="singCourse_title" style="height: 60px; overflow: hidden;">
                                        <a href="{{ URL::to('quiz/'.$quiz->id)}}">{{ $quiz->name }}</a>
                                    </h3>
                                    <!-- <p class="singCourse_price"><span>$20</span> Per One Month</p> -->
                                    <p style="height: 100px;max-height: 100px; overflow: hidden;">{{ $quiz->description }}</p>
                                </div>
                            </div>
                        </div>
        <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@stop
@section('slider')
    <section id="imgBanner">
        <h2>Quiz</h2>
    </section>


@stop

@section('script')
@stop
