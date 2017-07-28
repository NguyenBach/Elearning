<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 20/07/2017
 * Time: 22:09
 */

namespace App\Modules\Course\Model;


use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';



    public function addCourse($data){
        $this->id = $data['id'];
        $this->fullname = $data['fullname'];
        $this->shortname = $data['shortname'];
        $this->introduction = $data['intro'];
        $this->feature_picture = $data['picture'];
        $this->start_date = $data['startdate'];
        $this->course_format = $data['courseformat'];
        $this->number_lessons = $data['numberlessons'];
        $this->active = $data['active'];
        $this->visiblea = 1;
        $this->setCreatedAt(time());
        $id = $this->save();
        return $id;
    }

    public function deleteCourse($condition){

    }

    public function updateCourse($id,$update){
        $course = $this->find($id);
        foreach ($update as $key => $value){
            $course->$key = $value;
        }
        $id = $course->save();
        return $id;
    }
    public function getLastIndex(){
        $course = self::all()->last();
        if(is_null($course)){
            return 0;
        }
        return $course->id;
    }

    public function getAllActiveCourse(){
        return $this->where('active',1)->where('visiblea',1)->get();
    }
    public function get10FirstCourse(){
        return $this->orderBy('created_at','desc')->limit(10)->get();
    }
}