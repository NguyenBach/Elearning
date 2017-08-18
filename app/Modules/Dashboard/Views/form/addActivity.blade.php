<div id="addActivityForm">
    <h3>Add Activity</h3>
    <input type="hidden" value="{{$course->id}}" name="course_id">
    <input type="hidden" value="{{$lesson->id}}" name="lesson_id">
    <label for="">Select Activity:</label>

    <?php
    $acts = \App\Modules\Course\ActivityType::all();
    ?>
    @foreach($acts as $act)
        <input value="{{$act->id}}" name="activity" type="radio">{{$act->name}} <br>
    @endforeach
    <button type="button" id="addActivityOK">OK</button>
    <button type="button">Cancel</button>
</div>