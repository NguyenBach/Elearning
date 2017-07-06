<form style="display: none" id="addform" method="POST" action="/course/addcourse">
    <h3>Add Course</h3>
    <?php $course = new App\Modules\Course\Model\Course();
    $course = $course->getLastIndex();
    ?>
    <input type="hidden" name="id" value="{{$course+1}}">
    <label>Name: </label> <input type="text" name="name"><br>
    <label>Introduction: </label> <input type="textarea" name="intro"> <br>
    <label>Course Type: </label>
    <select name="course-type">
        <?php $courseType = new App\Modules\Course\Model\CourseType();
                $courseType = $courseType->getAll();
        ?>
        @foreach($courseType as $type)
                <option value="{{$type->id}}">{{$type->name}}</option>
            @endforeach

    </select> <br>
    <button type="submit">Add</button>
</form>