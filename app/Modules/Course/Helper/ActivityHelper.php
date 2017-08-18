<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 17/08/2017
 * Time: 21:03
 */

namespace App\Modules\Course\Helper;


use App\Modules\Course\ActivityType;

class ActivityHelper
{
    public static function getType($id){
        $act = ActivityType::find($id);
        return $act;
    }
}