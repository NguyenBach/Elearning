<!DOCTYPE html>
<html lang="en">
@section('head')
    <head>
        @include('Core::template.head')
        @section('css')
    </head>
@show
<body>
<a class="scrollToTop" href="#"></a>
<header id="header">
    @section('header') @show
</header>
<section id="slider">
    @section('slider')@show
</section>
<section id="courseArchive">
    <div class="container">
        <div class="row">
            {{--main content--}}
            <div class="col-lg-8 col-md-8 col-sm-8">
                @section('content') @show
            </div>
            {{--right sidebar--}}
            <div class="col-lg-4 col-md-4 col-sm-4">
                @section('sidebar') @show
            </div>
        </div>
    </div>
</section>
<footer id="footer">
    @include('Core::template.footer')
</footer>
<section id="script">
    @include('Core::template.script')
    @section('script')
    @show
</section>
</body>
</html>