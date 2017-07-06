<!doctype html>
<html>
<head>
    <title>VictoryPro</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="{{url('css/style.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{url('css/coin-slider.css')}}"/>
    <link rel="stylesheet" href="{{url('css/style.css')}}">
</head>
<body>
<div class="main">
    <div class="header">
        <div class="header_resize">
            <div class="menu_nav">
                <ul>
                    <li class="active"><a href="/"><span>Home Page</span></a></li>
                    <li><a href="support.html"><span>Support</span></a></li>
                    <li><a href="about.html"><span>About Us</span></a></li>
                    <li><a href="blog.html"><span>Blog</span></a></li>
                    <li><a href="contact.html"><span>Contact Us</span></a></li>
                </ul>
            </div>
            <div class="logo">
                <h1><a href="index.html">Victory<span>Pro</span></a></h1>
            </div>
            <div class="clr"></div>
            <div class="clr"></div>
        </div>
    </div>
    <div class="header_resize ">
        @section('slider')@show
    </div>
    <div class="content">
        <div class="content_resize">
            <div class="mainbar">
                @section('content') @show
            </div>
            <div class="sidebar">
                @include('Core::template.sidebar')
            </div>
            <div class="clr"></div>
        </div>
    </div>

    <div class="footer">
        <div class="footer_resize">
            <p class="lf">Copyright &copy; <a href="#">Domain Name</a>. All Rights Reserved</p>
            <p class="rf">Design by <a target="_blank" href="http://www.dreamtemplate.com/">DreamTemplate</a></p>
            <div style="clear:both;"></div>
        </div>
    </div>
</div>


<script type="text/javascript" src="{{url('js/cufon-yui.js')}}"></script>
<script type="text/javascript" src="{{url('js/cufon-georgia.js')}}"></script>
<script type="text/javascript" src="{{url('js/jquery-1.4.2.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/script.js')}}"></script>
<script type="text/javascript" src="{{url('js/coin-slider.min.js')}}"></script>
</body>
</html>