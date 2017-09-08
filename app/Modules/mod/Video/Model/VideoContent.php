<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 23/08/2017
 * Time: 20:39
 */

namespace App\Modules\mod\Video\Model;


use Illuminate\Database\Eloquent\Model;

class VideoContent extends Model
{
    protected $table = 'video_content';

    public function createInstance($data){
        $this->mod_id = $data['mod_id'];
        $this->url = $data['url'];
        $this->script = $data['script'];
        $this->setCreatedAt(time());
        $success = $this->save();
        if($success){
            return $this->id;
        }else{
            return 0;
        }
    }

    public function updateInstance($data){
        $model = $this->where('mod_id',$data['mod_id'])->first();
        if($data['url'] != ''){
            $model->url = $data['url'];
        }
        $model->script = $data['script'];
        $model->setUpdatedAt(time());
        $success = $model->save();
        if($success) {
            return $model->id;
        }else{
            return 0;
        }
    }
}