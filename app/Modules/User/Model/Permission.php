<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 07/08/2017
 * Time: 22:22
 */

namespace App\Modules\User\Model;


use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permission';
    public function addPermission($userid,$pesmission){
        $p = $this->where('user_id',$userid)->where('permission', $pesmission)->get();
        if(count($p) > 0){
            return 0;
        }
        $this->user_id = $userid;
        $this->permission = $pesmission;
        $this->setCreatedAt(time());
        $p = $this->save();
        return $p;
    }

}