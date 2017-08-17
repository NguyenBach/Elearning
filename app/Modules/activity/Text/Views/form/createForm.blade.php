<form action="" enctype="multipart/form-data">
    <h3>New Text</h3>
    <?php if(!isset($activity->activity_instance)){
        $action = 'new';
        $lastid = \App\Modules\activity\Text\Model\TextContent::all()->last()->id;
        $activity->activity_instance = $lastid+1;
        $title = '';
        $content = '';
    }  else{
        $action = 'edit';
        $act = \App\Modules\activity\Text\Model\TextContent::where('id',$activity->activity_instance)->first();
        if(isset($act->id)){
            $title = $act->title;
            $content = $act->content;
        }else {
            $title = ''; $content='';
        }
    }  ?>
    <input type="hidden" name="action" value="{{$action}}">
    <input type="hidden" name="course_id" value="{{$course->id}}">
    <input type="hidden" name="lesson_id" value="{{$lesson->id}}">
    <input type="hidden" name="instance" value="{{$activity->activity_instance}}">
    <label for="">Title:</label> <input type="text" name="title" value="{{$title}}"> <br>
    <label for="">Content:</label> <textarea name="content"  cols="30" rows="10">{{$content}}</textarea> <br>
    <button type="submit">OK</button>
    <button type="button">Cancel</button>
</form>