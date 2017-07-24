<!DOCTYPE html>
<html lang="en">
@include('Core::template.head')
<body>

<!-- SCROLL TOP BUTTON -->
<a class="scrollToTop" href="#"></a>
<!-- END SCROLL TOP BUTTON -->

<!--=========== BEGIN HEADER SECTION ================-->
@include('Core::template.header')
<!--=========== END HEADER SECTION ================-->

<!--=========== BEGIN GALLERY SECTION ================-->
<section id="errorpage">
    <div class="container">
        <div class="error_page_content">
            <h1>404</h1>
            <h2>Sorry :(</h2>
            <h3>This page doesn't exist.</h3>
            <p class="wow fadeInLeftBig animated" style="visibility: visible; animation-name: fadeInLeftBig;">Please, continue to our <a href="index.html">Home page</a></p>
        </div>
    </div>
</section>
<!--=========== END GALLERY SECTION ================-->

<!--=========== BEGIN FOOTER SECTION ================-->
@include('Core::template.footer')
<!--=========== END FOOTER SECTION ================-->


@include('Core::template.script')
</body>
</html>