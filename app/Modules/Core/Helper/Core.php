<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 10/09/2017
 * Time: 20:28
 */

namespace App\Modules\Core\Helper;


class Core
{
    public static function getCurrentCourse(){}
    public static function getCurrentUser(){}
    public static function getCurrentLesson(){}
    public static function getCurrentActivity(){}

    public static function upload($fileUpload,$saveFolder,$fileName = ''){
        if($fileName != ''){
            $name = $fileName;
        }else{
            $name = $fileUpload->getClientOriginalName();
            $name .= '_'.time();
        }
        $savePath = storage_path('/app/public'.$saveFolder);
        $fileUpload->move($savePath,$name);
        $url = url('storage/'.$saveFolder.'/'.$name);
        return $url;
    }
}