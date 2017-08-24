<form action="{{route('Video::add')}}" enctype="multipart/form-data" method="post">
    <h3>Video</h3>
    <?php if(!isset($activity->activity_instance)){
        $action = 'new';
        $lastid = \App\Modules\activity\Video\Model\VideoContent::all()->last();
        if(isset($lastid->id)) {
            $lastid = $lastid->id;
        }else{
            $lastid = 0;
        }
        $activity->activity_instance = $lastid+1;
        $video = new \App\Modules\activity\Video\Model\VideoContent();
    }  else{
        $action = 'edit';
        $video = \App\Modules\activity\Video\Model\VideoContent::where('id',$activity->activity_instance)->first();
    }  ?>
    <input type="hidden" name="action" value="{{$action}}">
    <input type="hidden" name="course_id" value="{{$course->id}}">
    <input type="hidden" name="lesson_id" value="{{$lesson->id}}">
    <input type="hidden" name="activity_id" value="{{$activity->id}}">
    <input type="hidden" name="instance" value="{{$activity->activity_instance}}">
    <label for="">Name:</label> <input type="text" name="name" value="{{$video->name}}"> <br>
    <label for="">Intro:</label> <textarea name="intro"  cols="30" rows="10">{{$video->intro}}</textarea> <br>
    <label for="">Video:</label> <input type="file" name="video" > <br>
    <label for="">Video Script:</label>
    <textarea name="videoscript"  cols="30" rows="10">{{$video->videoscript}}</textarea>
    <button type="submit">OK</button>
    <button type="button">Cancel</button>
</form>