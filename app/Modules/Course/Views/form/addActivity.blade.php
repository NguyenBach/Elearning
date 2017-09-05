<form id="addActivityForm" action="{{route('course::createActivity')}}" method="post">
    <h3>Add Activity</h3>
    <input type="hidden" value="{{$course->id}}" name="course_id">
    <input type="hidden" value="{{$lesson->id}}" name="lesson_id">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
        <h4 for="">Select Activity:</h4>
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