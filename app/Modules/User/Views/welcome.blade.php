@extends('Core::template.index')
@section('content')
    <div style="text-align: center">
        <h4>Your account: {{$account['username']}} is registed </h4>
        <p><a href="{{route('thangdeptrai')}}">Login</a></p>
    </div>

@stop