<form action="{{route('Quiz::add')}}" enctype="multipart/form-data" method="post">
    <h3>Quiz</h3>
    <input type="hidden" name="course_id" value="{{$course->id}}">
    <input type="hidden" name="lesson_id" value="{{$lesson->id}}">
    <input type="hidden" name="activity_id" value="{{$activity->id}}">
    <label for="">Quiz:</label>
    <select name="quiz">
        <?php
        $quizes = \App\Modules\Quiz\Models\Quiz::all();
        ?>
        @foreach($quizes as $quiz)
            <option value="{{$quiz->id}}">{{$quiz->name}}</option>
        @endforeach
    </select>
    <button type="submit">OK</button>
    <button type="button">Cancel</button>
</form>