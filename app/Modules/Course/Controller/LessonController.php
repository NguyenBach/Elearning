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
use App\Modules\Course\Model\LessonActivity;
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

    public function showLesson($id,$lessonid)
    {
        $course = Course::find($id);
        $activities = LessonActivity::where('course_id',$id)->where('lesson_id',$lessonid)->get();
        $lesson = Lesson::where('course_id',$id)->where('id',$lessonid)->first();
        return view('Course::lesson',['course'=>$course,'lesson'=>$lesson,'activities'=>$activities]);
    }

    public function editLesson($id, $lessonid = 1)
    {
        $course = Course::find($id);
        if (!isset($course->id)) {
            return view('Core::404');
        }
        $lesson = Lesson::where('course_id', $course->id)->get();
        $activities = [];
        if (count($lesson) == 0) {
            $lesson = new Lesson();
            $lesson->id = $lessonid;
        } else {
            $lesson = Lesson::where('course_id', $id)->where('id', $lessonid)->first();
            if (!isset($lesson->id)) {
                $lesson = new Lesson();
                $lesson->id = $lessonid;
            }
            $activities = LessonActivity::where('course_id',$id)->where('lesson_id', $lesson->id)->get();

        }
        return view('Course::form.EditLesson', ['course' => $course, 'lesson' => $lesson, 'activities' => $activities]);
    }


    public function newLesson(Request $request)
    {
        $data['lessonid'] = $request->input('lessonid');
        $data['courseid'] = $request->input('courseid');
        $data['title'] = $request->input('title');
        $data['summary'] = $request->input('summary');
        $data['template'] = $request->input('template');
        $action = $request->input('action');
        if ($action === 'new') {
            $this->lesson->addLesson($data);
        } elseif ($action === 'edit') {
            $this->lesson->updateLesson($data);
        }
        if ($this->course->getNumberCourse($data['courseid']) > $this->lesson->getNumberLesson($data['courseid'])) {
            return redirect('/course/' . $data['courseid'] . '/editlesson/' . ($data['lessonid'] + 1));
        } else {
            redirect('/course/' . $data['courseid']);
        }
    }

}