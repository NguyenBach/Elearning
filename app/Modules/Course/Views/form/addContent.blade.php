@extends('Course::index')
@section('content')
    <h2>Add Content</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <?php
        $courseContent = new \App\Modules\Course\Model\CourseContent();
        $courseContent = $courseContent->getLastIndex();
        ?>
        <input type="hidden" name="id" value="{{$courseContent+1}}">
        <input type="hidden" name="course_id" value="{{$course->id}}">
        <label>Title:</label> <input type="text" name="title"><br>
        <label>Content: </label> <textarea name="content" cols="50" rows="20"></textarea><br>
        <label>Media File:</label> <input type="file" name="file"><br>
        <button type="submit">Add</button>
    </form>


@stop