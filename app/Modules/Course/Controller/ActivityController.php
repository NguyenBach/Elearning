<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 10/08/2017
 * Time: 10:38
 */

namespace App\Modules\Course\Controller;


use App\Http\Controllers\Controller;
use App\Modules\Course\ActivityType;

class ActivityController extends Controller
{
    private $activity;

    public function __construct()
    {
        $this->activity = new ActivityType();
    }

    public function getAllActivityType()
    {
        $acts = $this->activity->where('active',1)->get();
        $a = [];
        foreach ($acts as $act) {
            $b = [
                'id' => $act->id,
                'name' => $act->name,
                'description' => $act->description
            ];
            $a[] = $b;
        }
        return response()->json($a);
    }
}