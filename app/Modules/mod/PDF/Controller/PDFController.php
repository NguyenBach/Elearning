<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 23/08/2017
 * Time: 20:39
 */

namespace App\Modules\activity\PDF\Controller;


use App\Http\Controllers\Controller;
use App\Modules\activity\PDF\Model\PDF;
use App\Modules\activity\Video\Model\VideoContent;
use App\Modules\Course\Model\Course;
use App\Modules\Course\Model\Lesson;
use App\Modules\Course\Model\LessonModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{


    public function addForm(Request $request)
    {
        $courseId = $request->input('course_id');
        $lessonId = $request->input('lesson_id');
        $activityId = $request->input('activity_id');
        $course = Course::find($courseId);
        $lesson = Lesson::where('course_id', $courseId)->where('id', $lessonId)->first();
        $activity = LessonModule::find($activityId);
        return view('PDF::form.createForm', ['course' => $course, 'lesson' => $lesson, 'activity' => $activity]);
    }

    public function addPDF(Request $request)
    {
        $action = $request->input('action');
        $courseId = $request->input('course_id');
        $lessonId = $request->input('lesson_id');
        $instance = $request->input('instance');
        $activityId = $request->input('activity_id');
        $name = $request->input('name');
        $intro = $request->input('intro');

        if ($action == 'new') {
            $pdf = new PDF();
            $pdf->name = $name;
            $pdf->intro = $intro;
            $pdf->pdf_link = $this->uploadFile($request, $courseId);
            $pdf->setCreatedAt(time());
            $pdf->save();
            $LessonModule = LessonModule::find($activityId);
            $LessonModule->instance = $pdf->id;
            $LessonModule->save();


        } else {
            $text = PDF::find($instance);

        }
        return redirect()->route('course::editlesson', ['id' => $courseId, 'lesson' => $lessonId]);

    }

    public function uploadFile(Request $request, $id)
    {
        $file = $request->file('pdf');
        $fileName = $file->getClientOriginalName();
        $fileName = $id . '_' . time() . '_' . $fileName;
        $destinationPath = storage_path('app/public/pdf');
        $file->move($destinationPath, $fileName);
        $url = url('storage/pdf/'.$fileName);
        return $url;
    }
}