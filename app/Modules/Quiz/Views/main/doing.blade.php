@extends('Core::template.index')

@section('content')
<section id="courseArchive">
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
              <div class="col-lg-9 col-md-9 col-sm-9">
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <div class="courseArchive_content">
                        <div class="row">
                            @foreach ($questions as $question)
                                <h4 class="singCourse_price">{!!$loop->iteration . '. ' . $question['question'] !!}</h4>

                                <p class="">A. {!! $question['option_0'] !!} </p>
                                <p class="">B. {!! $question['option_1'] !!} </p>
                                <p class="">C. {!! $question['option_2'] !!} </p>
                                <p class="">D. {!! $question['option_3'] !!} </p>
                                <br>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>
</section>

@stop
