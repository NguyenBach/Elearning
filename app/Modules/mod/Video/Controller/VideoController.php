<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 23/08/2017
 * Time: 20:39
 */

namespace App\Modules\activity\Video\Controller;


use App\Http\Controllers\Controller;
use App\Modules\activity\Video\Model\VideoContent;
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
        $course = Course::find($courseId);
        $lesson = Lesson::where('course_id', $courseId)->where('id', $lessonId)->first();
        $activity = LessonModule::find($activityId);
        return view('Video::form.createForm', ['course' => $course, 'lesson' => $lesson, 'activity' => $activity]);
    }

    public function addVideo(Request $request)
    {
        $action = $request->input('action');
        $courseId = $request->input('course_id');
        $lessonId = $request->input('lesson_id');
        $instance = $request->input('instance');
        $activityId = $request->input('activity_id');
        $title = $request->input('name');
        $content = $request->input('intro');
        $videoscript = $request->input('videoscript');
        $file = $request->file('video');
        if ($action == 'new') {
            $video = new VideoContent();
            $video->name = $title;
            $video->intro = $content;
            $video->video_script = $videoscript;
            $video->video_link = $this->uploadFile($request, $courseId);
            $video->setCreatedAt(time());
            $video->save();
            $LessonModule = LessonModule::find($activityId);
            $LessonModule->instance = $video->id;
            $LessonModule->save();


        } else {
            $text = VideoContent::find($instance);

        }
        return redirect()->route('course::editlesson', ['id' => $courseId, 'lesson' => $lessonId]);

    }

    public function uploadFile(Request $request, $id)
    {
        $file = $request->file('video');
        $fileName = $file->getClientOriginalName();
        $fileName = $id . '_' . time() . '_' . $fileName;
        $destinationPath = storage_path('app/public/video');
        $file->move($destinationPath, $fileName);
        $url = url('storage/video/'.$fileName);
        return $url;
    }
}