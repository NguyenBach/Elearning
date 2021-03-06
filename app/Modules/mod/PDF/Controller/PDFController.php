<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 23/08/2017
 * Time: 20:39
 */

namespace App\Modules\mod\PDF\Controller;

use App\Modules\mod\PDF\Model\PDF;
use App\Modules\mod\PDF\Model\PDFContent;
use App\Modules\Core\Controller\Mod_Controller;
use App\Modules\Core\Controller\redirect;
use App\Modules\Core\Controller\view;
use App\Modules\Course\Helper\CourseHelper;
use App\Modules\Course\Model\Course;
use App\Modules\Course\Model\Lesson;
use App\Modules\Course\Model\LessonModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PDFController extends Mod_Controller
{
    protected $modName = 'PDF';

    /**
     * function to add a new mod instance
     * @return redirect to page edit lesson
     */
    public function add(Request $request)
    {
        $data = $request->all();
        $action = $data['action'];
        if ($action == 'new') {
            $pdf = new PDF();
            $id = $pdf->createInstance($data);
            if (!$id) {
                return redirect()->back()->with('message', 'error');
            }
            $data['mod_id'] = $id;
            $data['url'] = $this->uploadFile($request, 'pdf');
            $content = new PDFContent();
            $contentId = $content->createInstance($data);
            if (!$contentId) {
                return redirect()->back()->with('message', 'error');
            }
            $data['instance'] = $id;
            $data['type_id'] = $this->getType();
            $lessonModule = new LessonModule();
            $success = $lessonModule->createActivity($data);
            if (!$success) {
                return redirect()->back()->with('message', 'Error');
            }
        } else {
            $activityId = $request->input('activity_id');
            $module = LessonModule::where('id', $activityId)->first();
            $data['id'] = $module->instance;
            $video = new PDF();
            $id = $video->updateInstance($data);
            if (!$id) {
                return redirect()->back()->with('message', 'error');
            }
            $data['mod_id'] = $id;
            $data['url'] = $this->uploadFile($request, $id);
            $content = new PDFContent();
            $success = $content->updateInstance($data);
            if (!$success) {
                return redirect()->back()->with('message', 'error');
            }

        }
        return redirect()->route('course::lessonOverview', ['id' => $data['course_id'], 'lesson' => $data['lesson_id']]);

    }


}