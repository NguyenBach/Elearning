<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 28/07/2017
 * Time: 21:37
 */

namespace App\Modules\Course\Controller;


use App\Http\Controllers\Controller;
use App\Modules\Course\Model\Lesson;
use App\Modules\Course\Model\Course;
use App\Modules\Course\Model\LessonModule;
use App\Modules\Course\Request\LessonRequest;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    private $course;
    private $lesson;

    public function __construct()
    {
        $this->course = new Course();
        $this->lesson = new Lesson();
    }

    public function show($id, $lessonid)
    {
        $course = Course::find($id);
        $activities = LessonModule::where('course_id', $id)->where('lesson_id', $lessonid)->get();
        $lesson = Lesson::where('course_id', $id)->where('id', $lessonid)->first();
        return view('Course::lesson', ['course' => $course, 'lesson' => $lesson, 'activities' => $activities]);
    }

    public function showEditLessonForm($id, Request $request)
    {
        $lessonid = $request->input('lesson');
        $course = Course::find($id);
        if (!isset($course->id)) {
            return view('Core::404');
        }
        if (isset($lessonid)) {
            $lesson = Lesson::where('course_id', $course->id)->where('id', $lessonid)->first();
            if (!isset($lesson->id)) {
                return view('Core::404');
            }
            $action = 'edit';
        }else{
            $lesson = new Lesson();
            $action = 'new';
        }


        return view('Course::form.EditLesson', ['course' => $course, 'lesson' => $lesson,'action'=>$action]);
    }


    public function create(LessonRequest $request)
    {
        $data['lessonid'] = $request->input('lessonid');
        $data['courseid'] = $request->input('courseid');
        $data['title'] = $request->input('title');
        $data['summary'] = $request->input('summary');
        $data['template'] = $request->input('template');
        $action = $request->input('action');
        if ($action === 'new') {
            if(isset($data['lessonid'])){
                return redirect()->back()->with('message','error');
            }
            $data['lessonid'] = $this->lesson->addLesson($data);
        } elseif ($action === 'edit') {
            if(!isset($data['lessonid'])){
                return redirect()->back()->with('message','error');
            }
            $this->lesson->updateLesson($data);
        }
        return redirect()->route('course::lessonOverview', ['courseid' => $data['courseid'], 'lessonid' => $data['lessonid']]);
    }

    public function lessonOverview($courseid, $lessonid)
    {
        $course = $this->course->find($courseid);
        if (!isset($course->id)) {
            return view('Core::404');
        }
        $lesson = $this->lesson->where('course_id', $courseid)->where('id', $lessonid)->first();
        if (!isset($lesson->id)) {
            return view('Core::404');
        }
        $activities = LessonModule::where('course_id', $courseid)->where('lesson_id', $lessonid)->get();
        return view('Course::lessonOverview', ['course' => $course, 'lesson' => $lesson, 'activities' => $activities]);
    }

}