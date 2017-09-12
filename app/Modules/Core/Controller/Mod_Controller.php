<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 10/09/2017
 * Time: 20:46
 */

namespace App\Modules\Core\Controller;


use App\Http\Controllers\Controller;
use App\Modules\Core\Helper\Core;
use App\Modules\Course\ActivityType;
use App\Modules\Course\Helper\CourseHelper;
use App\Modules\Course\Model\LessonModule;
use Illuminate\Http\Request;

abstract class Mod_Controller extends Controller
{
    protected $modName;

    /**
     * function to add a new mod instance
     * @return redirect to page edit lesson
     */
    public abstract function add(Request $request);

    /**
     * function to show form
     *
     * @return view createForm with course,lesson,action,activity if have
     */
    public function form(Request $request){
        $courseId = $request->input('course_id');
        $lessonId = $request->input('lesson_id');
        $activityId = $request->input('activity_id');
        if (isset($activityId)) {
            $action = 'edit';
            if (CourseHelper::checkActivityExist($courseId, $lessonId, $activityId)) {
                $activity = CourseHelper::checkActivityExist($courseId, $lessonId, $activityId);
            } else {
                return redirect()->back()->with('message', 'Error');
            }
        } else {
            $action = 'new';
            $activity = new LessonModule();
        }
        if (CourseHelper::checkCourseExist($courseId)) {
            $course = CourseHelper::checkCourseExist($courseId);
        } else {
            return redirect()->back()->with('message', 'Error');
        }
        if (CourseHelper::checkLessonExist($courseId, $lessonId)) {
            $lesson = CourseHelper::checkLessonExist($courseId, $lessonId);
        } else {
            return redirect()->back()->with('message', 'Error');
        }

        return view($this->modName.'::form.createForm', ['course' => $course, 'lesson' => $lesson, 'action' => $action, 'activity' => $activity]);

    }


    /**
     * get type id of module
     * @return int
     */
    protected function getType(){
        if($this->modName == ''){
            return 0;
        }
        $type = ActivityType::where('name', $this->modName)->first();
        return $type->id;
    }

    public function uploadFile(Request $request, $inputName)
    {
        $file = $request->file($inputName);
        if (!isset($file)) {
            return '';
        }
        $url = Core::upload($file,$this->modName);
        return $url;
    }
}