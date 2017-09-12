<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 23/08/2017
 * Time: 20:39
 */

namespace App\Modules\mod\PDF\Model;


use Illuminate\Database\Eloquent\Model;

class PDF extends Model
{
    protected $table = 'pdf';

    public function createInstance($data){
        $this->name = $data['name'];
        $this->description = $data['description'];
        $this->course_id = $data['course_id'];
        $this->lesson_id = $data['lesson_id'];
        $this->template = $data['template'];
        $this->setCreatedAt(time());
        $success = $this->save();
        if($success){
            return $this->id;
        }else{
            return 0;
        }
    }

    public function updateInstance($data){
        $text = $this->find($data['id']);
        $text->name = $data['name'];
        $text->description = $data['description'];
        $text->template = $data['template'];
        $text->setUpdatedAt(time());
        $success = $text->save();
        if($success){
            return $text->id;
        }else{
            return 0;
        }
    }
}