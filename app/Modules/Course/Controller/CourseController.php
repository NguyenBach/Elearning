<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 24/07/2017
 * Time: 20:25
 */

namespace App\Modules\Course\Controller;


use App\Http\Controllers\Controller;
use App\Modules\Course\Lesson;
use App\Modules\Course\Model\Course;
use App\Modules\Course\Request\CourseRequest;

class CourseController extends Controller
{
    private $course;
    public function __construct()
    {
        $this->course = new Course();
    }

    public function index(){
        $courses = $this->course->getAllActiveCourse();
        return view('Course::index',['courses'=>$courses]);
    }

    public function newCourse(CourseRequest $request){
        $data['fullname'] = $request->input('fullname');
        $data['shortname'] = $request->input('shortname');
        $data['intro'] = $request->input('intro');
        $data['startdate'] = $request->input('startdate');
        $data['courseformat'] = $request->input('courseformat');
        $data['numberlessons'] = $request->input('numberlessons');
        $data['active'] = $request->input('active');
        $data['visible'] = $request->input('visible');
        $data['picture'] = ' ';
        $data['id'] = $this->course->getLastIndex()+1;
        $id = $this->course->addCourse($data);
        return response()->redirectTo('/course/'.$id);
    }
    public function showCourse($id){
        $course = $this->course->find($id);
        $lessons = new Lesson();
        $lessons = $lessons->where('course_id',$id)->get();
        return view('Course::course',['course'=>$course,'lessons'=>$lessons]);
    }
}