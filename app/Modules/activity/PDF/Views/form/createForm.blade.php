<form action="{{route('PDF::add')}}" enctype="multipart/form-data" method="post">
    <h3>PDF</h3>
    <?php if(!isset($activity->activity_instance)){
        $action = 'new';
        $lastid = \App\Modules\activity\PDF\Model\PDF::all()->last();
        if(isset($lastid->id)) {
            $lastid = $lastid->id;
        }else{
            $lastid = 0;
        }
        $activity->activity_instance = $lastid+1;
        $pdf = new \App\Modules\activity\PDF\Model\PDF();
    }  else{
        $action = 'edit';
        $pdf = \App\Modules\activity\PDF\Model\PDF::where('id',$activity->activity_instance)->first();
    }  ?>
    <input type="hidden" name="action" value="{{$action}}">
    <input type="hidden" name="course_id" value="{{$course->id}}">
    <input type="hidden" name="lesson_id" value="{{$lesson->id}}">
    <input type="hidden" name="activity_id" value="{{$activity->id}}">
    <input type="hidden" name="instance" value="{{$activity->activity_instance}}">
    <label for="">Name:</label> <input type="text" name="name" value="{{$pdf->name}}"> <br>
    <label for="">Intro:</label> <textarea name="intro"  cols="30" rows="10">{{$pdf->intro}}</textarea> <br>
    <label for="">PDF:</label> <input type="file" name="pdf" > <br>
    <button type="submit">OK</button>
    <button type="button" onclick="window.location.href='{{route('course::editlesson',['id'=>$course->id,'lessonid'=>$lesson->id])}}'">Cancel</button>
</form>