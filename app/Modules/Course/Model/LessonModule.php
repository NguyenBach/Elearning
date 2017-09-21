<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 20/07/2017
 * Time: 22:11
 */

namespace App\Modules\Course\Model;


use App\Modules\Course\ActivityType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LessonModule extends Model
{
    protected $table = 'lesson_module';

    public function deleteActivity($activityId)
    {
        $activity = $this->find($activityId);
        if (!isset($activity->id)) {
            return 0;
        }
        $type = ActivityType::find($activity->type_id);
        $instance = DB::table($type->table)->where('id', $activity->instance)->delete();
        if(!$instance){
            return $instance;
        }
        $success = $activity->delete();
        return $success;
    }

    public function createActivity($data){
        $this->course_id = $data['course_id'];
        $this->lesson_id = $data['lesson_id'];
        $this->type_id = $data['type_id'];
        $this->instance = $data['instance'];
        $this->setCreatedAt(time());
        $success = $this->save();
        if($success){
            return $this->id;
        }else{
            return 0;
        }
    }
}