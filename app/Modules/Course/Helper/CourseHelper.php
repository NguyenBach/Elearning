<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 16/08/2017
 * Time: 10:54
 */

namespace App\Modules\Course\Helper;


use App\Modules\Course\Model\Course;
use App\Modules\Course\Model\CourseTeacher;
use App\Modules\Course\Model\Lesson;
use App\Modules\Course\Model\LessonModule;

class CourseHelper
{
    public static function checkTeacher($course,$teacher){
        $ct = CourseTeacher::where('user_id',$teacher)->where('course_id',$course)->first();
        if(isset($ct->id)){
            return true;
        } else return false;
    }

    public static function checkCourseExist($courseId){
        $course = Course::find($courseId);
        if(isset($course->id)) {
            return $course;
        }else{
            return 0;
        }
    }
    public static function checkLessonExist($courseId,$lessonId){
        $lesson = Lesson::where('course_id',$courseId)->where('id',$lessonId)->first();
        if(isset($lesson->id)) {
            return $lesson;
        }else{
            return 0;
        }
    }
    public static function checkActivityExist($coursId,$lessonId,$activityId){
        if(!self::checkCourseExist($coursId) || !self::checkLessonExist($coursId,$lessonId)){
            return 0;
        }else{
            $activity = LessonModule::where('course_id',$coursId)->where('lesson_id',$lessonId)
                ->where('id',$activityId)->first();
            if(isset($activity->id)){
                return $activity;
            }else{
                return 0;
            }
        }
    }
}