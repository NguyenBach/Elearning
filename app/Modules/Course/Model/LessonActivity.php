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

class LessonActivity extends Model
{
    protected $table = 'lesson_activity';

    public function deleteActivity($activityId)
    {
        $activity = $this->find($activityId);
        if (!isset($activity->id)) {
            return 0;
        }
        $type = ActivityType::find($activity->type_id);
        DB::table($type->activity_table)->where('id', $activity->activity_instance)->delete();
        $success = $activity->delete();
        return $success;
    }
}