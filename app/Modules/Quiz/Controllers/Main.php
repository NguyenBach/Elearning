<?php

namespace App\Modules\Quiz\Controllers;


use App\Http\Controllers\Controller;
use App\Modules\Course\Model\Course;
use App\Modules\Course\Model\Lesson;
use App\Modules\Course\Model\LessonModule;
use App\Modules\Quiz\Models\Quiz;
use App\Modules\Quiz\Models\QuestionBank;
use App\Modules\Quiz\Models\QuestionQuizMap;
use App\Modules\Quiz\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class Main extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $quizzes = Quiz::all();
        return view('Quiz::main/index', ['quizzes' => $quizzes]);
    }

    public function view($id)
    {
        $quiz = Quiz::find($id);
        $question_banks = QuestionBank::all();
        return view('Quiz::main/view', ['quiz' => $quiz, 'question_banks' => $question_banks]);
    }

    public function doing(Request $request, $id)
    {

        if ($request->isMethod('post')){
            $answers = $request->all();
            $right_answers = 0;
            $total  = count($answers);
            $result = '';
            foreach ($answers as $key => $value) {
                $question = Question::find($key);
                if ($value == $question['option_0']){
                    $right_answers = $right_answers +1;
                }
                $answers[$key] = $question['option_0'];
            }
            $result = array('result' => $right_answers . '/' . $total);
            $result = $result + $answers;
            return json_encode($result);
        }
        $quiz = Quiz::find($id);
        $questions = array();
        $question_ids = QuestionQuizMap::inRandomOrder()->where('quiz_id', $quiz->id)->get();
        foreach ($question_ids as $question_id) {
            $questions[] = Question::find($question_id->question_id);
        }
        $bank_randoms = explode(',', $quiz->random_banks);
        foreach ($bank_randoms as $bank) {
            if ($bank != '') {
                $bank_info = explode(':', $bank);
                $random = Question::inRandomOrder()->where('bank_id', $bank_info[0])->limit($bank_info[1])->get();
                // var_dump($questions);
                foreach ($random as $r) {
                    $questions[] = $r;
                }
            }
        }
        shuffle($questions);

        return view('Quiz::main/doing', ['questions' => $questions]);
    }

    // API
    public function get_questions_from_questionbank()
    {
        $question_banks = QuestionBank::get_questions();
        return json_encode($question_banks);
    }

    public function addForm(Request $request)
    {
        $courseId = $request->input('course_id');
        $lessonId = $request->input('lesson_id');
        $activityId = $request->input('activity_id');
        $course = Course::find($courseId);
        $lesson = Lesson::where('course_id', $courseId)->where('id', $lessonId)->first();
        $activity = LessonModule::find($activityId);
        return view('Quiz::form.createForm', ['course' => $course, 'lesson' => $lesson, 'activity' => $activity]);
    }

    public function addQuiz(Request $request)
    {
        $courseId = $request->input('course_id');
        $lessonId = $request->input('lesson_id');
        $instance = $request->input('instance');
        $activityId = $request->input('activity_id');
        $quizId = $request->input('quiz');
        $LessonModule = LessonModule::find($activityId);
        $LessonModule->instance = $quizId;
        $LessonModule->save();
        return redirect()->route('course::editlesson', ['id' => $courseId, 'lesson' => $lessonId]);

    }

}
