<!DOCTYPE html>
<html lang="en">
@section('head')
    @include('Core::template.head')
    @section('css')
@show
<body>

<a class="scrollToTop" href="#"></a>
@section('header')
{{--    @include('Core::template.header')--}}
@show
@section('slider')@show
@section('content')@show
@section('footer')
    @include('Core::template.footer')

@show
@include('Core::template.script')
@section('script')
@show
</body>
</html>