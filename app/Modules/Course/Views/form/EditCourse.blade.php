<form method="post" enctype="multipart/form-data" action="">
    <input type="hidden" name="id" value="{{$course->id}}">
    <input type="hidden" name="action" value="<?php if(isset($course->fullname)) echo 'edit'; else echo 'new';  ?>">
    <label for="">Full Name: </label> <input type="text" name="fullname" placeholder="Full Name" value="{{$course->fullname}}" ><br>
    <label for="">Short Name: </label> <input type="text" name="shortname" placeholder="Short name" value="{{$course->shortname}}"><br>
    <label for="">Introduction: </label> <textarea name="intro"  cols="30" rows="20" >{{$course->introduction}}</textarea> <br>
    <label for="">Feature Picture: </label> <input type="file" name="featurepicture" value="{{$course->feature_picture}}"> <br>
    <label for="">Start Date: </label> <input type="date" name="startdate" value="{{$course->start_date}}"> <br>
    <label for="">Course Format:</label>
    <select name="courseformat" >
        <option value="1">Lesson</option>
    </select><br>
    <label for="">Number Of Lesson: </label> <input type="number" name="numberlessons" value="{{$course->number_lessons}}"><br>
    <label for="">Active: </label>
    <select name="active" >
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select><br>
    <label for="">Visible: </label>
    <select name="visible" >
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select><br>
    <button type="submit">OK</button>
    <button type="button">Cancel</button>
</form>