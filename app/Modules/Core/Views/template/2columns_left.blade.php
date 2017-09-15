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
            {{--left sidebar--}}
            <div class="col-lg-2 col-md-2 col-sm-2">
                @section('sidebar') @show
            </div>
            {{--main content--}}
            <div class="col-lg-10 col-md-10 col-sm-10">
                @section('content') @show
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