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
use App\Modules\Course\Helper\CourseHelper;
use App\Modules\Course\Model\Course;
use App\Modules\Course\Model\Lesson;
use App\Modules\Course\Model\LessonModule;
use App\Modules\User\Helper\UserHelper;
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

    /**
     * Redirect to create form of Activity
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createActivity(Request $request){
        $act = $request->input('activity');
        $courseId = $request->input('course_id');
        $lessonId = $request->input('lesson_id');
        $act = ActivityType::find($act);
        if(!isset($act->id)){
            return redirect()->back()->with('message','Error');
        }
        if(CourseHelper::checkCourseExist($courseId)){
            $course = CourseHelper::checkCourseExist($courseId);
        }else{
            return redirect()->back()->with('message','Error');
        }
        if(CourseHelper::checkLessonExist($courseId,$lessonId)){
            $lesson = CourseHelper::checkLessonExist($courseId,$lessonId);
        }else{
            return redirect()->back()->with('message','Error');
        }
        $route = $act->name . '::addForm';
        return redirect()->route($route,['course_id'=>$course->id,'lesson_id'=>$lesson->id]);
    }

    public function deleteActivity(Request $request){
        $courseId = $request->input('course_id');
        $lessonId = $request->input('lesson_id');
        $activityId = $request->input('activity_id');
        $permission = UserHelper::getAllPermission();
        if($permission['teacher'] == 0){
            return redirect('/');
        }
        $course = Course::find($courseId);
        if(!isset($course->id)){
            return response()->json(['success'=>0]);
        }
        $lesson = Lesson::where('course_id',$courseId)->where('id',$lessonId)->first();
        if(!isset($lesson->id)){
            return response()->json(['success'=>0]);
        }
        $activity = LessonModule::where('course_id',$courseId)->where('lesson_id',$lessonId)->where('id',$activityId)->first();
        if(!isset($activity->id)){
            return response()->json(['success'=>0]);
        }
        $ls = new LessonModule();
        $success = $ls->deleteActivity($activityId);
        return response()->json(['success'=>$success]);
    }

    public function dashboard_index(){
        $acts = ActivityType::all();
        return view('Course::dashboard.activity',['activities' => $acts]);
    }
}