<header id="header">
    <!-- BEGIN MENU -->
    <div class="menu_area">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                            aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- LOGO -->
                    <!-- TEXT BASED LOGO -->
                    <a class="navbar-brand" href="index.html">WpF <span>Degree</span></a>
                    <!-- IMG BASED LOGO  -->
                    <!-- <a class="navbar-brand" href="index.html"><img src="img/logo.png" alt="logo"></a>  -->

                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
                        <li class="active"><a href="index.html">Home</a></li>
                        <li><a href="course-archive.html">Course</a></li>
                        <li><a href="scholarship.html">Scholarship</a></li>
                        <li><a href="events-archive.html">Events</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="blog-archive.html">Blog</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">Page<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="404.html">404 Page</a></li>
                                <li><a href="#">Link Two</a></li>
                                <li><a href="#">Link Three</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact</a></li>
                        @if(!session('permission') )
                            <li><a href="/login">Login</a></li>
                        @else
                            <li><a href="/admin">Admin</a></li>
                        @endif
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
    </div>
    <!-- END MENU -->
</header>
