<?php
namespace App\Modules\Quiz\Controllers;


use App\Http\Controllers\Controller;
use App\Modules\Quiz\Models\Quiz;
use App\Modules\Quiz\Models\QuestionBank;
use App\Modules\Quiz\Models\QuestionQuizMap;
use App\Modules\Quiz\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class Main extends Controller
{
    public function __construct(){

    }

    public function index (){
        $quizzes = Quiz::all();
        return view('Quiz::main/index', ['quizzes' => $quizzes]);
    }

    public function view ($id){
        $quiz = Quiz::find($id);
        $question_banks = QuestionBank::all();
        return view('Quiz::main/view', ['quiz' => $quiz, 'question_banks' => $question_banks]);
    }

    public function doing($id){
        $quiz = Quiz::find($id);
        $questions = array();
        $question_ids    = QuestionQuizMap::inRandomOrder()->where('quiz_id', $quiz->id)->get();
        foreach ($question_ids as $question_id) {
            $questions[] = Question::find($question_id->question_id);
        }
        $bank_randoms = explode(',', $quiz->random_banks);
        foreach ($bank_randoms as $bank) {
          if ($bank != ''){
            $bank_info = explode(':', $bank);
            $random = Question::inRandomOrder()->where('bank_id', $bank_info[0])->limit($bank_info[1])->get();
            // var_dump($questions);
            foreach ($random as $r) {
                $questions[] = $r;
            }
          }
        }
        return view('Quiz::main/doing', ['questions' => $questions]);
    }

    // API
    public function get_questions_from_questionbank () {
        $question_banks = QuestionBank::get_questions();
        return json_encode($question_banks);
    }

}
