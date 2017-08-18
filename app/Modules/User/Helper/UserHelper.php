<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 16/08/2017
 * Time: 10:45
 */

namespace App\Modules\User\Helper;


use App\Modules\User\Model\Permission;

class UserHelper
{
    public static function getAllPermission(){
        $userid = session('user_id');
        if(!isset($userid)){
            return ['guest'=>1,'teacher'=>0,'student'=>0];
        }
        $permission = Permission::where('user_id',$userid)->get();
        $teacher = 0;
        $student = 0;
        foreach ($permission as $p){
            if($p->permission == 'teacher'){
                $teacher = 1;
            }
            if($p->permission == 'student' ){
                $student = 1;
            }
        }
        return ['teacher'=>$teacher,'student'=>$student,'guest'=>0];
    }
}