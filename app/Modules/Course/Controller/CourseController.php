<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 24/07/2017
 * Time: 20:25
 */

namespace App\Modules\Course\Controller;


use App\Http\Controllers\Controller;
use App\Modules\Course\Model\Lesson;
use App\Modules\Course\Model\Course;
use App\Modules\Course\Request\CourseRequest;
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

    public function newCourse(CourseRequest $request)
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
        $data['picture'] = $this->uploadFile($request,$id);
        $data['id'] = $id;
        $action = $request->input('action');
        if($action === 'new'){
            $this->course->addCourse($data);
            return response()->redirectTo('/course/'.$id.'/editlesson/1');
        }elseif ($action === 'edit'){
            $this->course->updateCourse($id,$data);
            return response()->redirectTo('/course/' . $id);
        }else{
            return 'not found action';
        }

    }

    public function editCourse(Request $request){
        $id = $request->input('courseid');
        if(!isset($id)){
            $course = new Course();
            $course->id = $this->course->getLastIndex()+1;
            return view('Course::form.EditCourse',['course'=>$course]);
        }else{
            $course = $this->course->find($id);
            if(!isset($course->id)) {
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
}