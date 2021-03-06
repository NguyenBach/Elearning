@extends('Core::template.2columns_left')
@section('css')
    {{--<link href="{{url('dashboard-css/css/bootstrap-theme.css')}}" rel="stylesheet">--}}
    {{--<link href="{{url('dashboard-css/css/elegant-icons-style.css')}}" rel="stylesheet"/>--}}
    {{--<link href="{{url('dashboard-css/css/style.css')}}" rel="stylesheet">--}}
    {{--<link href="{{url('dashboard-css/css/style-responsive.css')}}" rel="stylesheet"/>--}}
@stop
@section('header')
    @include('Core::template.header')
@stop
@section('sidebar')
    <div>
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="">
                <a class="" href="{{route('dashboard::index')}}">
                    <i class="icon_house_alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="">
                <a class="" href="{{route('CourseDashboard::index')}}">
                    <i class="icon_house_alt"></i>
                    <span>Course</span>
                </a>
            </li>

            <li class="">
                <a class="" href="{{route('ActivityDashboard::index')}}">
                    <i class="icon_house_alt"></i>
                    <span>Activity</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_documents"></i>
                    <span>Quiz</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="active" href="{{ URL::to('teacher/quiz')}}">List</a></li>
                    <li><a class="active" href="{{ URL::to('teacher/quiz/create')}}">Create</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_documents"></i>
                    <span>Question Banks</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="active" href="{{ URL::to('teacher/questionbank')}}">List</a></li>
                    <li><a class="active" href="{{ URL::to('teacher/questionbank/create')}}">Create</a></li>
                </ul>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
@stop
@section('content')
@section('mainContent')@show
@stop


@section('footer')
@stop