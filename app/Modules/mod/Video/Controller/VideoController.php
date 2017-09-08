<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 23/08/2017
 * Time: 20:39
 */

namespace App\Modules\mod\Video\Controller;


use App\Http\Controllers\Controller;
use App\Modules\Course\ActivityType;
use App\Modules\Course\Helper\CourseHelper;
use App\Modules\mod\Video\Model\Video;
use App\Modules\mod\Video\Model\VideoContent;
use App\Modules\Course\Model\Course;
use App\Modules\Course\Model\Lesson;
use App\Modules\Course\Model\LessonModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{


    public function addForm(Request $request)
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

        return view('Video::form.createForm', ['course' => $course, 'lesson' => $lesson, 'action' => $action, 'activity' => $activity]);
    }

    public function addVideo(Request $request)
    {
        $data = $request->all();
        $action = $data['action'];
        if ($action == 'new') {
            $video = new Video();
            $id = $video->createInstance($data);
            if (!$id) {
                return redirect()->back()->with('message', 'error');
            }
            $data['mod_id'] = $id;
            $data['url'] = $this->uploadFile($request, $id);
            $content = new VideoContent();
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
            $video = new Video();
            $id = $video->updateInstance($data);
            if (!$id) {
                return redirect()->back()->with('message', 'error');
            }
            $data['mod_id'] = $id;
            $data['url'] = $this->uploadFile($request,$id);
            $content = new VideoContent();
            $success = $content->updateInstance($data);
            if (!$success) {
                return redirect()->back()->with('message', 'error');
            }

        }
        return redirect()->route('course::editlesson', ['id' => $data['course_id'], 'lesson' => $data['lesson_id']]);

    }

    public function uploadFile(Request $request, $id)
    {
        $file = $request->file('video');
        if (!isset($file)) {
            return '';
        }
        $fileName = $file->getClientOriginalName();
        $fileName = $id . '_' . time() . '_' . $fileName;
        $destinationPath = storage_path('app/public/video');
        $file->move($destinationPath, $fileName);
        $url = url('storage/video/' . $fileName);
        return $url;
    }

    private function getType()
    {
        $type = ActivityType::where('name', 'Video')->first();
        return $type->id;
    }
}