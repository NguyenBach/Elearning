<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 24/07/2017
 * Time: 20:25
 */

namespace App\Modules\Course\Controller;


use App\Http\Controllers\Controller;
use App\Modules\Course\Helper\CourseHelper;
use App\Modules\Course\Model\CourseTeacher;
use App\Modules\Course\Model\Lesson;
use App\Modules\Course\Model\Course;
use App\Modules\Course\Request\CourseRequest;
use App\Modules\User\Helper\UserHelper;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private $course;

    public function __construct()
    {
        $this->course = new Course();
    }

    public function index()
    {
        $courses = $this->course->getAllActiveCourse();
        return view('Course::index', ['courses' => $courses]);
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
        return view('Course::courseOverview',['course'=>$course,'lessons'=>$lessons]);

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
            $ct = new CourseTeacher();
            $ct->course_id = $id;
            $ct->user_id = session('user_id');
            $ct->setCreatedAt(time());
            $ct->save();
            return response()->redirectTo('/course/'.$id.'/editlesson/1');
        }elseif ($action === 'edit'){
            $this->course->updateCourse($id,$data);
            return response()->redirectTo('/dashboard/course');
        }else{
            return 'not found action';
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
            return view('Course::form.EditCourse',['course'=>$course]);
        }else{
            $ct = CourseTeacher::where('user_id',$teacherId)->where('course_id',$id)->first();
            if(!isset($ct->user_id)){
                return view('Core::404');
            }
            return view('Course::form.EditCourse',['course'=> $course]);
        }
    }

    public function showCourse($id)
    {
        $course = $this->course->find($id);
        if(!isset($course->id)){
            return view("Core::404");
        }
        $lessons = new Lesson();
        $lessons = $lessons->where('course_id', $id)->get();
        return view('Course::course', ['course' => $course, 'lessons' => $lessons]);
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

    public function dashboard_index(){
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
            return view('Course::dashboard.index',['courses'=> $course]);
        }
        if($student){
            return view('Dashboard::student');
        }
    }
}