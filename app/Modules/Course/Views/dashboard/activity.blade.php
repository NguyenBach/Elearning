@extends("Dashboard::index")
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
                        Activity
                    </header>

                    <table class="table">
                        <tbody>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Template</th>
                            <th>Active</th>
                        </tr>
                        @foreach($activities as $key => $act)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$act->name}}</td>
                                <td>{{$act->description}}</td>
                                <td>{{$act->type_template}}</td>
                                <td>{{$act->active}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                </section>
            </div>
        </div>
    </section>
@stop
