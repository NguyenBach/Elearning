<div class="menu_area">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- LOGO -->
                <a class="navbar-brand" href="{{route('index')}}">Elearning</a>

            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
                    <li class="active"><a href="{{route('index')}}">Home</a></li>
                    <li><a href="{{route('course::index')}}">Course</a></li>
                    <li></li>
                    @if(!session('permission') )
                        <li><a href="{{route('thangdeptrai')}}">Login</a></li>
                    @else
                        <li><a href="{{route('dashboard::index')}}">Admin</a></li>
                        <li><a href="{{route('logout')}}">Logout</a></li>
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</div>
<div class="clear"></div>
