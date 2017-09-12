<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 20/07/2017
 * Time: 22:09
 */

namespace App\Modules\Course\Model;


use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lesson';

    public function addLesson($data){
        $this->course_id = $data['courseid'];
        $this->title = $data['title'];
        $this->summary = $data['summary'];
        $this->lesson_template = $data['template'];
        $this->setCreatedAt(time());
        $success = $this->save();
        if($success){
            return $this->id;
        }else {
            return 0;
        }
    }
    public function updateLesson($data){
        $lessonid = $data['lessonid'];
        $courseid = $data['courseid'];
        $lesson = $this->where('course_id',$courseid)->where('id',$lessonid)->first();
        $lesson->title = $data['title'];
        $lesson->summary = $data['summary'];
        $lesson->lesson_template = $data['template'];
        $lesson->setUpdatedAt(time());
        $success = $lesson->save();
        if($success){
            return $lessonid;
        }else {
            return 0;
        }
    }
    public function getNumberLesson($courseid){
        $lesson = $this->where('course_id',$courseid)->get();
        return count($lesson);
    }
}