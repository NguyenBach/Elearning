<?php
namespace App\Modules\Quiz\Controllers;


use App\Http\Controllers\Controller;
use App\Modules\Quiz\Models\Quiz;
use App\Modules\Quiz\Models\QuestionQuizMap;
use App\Modules\Quiz\Models\QuestionBank;
use App\Modules\Quiz\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class Teacher extends Controller
{
    public function __construct(){

    }

    public function index (){
        return view('Quiz::teacher/index');
    }

    // Quiz
    public function generate(Request $request){
        $quiz = new Quiz;
        if($request->isMethod('post')){
            $quiz->name = $request->name;
            $quiz->description = $request->description;
            $quiz->save();

            $quiz_id = $quiz->id;
            $bank_ids = $request->input('bank_ids');
            $question_per_bank = $request->input('question_per_bank');
            $this->generate_quiz($quiz_id, $bank_ids, $question_per_bank);
            return redirect('teacher/quiz');
        }

        $question_banks = QuestionBank::pluck('name', 'id');
        return view('Quiz::teacher/create', ['question_banks' => $question_banks]);
    }

    public function generate_quiz($quiz_id, $bank_ids, $question_per_bank){

        foreach ($bank_ids as $bank_id) {
            $questions = Question::inRandomOrder()->where('bank_id', $bank_id)->limit($question_per_bank)->get();
            foreach ($questions as $question) {
                $quiz_maps = array(
                    'quiz_id'      => $quiz_id,
                    'bank_id'     => $bank_id,
                    'question_id' => $question->id
                );

                QuestionQuizMap::insert($quiz_maps);
            }
        }
    }

    public function delete($id){
        Quiz::destroy($id);
        return redirect('quiz');
    }

    public function get_detail($id){
        $this->current_detail_id = $id;
        $detail = Quiz::get_detail($id);
        return view('Quiz::teacher/detail', ['detail' => $detail]);;
    }


    // DATATABLE API
    public function get_datatable(){
        $quizs = Quiz::select([
            'quizzes.id',
            'quizzes.name',
            'quizzes.description',
            \DB::raw('count(question_quiz_maps.quiz_id) as total')
            ])
            ->leftJoin('question_quiz_maps','quizzes.id','=', 'question_quiz_maps.quiz_id')
            ->groupBy('quizzes.id', 'quizzes.name', 'quizzes.description');

        return Datatables::of($quizs)->make(true);
    }

}
