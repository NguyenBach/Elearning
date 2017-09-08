<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 08/09/2017
 * Time: 07:58
 */

namespace App\Modules\mod\Video\Model;


use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'video';

    public function createInstance($data){
        $this->course_id = $data['course_id'];
        $this->lesson_id = $data['lesson_id'];
        $this->name = $data['name'];
        $this->description = $data['description'];
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
        $model = $this->find($data['id']);
        $model->name = $data['name'];
        $model->description = $data['description'];
        $model->template = $data['template'];
        $model->setUpdatedAt(time());
        $success = $model->save();
        if($success){
            return $model->id;
        }else{
            return 0;
        }
    }

    public function deleteInstance($data){

    }
}