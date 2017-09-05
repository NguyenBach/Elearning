<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 17/08/2017
 * Time: 21:40
 */

namespace App\Modules\mod\Text\Model;


use Illuminate\Database\Eloquent\Model;

class TextContent extends Model
{
    protected $table = 'text_content';

    public function createInstance($data){
        $this->mod_id = $data['mod_id'];
        $this->title = $data['title'];
        $this->content = $data['content'];
        $this->setCreatedAt(time());
        $success = $this->save();
        if($success){
            return $this->id;
        }else{
            return 0;
        }
     }
    public function updateInstance($data){
        $text = $this->where('mod_id',$data['mod_id'])->first();
        $text->title = $data['title'];
        $text->content = $data['content'];
        $text->setCreatedAt(time());
        $success = $text->save();
        if($success){
            return $text->id;
        }else{
            return 0;
        }
    }
}