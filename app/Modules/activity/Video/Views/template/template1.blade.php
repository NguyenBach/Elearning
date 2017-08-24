<?php
    $video = \App\Modules\activity\Video\Model\VideoContent::where('id',$activity->activity_instance)->first();
?>

<h2>{{$video->name}} </h2>
<p>{{$video->intro}}</p>
<video id="my-video" class="video-js" controls preload="auto" width="640" height="264"
       poster="" data-setup="{}">
    <source src="{{$video->video_link}}" type='video/mp4'>
    <source src="{{$video->video_link}}" type='video/webm'>
    <p class="vjs-no-js">
        To view this video please enable JavaScript, and consider upgrading to a web browser that
        <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
    </p>
</video>
<p>{{$video->video_script}}</p>
