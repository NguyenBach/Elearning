<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 04/07/2017
 * Time: 22:17
 */

namespace App\Modules\Course\Controller;


use App\Http\Controllers\Controller;
use App\Modules\Course\Model\Course;
use App\Modules\Course\Model\CourseContent;
use App\Modules\Course\Model\CourseType;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function addCourse(Request $request){
        $id = $request->input('id');
        $name = $request->input('name');
        $intro = $request->input('intro');
        $courseType = $request->input('course-type');
        $model = new Course();
        $model->id = $id;
        $model->name = $name;
        $model->introduction = $intro;
        $model->coursetype = $courseType;
        $model->created_at = time();
        $model->save();
        return response()->view('Course::index');
    }

    public function course($id){
        $model = new Course();
        $course = $model->where('id',$id)->first();
        if(is_null($course)){
            return view('Core::404');
        }
        $model = new CourseContent();
        $courseContent = $model->where('course_id',$course->id)->first();
        if(is_null($courseContent)){
            return view('Course::form.addContent',['course'=>$course]);
        }
        $model = new CourseType();
        $type = $model->where('id',$course->coursetype)->first()->template;
        $view = 'Course::format.'.$type;
        return view($view,['course'=>$course,'content'=>$courseContent]);

    }

    public function addContent(Request $request){
        $id = $request->input('id');
        $courseId = $request->input('course_id');
        $title = $request->input('title');
        $content = $request->input('content');
        $file = $request->file('file');
        $destinationPath = 'storage/app/public'; // upload path
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $fileName = rand(11111,99999).'.'.$extension; // renameing image
        $file->move($destinationPath, $fileName);
        $model = new CourseContent();
        $model->id = $id;
        $model->course_id = $courseId;
        $model->course_title = $title;
        $model->course_content = $content;
        $model->course_media_url = $destinationPath.'/'.$fileName;
        $model->save();
        return response()->redirectTo('/course/'.$courseId);
    }

}