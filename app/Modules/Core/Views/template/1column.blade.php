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
<section id="content">
    @section('content')@show
</section>
<footer id="footer">
    @section('footer')
    @show
    @include('Core::template.footer')
</footer>
<section id="script">
    @include('Core::template.script')
    @section('script')
    @show
</section>
</body>
</html>