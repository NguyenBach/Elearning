<?php
namespace App\Modules\Course\Model;

/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 03/07/2017
 * Time: 11:20
 */
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $table = 'course';
    public function getLastIndex(){
        $a =  $this->all()->last();
        if(is_null($a)) return 0;
        else return $a->id;
    }
}