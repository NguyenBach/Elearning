<form action="" method="post" enctype="multipart/form-data">
    <h2>New Lesson</h2>
    <input type="hidden" name="courseid" value="{{$course->id}}">
    <input type="hidden" name="lessonid" value="{{$lesson->id}}">
    <?php
        if(isset($lesson->title)) $action = 'edit'; else $action = 'new';
    ?>
    <input type="hidden" name="action" value="{{$action}}">
    <label for="">Title: </label> <input  type="text" name="title" value="{{$lesson->title}}"><br>
    <label for="">Summary: </label> <textarea name="summary" cols="30" rows="10">{{$lesson->summary}}</textarea>
    <label for="">Template: </label>
    <select name="template" >
        <option value="1">Lesson Template 1</option>
    </select>
    <button>Add Activity</button>
    <button type="submit">OK</button>
    <button type="button" onclick="window.location.href = '/course/{{$course->id}}'">Cancel</button>
</form>