@extends("Course::index")
@section("content")
    <h1>{{$content->course_title}}</h1>
    <audio src="{{url($content->course_media_url)}}" type="audio/mpeg" controls="controls"></audio>
    <h3>Listen Script</h3>
    <p>
        {{$content->course_content}}
    </p>
    <button>Question</button>
@stop