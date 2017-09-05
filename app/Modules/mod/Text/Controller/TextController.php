<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 18/08/2017
 * Time: 10:43
 */

namespace App\Modules\mod\Text\Controller;


use App\Http\Controllers\Controller;
use App\Modules\Course\ActivityType;
use App\Modules\Course\Helper\CourseHelper;
use App\Modules\mod\Text\Model\Text;
use App\Modules\mod\Text\Model\TextContent;
use App\Modules\Course\Model\Course;
use App\Modules\Course\Model\Lesson;
use App\Modules\Course\Model\LessonModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class TextController extends Controller
{

    public function add(Request $request)
    {
        $courseId = $request->input('course_id');
        $lessonId = $request->input('lesson_id');
        $activityId = $request->input('activity_id');
        if (isset($activityId)) {
            $action = 'edit';
            if (CourseHelper::checkActivityExist($courseId, $lessonId, $activityId)) {
                $activity = CourseHelper::checkActivityExist($courseId, $lessonId, $activityId);
            } else {
                return redirect()->back()->with('message', 'Error');
            }
        } else {
            $action = 'new';
            $activity = new LessonModule();
        }
        if (CourseHelper::checkCourseExist($courseId)) {
            $course = CourseHelper::checkCourseExist($courseId);
        } else {
            return redirect()->back()->with('message', 'Error');
        }
        if (CourseHelper::checkLessonExist($courseId, $lessonId)) {
            $lesson = CourseHelper::checkLessonExist($courseId, $lessonId);
        } else {
            return redirect()->back()->with('message', 'Error');
        }

        return view('Text::form.createForm', ['course' => $course, 'lesson' => $lesson, 'action' => $action, 'activity' => $activity]);
    }

    public function addText(Request $request)
    {
        $data = $request->all();
        $action = $request->input('action');
        if ($action == 'new') {
            $text = new Text();
            $id = $text->createInstance($data);
            if (!$id) {
                return redirect()->back()->with('message', 'error');
            }
            $data['mod_id'] = $id;
            $text = new TextContent();
            $success = $text->createInstance($data);
            if (!$success) {
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
            $module = LessonModule::where('id',$activityId)->first();
            $data['id'] = $module->instance;
            $text = new Text();
            $id = $text->updateInstance($data);
            if (!$id) {
                return redirect()->back()->with('message', 'error');
            }
            $data['mod_id'] = $id;
            $text = new TextContent();
            $success = $text->updateInstance($data);
            if (!$success) {
                return redirect()->back()->with('message', 'error');
            }
        }
        return redirect()->route('course::editlesson', ['id' => $data['course_id'], 'lesson' => $data['lesson_id']]);

    }

    private function getType()
    {
        $type = ActivityType::where('name', 'Text')->first();
        return $type->id;
    }

    private function save($courseId, $lessonId, $title, $content, TextContent $text)
    {
        $text->course_id = $courseId;
        $text->lesson_id = $lessonId;
        $text->title = $title;
        $text->content = $content;
        $text->setCreatedAt(time());
        $text->save();
        return $text->id;
    }
}