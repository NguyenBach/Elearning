<form id="addActivityForm" action="{{route('course::newform')}}" method="post">
    <h3>Add Activity</h3>
    <input type="hidden" value="{{$course->id}}" name="course_id">
    <input type="hidden" value="{{$lesson->id}}" name="lesson_id">
<div class="form-group">
    <label for="">Name: </label>
    <input class="form-control" type="text" name="name">
</div>
    <div class="form-group">
        <label for="">Description: </label>
        <textarea name="description" class="form-control"  cols="30" rows="10"></textarea>
    </div>
<div class="form-group">
    <label for="">Select Activity:</label>
    <select name="activity" id="activity" class="form-control">
        <?php
        $acts = \App\Modules\Course\ActivityType::all();
        ?>
        @foreach($acts as $act)
            <option value="{{$act->id}}">{{$act->name}}</option> <br>
        @endforeach

    </select>
</div>
    <button type="submit" class="btn btn-success">OK</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
</form>