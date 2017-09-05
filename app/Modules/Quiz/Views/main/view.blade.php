{{--@extends('Core::template.index')--}}
{{--@section('css')--}}
    {{--<link href="{{url('js/DataTables-1.10.12/media/css/jquery.dataTables.css')}}" rel="stylesheet">--}}
{{--@stop--}}
{{--@section('content')--}}
    <?php
            if(isset($activity->instance)){
                $quiz = \App\Modules\Quiz\Models\Quiz::find($activity->instance);
            }
    ?>
<section id="quiz">
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <div class="courseArchive_content">
                                <div class="row">
                                    <h3 class="singCourse_title singCourse_price">Name : {!! $quiz['name'] !!}</h3>
                                    <h3 class="singCourse_title">Description :</h3>
                                    <div class="col-lg-12">
                                        <p>{!! $quiz['description'] !!}</p>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <a class="btn btn-lg btn-danger pull-right" href="{{ route('Quiz::doing',['id'=>$quiz['id']])}}">Start !</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



{{--@stop--}}
{{--@section('slider')--}}
    {{--<section id="imgBanner">--}}
        {{--<h2>{{ $quiz->name }}</h2>--}}
    {{--</section>--}}


{{--@stop--}}

{{--@section('script')--}}
{{--@stop--}}
