<?php
    $video = \App\Modules\mod\Video\Model\Video::where('id',$activity->instance)->first();
    $videoContent = \App\Modules\mod\Video\Model\VideoContent::where('mod_id',$video->id)->first();
?>

<h2>{{$video->name}} </h2>
<p>{{$video->description}}</p>
<video id="my-video" class="video-js" controls preload="auto" width="640" height="264"
       poster="" data-setup="{}">
    <source src="{{$videoContent->url}}" type='video/mp4'>
    <source src="{{$videoContent->url}}" type='video/webm'>
    <p class="vjs-no-js">
        To view this video please enable JavaScript, and consider upgrading to a web browser that
        <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
    </p>
</video>
<p>{{$videoContent->script}}</p>
