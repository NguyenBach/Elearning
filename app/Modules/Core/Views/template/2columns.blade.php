<!DOCTYPE html>
<html lang="en">
@include('Core::template.head')
<body>

<a class="scrollToTop" href="#"></a>
@include('Core::template.header')
@section('slider')@show
<section id="courseArchive">
    <div class="container">
        <div class="row">
            <!-- start course content -->
            <div class="col-lg-8 col-md-8 col-sm-8">
                @section('content') @show
            </div>
            <!-- End course content -->

            <!-- start course archive sidebar -->
            <div class="col-lg-4 col-md-4 col-sm-4">
                @section('sidebar') @show
            </div>
            <!-- start course archive sidebar -->
        </div>
    </div>
</section>
@include('Core::template.footer')
@include('Core::template.script')
</body>
</html>