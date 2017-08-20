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


    public function addCourse($data)
    {
        $this->id = $data['id'];
        $this->fullname = $data['fullname'];
        $this->shortname = $data['shortname'];
        $this->introduction = $data['intro'];
        $this->feature_picture = $data['picture'];
        $this->start_date = $data['startdate'];
        $this->course_format = $data['courseformat'];
        $this->number_lessons = $data['numberlessons'];
        $this->active = $data['active'];
        $this->visiblea = $data['visible'];
        $this->setCreatedAt(time());
        $id = $this->save();
        return $id;
    }

    public function deleteCourse($condition)
    {

    }

    public function updateCourse($id, $data)
    {
        $course = $this->find($id);
        $course->fullname = $data['fullname'];
        $course->shortname = $data['shortname'];
        $course->introduction = $data['intro'];
        if($data['picture'] != '') $course->feature_picture = $data['picture'];
        $course->start_date = $data['startdate'];
        $course->course_format = $data['courseformat'];
        $course->number_lessons = $data['numberlessons'];
        $course->active = $data['active'];
        $course->visiblea = $data['visible'];
        $course->setUpdatedAt(time());
        $id = $course->save();
        return $id;
    }

    public function getLastIndex()
    {
        $course = self::all()->last();
        if (is_null($course)) {
            return 0;
        }
        return $course->id;
    }

    public function getAllActiveCourse()
    {
        return $this->where('active', 1)->where('visible', 1)->get();
    }

    public function get10FirstCourse()
    {
        return $this->orderBy('created_at', 'desc')->limit(10)->get();
    }

    public function getNumberCourse($courseid)
    {
        $course = $this->find($courseid);
        if (isset($course->id))
            return $course->number_lessons;
        else return 0;
    }
}
