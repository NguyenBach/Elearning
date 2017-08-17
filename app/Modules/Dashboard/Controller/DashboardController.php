<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 10/08/2017
 * Time: 10:21
 */

namespace App\Modules\Dashboard\Controller;


use App\Http\Controllers\Controller;
use App\Modules\Course\ActivityType;
use App\Modules\Course\Helper\CourseHelper;
use App\Modules\Course\Model\Course;
use App\Modules\Course\Model\CourseTeacher;
use App\Modules\Course\Model\Lesson;
use App\Modules\Course\Model\LessonActivity;
use App\Modules\User\Helper\UserHelper;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public $course;
    public function __construct()
    {
        $this->course = new Course();
    }

    public function index(){
        $teacher = 0;
        $student = 1;
        $session = session('permission');
        if(!isset($session)){
            return redirect('/login');
        }
        foreach ($session as $s){
            if($s == 'teacher') $teacher = 1;
            if($s == 'student') $student = 1;
        }
        if($teacher){
            $teacherid = session('user_id');
            $teacherCourse = CourseTeacher::where('user_id',$teacherid)->get();
            $course = [];
            foreach ($teacherCourse as $c){
                $course[] = Course::where('id',$c->course_id)->get();
            }
            return view('Dashboard::teacher',['courses'=> $course]);
        }
        if($student){
            return view('Dashboard::student');
        }
    }
    public function editCourse($id){
        $permission = session('permission');
        if(!$permission){
            return redirect('/login');
        }
        $teacher = 0;
        foreach ($permission as $p){
            if($p == 'teacher') $teacher = 1;
        }
        if(!$teacher){
            return redirect('/');
        }
        $teacherId = session('user_id');
        $course = Course::find($id);
        if(!isset($course->id)){
            $course = new Course();
            $course->id = $this->course->getLastIndex()+1;
            return view('Dashboard::form.EditCourse',['course'=>$course]);
        }else{
            $ct = CourseTeacher::where('user_id',$teacherId)->where('course_id',$id)->first();
            if(!isset($ct->user_id)){
                return view('Core::404');
            }
            return view('Dashboard::form.EditCourse',['course'=> $course]);
        }
    }

    public function newCourse(Request $request)
    {
        $data['fullname'] = $request->input('fullname');
        $data['shortname'] = $request->input('shortname');
        $data['intro'] = $request->input('intro');
        $data['startdate'] = $request->input('startdate');
        $data['courseformat'] = $request->input('courseformat');
        $data['numberlessons'] = $request->input('numberlessons');
        $data['active'] = $request->input('active');
        $data['visible'] = $request->input('visible');
        $id = $request->input('id');
        $file = $request->file('featurepicture');
        if(isset($file)) {
            $data['picture'] = $this->uploadFile($request,$id);
        }else{
            $data['picture'] = '';
        }
        $data['id'] = $id;
        $action = $request->input('action');
        if($action === 'new'){
            $this->course->addCourse($data);
            return response()->redirectTo('/course/'.$id.'/editlesson/1');
        }elseif ($action === 'edit'){
            $this->course->updateCourse($id,$data);
            return response()->redirectTo('/dashboard');
        }else{
            return 'not found action';
        }

    }
    public function uploadFile(Request $request,$id){
        $file = $request->file('featurepicture');
        $fileName = $file->getClientOriginalName();
        $fileName = $id.'_'.time().'_'.$fileName;
        $destinationPath = public_path('/featureimage');
        $file->move($destinationPath,$fileName);
        $url = 'featureimage/'.$fileName;
        return $url;
    }

    public function courseOverview($id){
        $userid = session('user_id');
        $per = UserHelper::getAllPermission();
        if($per['guest']){
            return redirect('/login');
        }
        if($per['student']){
            return redirect('/course/'.$id);
        }
        if(!CourseHelper::checkTeacher($id,$userid)){
            return view('Core::404');
        }
        $course = Course::find($id);
        $lessons = Lesson::where('course_id',$id)->get();
        return view('Dashboard::courseOverview',['course'=>$course,'lessons'=>$lessons]);

    }

    public function editLesson($id, $lessonid = 1)
    {
        $course = Course::find($id);
        if (!isset($course->id)) {
            return view('Core::404');
        }
        $lesson = Lesson::where('course_id', $course->id)->get();
        if (count($lesson) == 0) {
            $lesson = new Lesson();
            $lesson->id = $lessonid;
        } else {
            $lesson = Lesson::where('course_id', $id)->where('id', $lessonid)->first();
            if(!isset($lesson->id)){
                $lesson = new Lesson();
                $lesson->id = $lessonid;
            }
            $activities = LessonActivity::where('lesson_id',$lesson->id)->get();
        }
        return view('Dashboard::form.EditLesson', ['course' => $course, 'lesson' => $lesson,'activities'=>$activities]);
    }

    public function newLesson(Request $request){
        $data['lessonid'] = $request->input('lessonid');
        $data['courseid'] = $request->input('courseid');
        $data['title'] = $request->input('title');
        $data['summary'] = $request->input('summary');
        $data['template'] = $request->input('template');
        $action = $request->input('action');
        if($action === 'new'){
            $this->lesson->addLesson($data);
        }elseif($action === 'edit'){
            $this->lesson->updateLesson($data);
        }
        if($this->course->getNumberCourse($data['courseid']) > $this->lesson->getNumberLesson($data['courseid']) ){
            return redirect('/course/'.$data['courseid'].'/editlesson/'.($data['lessonid']+1));
        }else{
            redirect('/course/'.$data['courseid']);
        }
    }

    public function newActivityForm(Request $request){
        $act = $request->input('act');
        $courseId = $request->input('course_id');
        $lessonId = $request->input('lesson_id');
        $act = ActivityType::find($act);
        $view = $act->name.'::form.createForm';
        $course = Course::find($courseId);
        $lesson = Lesson::where('course_id',$courseId)->where('id',$lessonId)->first();
        return view($view,['course'=>$course,'lesson'=>$lesson,'activity'=>new LessonActivity()]);
    }
}