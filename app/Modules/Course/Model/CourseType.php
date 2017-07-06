<?php
namespace App\Modules\Course\Model;
use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 03/07/2017
 * Time: 11:21
 */
class CourseType extends Model
{
    protected $table = "course_type";
    public function getAll(){
        return $this->all();
    }
}