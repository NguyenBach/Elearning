<!--
Author: WebThemez
Author URL: http://webthemez.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="free-educational-responsive-web-template-webEdu">
    <title> Kiddo</title>
    <link rel="favicon" href="{{url('images/favicon.png')}}">
    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('css/bootstrap-theme.css')}}" media="screen">
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <link rel='stylesheet' id='camera-css' href='{{url('css/camera.css')}}'>

</head>
<body>
<div class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span
                        class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            <a class="navbar-brand" href="/">
                <img src="{{url('images/logo.png')}}" alt="Techro HTML5 template"></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav pull-right mainNav">
                <li class="c1 active"><a href="/">Home</a></li>
                <li class="c2"><a href="about.html">About</a></li>
                <li class="c3"><a href="/course">Courses</a></li>
                <li class="c4"><a href="price.html">Price</a></li>
                <li class="c5"><a href="videos.html">Videos</a></li>
                <li class="c6 dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="sidebar-right.html">Right Sidebar</a></li>
                        <li><a href="#">Dummy Link1</a></li>
                        <li><a href="#">Dummy Link2</a></li>
                        <li><a href="#">Dummy Link3</a></li>
                    </ul>
                </li>
                <li class="c7"><a href="contact.html">Contact</a></li>
                <li class="c8" ><a href="/admin">Admin</a></li>

            </ul>
        </div>
    </div>
</div>
<div id="header">
    @section('slider') @show

</div>

<div class="container">
    @section('content')@show
</div>
@section('othercontent')@show
@section('beforefooter')@show


<footer id="footer">

    <div class="container">
        <div class="row">
            <div class="footerbottom">
                <div class="col-md-3 col-sm-6">
                    <div class="footerwidget">
                        <h4>
                            Course Categories
                        </h4>
                        <div class="menu-course">
                            <ul class="menu">
                                <li><a href="#">
                                        List of Technology
                                    </a>
                                </li>
                                <li><a href="#">
                                        List of Business
                                    </a>
                                </li>
                                <li><a href="#">
                                        List of Photography
                                    </a>
                                </li>
                                <li><a href="#">
                                        List of Language
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footerwidget">
                        <h4>
                            Products Categories
                        </h4>
                        <div class="menu-course">
                            <ul class="menu">
                                <li><a href="#">
                                        Individual Plans </a>
                                </li>
                                <li><a href="#">
                                        Business Plans
                                    </a>
                                </li>
                                <li><a href="#">
                                        Free Trial
                                    </a>
                                </li>
                                <li><a href="#">
                                        Academic
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footerwidget">
                        <h4>
                            Browse by Categories
                        </h4>
                        <div class="menu-course">
                            <ul class="menu">
                                <li><a href="#">
                                        All Courses
                                    </a>
                                </li>
                                <li><a href="#">
                                        All Instructors
                                    </a>
                                </li>
                                <li><a href="#">
                                        All Members
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        All Groups
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footerwidget">
                        <h4>Contact</h4>
                        <p>Lorem reksi this dummy text unde omnis iste natus error sit volupum</p>
                        <div class="contact-info">
                            <i class="fa fa-map-marker"></i> Kerniles 416 - United Kingdom<br>
                            <i class="fa fa-phone"></i>+00 123 156 711 <br>
                            <i class="fa fa-envelope-o"></i> youremail@email.com
                        </div>
                    </div><!-- end widget -->
                </div>
            </div>
        </div>
        <div class="social text-center">
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-dribbble"></i></a>
            <a href="#"><i class="fa fa-flickr"></i></a>
            <a href="#"><i class="fa fa-github"></i></a>
        </div>

        <div class="clear"></div>
        <!--CLEAR FLOATS-->
    </div>
    <div class="footer2">
        <div class="container">
            <div class="row">

                <div class="col-md-6 panel">
                    <div class="panel-body">
                        <p class="simplenav">
                            <a href="index.html">Home</a> |
                            <a href="about.html">About</a> |
                            <a href="courses.html">Courses</a> |
                            <a href="price.html">Price</a> |
                            <a href="videos.html">Videos</a> |
                            <a href="contact.html">Contact</a>
                        </p>
                    </div>
                </div>

                <div class="col-md-6 panel">
                    <div class="panel-body">
                        <p class="text-right">
                            Copyright &copy; 2014. Template by <a href="http://webthemez.com/" rel="develop">WebThemez.com</a>
                        </p>
                    </div>
                </div>

            </div>
            <!-- /row of panels -->
        </div>
    </div>
</footer>

<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
<script src="{{url('js/modernizr-latest.js')}}"></script>
<script type='text/javascript' src='{{url('js/jquery.min.js')}}'></script>
<script type='text/javascript' src='{{url('js/fancybox/jquery.fancybox.pack.js')}}'></script>

<script type='text/javascript' src='{{url('js/jquery.mobile.customized.min.js')}}'></script>
<script type='text/javascript' src='{{url('js/jquery.easing.1.3.js')}}'></script>
<script type='text/javascript' src='{{url('js/camera.min.js')}}'></script>
<script src="{{url('js/bootstrap.min.js')}}"></script>
<script src="{{url('js/custom.js')}}"></script>
<script>
    jQuery(function () {

        jQuery('#camera_wrap_4').camera({
            transPeriod: 500,
            time: 3000,
            height: '600',
            loader: 'false',
            pagination: true,
            thumbnails: false,
            hover: false,
            playPause: false,
            navigation: false,
            opacityOnGrid: false,
            imagePath: '{{url('images')}}'
        });

    });

</script>

</body>
</html>
