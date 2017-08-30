<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 07/08/2017
 * Time: 22:22
 */

namespace App\Modules\User\Model;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    public function addUser($data){
        $this->id = $data['id'];
        $this->fullname = $data['fullname'];
        $this->email = $data['email'];
        $this->birthday = $data['birthday'];
        $this->setCreatedAt(time());
        $success = $this->save();
        if($success){
            return $data['id'];
        }else{
            return 0;
        }
    }
}