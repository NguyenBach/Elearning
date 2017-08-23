<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 16/08/2017
 * Time: 10:54
 */

namespace App\Modules\Course\Helper;


use App\Modules\Course\Model\CourseTeacher;

class CourseHelper
{
    public static function checkTeacher($course,$teacher){
        $ct = CourseTeacher::where('user_id',$teacher)->where('course_id',$course)->first();
        if(isset($ct->id)){
            return true;
        } else return false;
    }
}