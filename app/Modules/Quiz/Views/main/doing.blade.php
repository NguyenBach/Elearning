@extends('Core::template.1column')
@section('css')

@stop
@section('content')
<style>
    .is_answer{
        background-color: lime;
    }
</style>
<section id="courseArchive">
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
              <div class="col-lg-9 col-md-9 col-sm-9">
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <div class="courseArchive_content">
                        <div class="row">
                          <form id="quiz" action="{{Request::url()}}" method="post">
                            @foreach ($questions as $question)
                                <h4 class="singCourse_price">{!!$loop->iteration . '. ' . $question['question'] !!}</h4>
                                    <?php
                                        $answer = array(
                                            $question['option_0'],
                                            $question['option_1'],
                                            $question['option_2'],
                                            $question['option_3']
                                        );
                                        shuffle($answer);
                                    ?>
                                    <p> <input type="radio" name="{!!$question->id!!}" class="" value="{!!$answer[0]!!}" required> {!! $answer[0] !!} </p>
                                    <p> <input type="radio" name="{!!$question->id!!}" class="" value="{!!$answer[1]!!}" required> {!! $answer[1] !!} </p>
                                    <p> <input type="radio" name="{!!$question->id!!}" class="" value="{!!$answer[2]!!}" required> {!! $answer[2] !!} </p>
                                    <p> <input type="radio" name="{!!$question->id!!}" class="" value="{!!$answer[3]!!}" required> {!! $answer[3] !!} </p>
                                <br>
                            @endforeach
                            <input type="submit" class="btn btn-danger" value="Submit!"></input>
                          </form>
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
@section('script')
    <script type="text/javascript" src="{{ URL::asset('js/jquery.form.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/scripts/quiz-doing.js') }}"></script>
@stop
