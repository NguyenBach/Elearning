<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 10/08/2017
 * Time: 10:38
 */

namespace App\Modules\Course\Controller;


use App\Http\Controllers\Controller;
use App\Modules\Course\ActivityType;
use App\Modules\Course\Model\Course;
use App\Modules\Course\Model\Lesson;
use App\Modules\Course\Model\LessonActivity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    private $activity;

    public function __construct()
    {
        $this->activity = new ActivityType();
    }

    public function getAllActivityType()
    {
        $acts = $this->activity->where('active',1)->get();
        $a = [];
        foreach ($acts as $act) {
            $b = [
                'id' => $act->id,
                'name' => $act->name,
                'description' => $act->description
            ];
            $a[] = $b;
        }
        return response()->json($a);
    }

    public function newActivityForm(Request $request){
        $act = $request->input('activity');
        $courseId = $request->input('course_id');
        $lessonId = $request->input('lesson_id');
        $name =  $request->input('name');
        $description = $request->input('description');
        $act = ActivityType::find($act);
        $view = $act->name.'::form.createForm';
        $course = Course::find($courseId);
        $lesson = Lesson::where('course_id',$courseId)->where('id',$lessonId)->first();
        $activity = new LessonActivity();
        $activity->course_id = $courseId;
        $activity->lesson_id = $lessonId;
        $activity->name = $name;
        $activity->description = $description;
        $activity->type_id = $act->id;
        $activity->save();
        $route = $act->name . '::addForm';
        return redirect()->route($route,['course_id'=>$course->id,'lesson_id'=>$lesson->id,'activity_id'=>$activity->id]);
    }
}