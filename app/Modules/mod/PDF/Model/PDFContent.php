<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 12/09/2017
 * Time: 08:46
 */

namespace App\Modules\mod\PDF\Model;


use Illuminate\Database\Eloquent\Model;

class PDFContent extends Model
{
    protected $table = 'pdf_content';

    public function createInstance($data){
        $this->mod_id = $data['mod_id'];
        $this->title = $data['title'];
        $this->url = $data['url'];
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
        $model->title = $data['title'];
        if($data['url'] != ''){
            $model->url = $data['url'];
        }
        $model->setUpdatedAt(time());
        $success = $model->save();
        if($success) {
            return $model->id;
        }else{
            return 0;
        }
    }
}