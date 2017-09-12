<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 10/09/2017
 * Time: 20:46
 */

namespace App\Modules\Core\Controller;


use App\Http\Controllers\Controller;
use App\Modules\Course\ActivityType;
use Illuminate\Http\Request;

abstract class Mod_Controller extends Controller
{
    protected $modName;

    /**
     * function to add a new mod instance
     * @return redirect to page edit lesson
     */
    public abstract function add(Request $request);

    /**
     * function to show form
     *
     * @return view createForm with course,lesson,action,activity if have
     */
    public abstract function form(Request $request);


    /**
     * get type id of module
     * @return int
     */
    protected function getType(){
        if($this->modName == ''){
            return 0;
        }
        $type = ActivityType::where('name', $this->modName)->first();
        return $type->id;
    }
}