@extends('Core::template.2columns_right')
@section('content')
    <section id="lesson" style="margin-top: 100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="lesson-content">
                        <h2>{{$lesson->title}}</h2>
                        <div class="lesson-intro">
                            <p>{{$lesson->summary}}</p>
                        </div>
                        <ul class="nav nav-tabs">
                            @foreach($activities as $key => $activity)
                                <?php
                                $act = \App\Modules\Course\ActivityType::find($activity->type_id);
                                $instance = \Illuminate\Support\Facades\DB::table($act->table)->where('id',$activity->instance)->first();
                                $view[$key] = $act->name . '::' . $instance->template;
                                ?>
                                <li><a data-toggle="tab" href="#{{$activity->id}}">{{$instance->name}}</a></li>

                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @foreach($activities as $key => $activity)
                                <?php if($key == 0) $active = 'active'; else $active=''; ?>
                                <div id="{{$activity->id}}" class="tab-pane fade in {{$active}}">
                                    <?php
                                    $act = \App\Modules\Course\ActivityType::find($activity->type_id);
                                    $instance = \Illuminate\Support\Facades\DB::table($act->table)->where('id',$activity->instance)->first();
//                                    $view = $act->name . '::' . $instance->template;
                                    ?>
                                    @include($view[$key],['activity'=>$activity])
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">

                </div>
            </div>
        </div>
    </section>
@stop
@section('sidebar')
    @include('Core::template.sidebar')
@stop
@section('header')
    @include('Core::template.header')
@stop