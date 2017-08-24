<div id="addActivityForm">
    <h3>Add Activity</h3>
    <input type="hidden" value="{{$course->id}}" name="course_id">
    <input type="hidden" value="{{$lesson->id}}" name="lesson_id">
    <label for="">Name: </label><input type="text" name="name"><br>
    <label for="">Description: </label>
    <textarea name="description"  cols="30" rows="10"></textarea><br>
    <label for="">Select Activity:</label>
    <select name="activity" id="activity" >
        <?php
        $acts = \App\Modules\Course\ActivityType::all();
        ?>
        @foreach($acts as $act)
                <option value="{{$act->id}}">{{$act->name}}</option> <br>
        @endforeach

    </select>

    <button type="button" id="addActivityOK">OK</button>
    <button type="button">Cancel</button>
</div>