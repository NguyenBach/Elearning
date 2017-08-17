@extends('Core::template.index')
@section('css')
    <link href="{{url('js/DataTables-1.10.12/media/css/jquery.dataTables.css')}}" rel="stylesheet">
@stop
@section('content')
<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <a class="panel-title" href="{{ URL::previous() }}">< Back</a>
            <h3 class="panel-title">Question Sets Management</h3>
        </div>
        <div class="panel-body">
            <a class="btn btn-large btn-success" href="{{ URL::to('/questionset/generate') }}">Generate set</a>
            <div class="col-md-11 col-md-offset-1">
                <table class="table table-bordered table-responsive table-hover" id="question-sets-table">
                   <thead>
                       <tr>
                           <th>ID</th>
                           <th>Question Sets</th>
                           <th>Description</th>
                           <th>Total</th>
                           <th>Actions</th>
                       </tr>
                   </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@stop
@section('slider')
    <section id="imgBanner">
        <h2>Question Banks</h2>
    </section>


@stop

@section('sidebar')
@include('Core::template.sidebar')
@stop
@section('script')
<script type="text/javascript" src="{{ URL::asset('js/DataTables-1.10.12/media/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/scripts/list_question_set.datatables.js') }}"></script>
@stop
