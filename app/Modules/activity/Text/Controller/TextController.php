<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 18/08/2017
 * Time: 10:43
 */

namespace App\Modules\activity\Text\Controller;


use App\Http\Controllers\Controller;
use App\Modules\activity\Text\Model\TextContent;
use App\Modules\Course\Model\Course;
use App\Modules\Course\Model\Lesson;
use App\Modules\Course\Model\LessonActivity;
use Illuminate\Http\Request;

class TextController extends Controller
{

    public function add( Request $request){
        $courseId = $request->input('course_id');
        $lessonId = $request->input('lesson_id');
        $activityId = $request->input('activity_id');
        $course = Course::find($courseId);
        $lesson = Lesson::where('course_id',$courseId)->where('id',$lessonId)->first();
        $activity = LessonActivity::find($activityId);
        return view('Text::form.createForm',['course'=>$course,'lesson'=>$lesson,'activity'=>$activity]);
    }

    public function addText(Request $request){
        $action = $request->input('action');
        $courseId = $request->input('course_id');
        $lessonId = $request->input('lesson_id');
        $instance = $request->input('instance');
        $activityId = $request->input('activity_id');
        $title = $request->input('title');
        $content = $request->input('content');
        if($action == 'new') {
            $text = new TextContent();
            $id = $this->save($courseId,$lessonId,$title,$content,$text);
            $lessonActivity = LessonActivity::find($activityId);
            $lessonActivity->activity_instance = $id;
            $lessonActivity->save();

        }else{
            $text = TextContent::find($instance);
            $this->save($courseId,$lessonId,$title,$content,$text);
        }
        return redirect()->route('course::editlesson',['id'=>$courseId,'lesson'=>$lessonId]);

    }

    private function addActivity(){

    }

    private function save($courseId,$lessonId,$title,$content,TextContent $text){
        $text->course_id = $courseId;
        $text->lesson_id = $lessonId;
        $text->title = $title;
        $text->content = $content;
        $text->setCreatedAt(time());
        $text->save();
        return $text->id;
    }
}