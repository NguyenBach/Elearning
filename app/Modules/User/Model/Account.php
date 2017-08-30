<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 07/08/2017
 * Time: 22:21
 */

namespace App\Modules\User\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Account extends Model
{
    protected $table = 'account';
    public function addAccount($username,$password){
        $this->username = $username;
        $this->password = Hash::make($password);
        $this->user_id = time();
        $this->setCreatedAt(time());
        $success = $this->save();
        if($success){
            return $this->user_id;
        }else{
            return 0;
        }
    }
}