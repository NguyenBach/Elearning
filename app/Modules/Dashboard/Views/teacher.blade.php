@extends('Dashboard::index')
@section('mainContent')
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                    <li><i class="fa fa-laptop"></i>Danh sách course của bạn</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Danh sách course của bạn
                    </header>
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>#</th>
                            <th>Tên course</th>
                            <th>Ngay tao</th>
                            <th>
                                <i class="icon-cogs"></i>
                                Action
                            </th>
                        </tr>
                        @foreach($courses as $key => $course)
                            <tr onclick="window.location.href='/dashboard/course/{{$course[0]['id']}}'">
                                <td>{{$key}}</td>
                                <td>{{$course[0]['fullname']}}</td>
                                <td>{{$course[0]['created_at']}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-primary"
                                           href="{{route('dashboard::edit',['id'=>$course[0]['id']])}}">Edit</a>
                                        <a href="{{route('course::courseview',['id'=>$course[0]['id']])}}"
                                           class="btn btn-danger">View</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                </section>
            </div>
        </div>
    </section>
@stop
