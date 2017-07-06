<?php
namespace App\Modules\Course\Model;


use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 03/07/2017
 * Time: 11:21
 */
class CourseContent extends Model
{
    protected $table = 'course_content';
    public function getLastIndex(){
        $a =  $this->all()->last();
        if(is_null($a)) return 0;
        else return $a->id;
    }
}