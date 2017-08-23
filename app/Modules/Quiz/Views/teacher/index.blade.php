@extends('Dashboard::index')
@section('css')
    <link href="{{url('js/DataTables-1.10.12/media/css/jquery.dataTables.css')}}" rel="stylesheet">
@stop
@section('mainContent')
<div class="col-md-12">
    <div class="panel">
        <div class="panel-body">
            <div class="page-header">
              <h2><b>Quiz List</b></h2>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered table-responsive table-hover" id="quiz-table">
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
@section('script')
<script type="text/javascript" src="{{ URL::asset('js/DataTables-1.10.12/media/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/scripts/quiz.datatables.js') }}"></script>
@stop
