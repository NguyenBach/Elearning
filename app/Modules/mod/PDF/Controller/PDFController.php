<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 23/08/2017
 * Time: 20:39
 */

namespace App\Modules\activity\PDF\Controller;


use App\Http\Controllers\Controller;
use App\Modules\activity\PDF\Model\PDF;
use App\Modules\activity\Video\Model\VideoContent;
use App\Modules\Core\Controller\Mod_Controller;
use App\Modules\Core\Controller\redirect;
use App\Modules\Core\Controller\view;
use App\Modules\Course\Model\Course;
use App\Modules\Course\Model\Lesson;
use App\Modules\Course\Model\LessonModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PDFController extends Mod_Controller
{


    /**
     * function to add a new mod instance
     * @return redirect to page edit lesson
     */
    public function add(Request $request)
    {
        // TODO: Implement add() method.
    }

    /**
     * function to show form
     *
     * @return view createForm with course,lesson,action,activity if have
     */
    public function form(Request $request)
    {
        // TODO: Implement form() method.
    }
}