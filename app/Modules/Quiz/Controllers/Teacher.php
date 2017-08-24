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
    public function create(Request $request){
        $quiz = new Quiz;
        if($request->isMethod('post')){
            $quiz->name = $request->name;
            $quiz->description = $request->description;
            $quiz->save();

            return redirect('teacher/quiz');
        }

        return view('Quiz::teacher/create');
    }


    public function edit(Request $request, $id){
        $quiz = Quiz::find($id);
        if($request->isMethod('post')){
            // $question_bank->update($request->all());
            $quiz->name = $request->name;
            $quiz->description = $request->description;
            $quiz->save();

            return redirect('teacher/quiz/edit/'.$id);
        }

        $question_banks = QuestionBank::pluck('name', 'id');
        $random_banks = Quiz::find($id)->random_banks;
        $random_banks = explode(',', $random_banks);
        return view('Quiz::teacher/edit', ['quiz' => $quiz, 'question_banks' => $question_banks, 'random_banks' => $random_banks]);
    }

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

    public function delete_question($id, $quiz_id, $question_id, $bank_id){
        $ret = array();

        $quiz_id      = $quiz_id;
        $bank_id      = $bank_id;
        $question_id  = $question_id;

        $query = QuestionQuizMap::where('quiz_id', $quiz_id)
                                ->where('bank_id', $bank_id)
                                ->where('question_id', $question_id)->delete();
        if ($query){
            $ret['success'] = 1;
        }
        // echo json_encode($ret);
        return redirect('teacher/quiz/edit/'.$quiz_id);
    }

    public function get_detail($id){
        $this->current_detail_id = $id;
        $detail = Quiz::get_detail($id);
        return view('Quiz::teacher/detail', ['detail' => $detail]);
    }

    public function add_question_from_bank(Request $request, $id){
        if($request->isMethod('post')){
            $bank_id = $request->bank_id;
            $question_ids = $request->question_id;
            if (is_array($question_ids)){
                foreach ($question_ids as $question_id) {
                  $quiz_maps = array(
                    'quiz_id'     => $id,
                    'bank_id'     => $bank_id,
                    'question_id' => $question_id
                  );
                  QuestionQuizMap::insert($quiz_maps);
                }
            }else{
                $quiz_maps = array(
                  'quiz_id'     => $id,
                  'bank_id'     => $bank_id,
                  'question_id' => $question_ids
                );
                QuestionQuizMap::insert($quiz_maps);
            }
            return redirect('teacher/quiz/edit/'.$id);
        }
    }

    public function create_question(Request $request, $id){
        $question = new Question;
        if($request->isMethod('post')){
            $question->fill($request->all());
            $question->save();
            $request->question_id = $question->id;
            $this->add_question_from_bank($request, $id);

            return redirect('teacher/quiz/edit/'.$id);
        }
    }

    public function random_question(Request $request, $id){
        if($request->isMethod('post')){
              $quiz = Quiz::find($id);
              $quiz->random_banks .= $request->bank_id .':'.$request->random_num.',';
              $quiz->save();

          }
          return redirect('teacher/quiz/edit/'.$id);

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

    public function get_question_datatable($id){
        $questions = QuestionQuizMap::select([
            'question.question',
            'question_bank.name',
            'question_quiz_maps.quiz_id',
            'question_quiz_maps.bank_id',
            'question_quiz_maps.question_id'
            ])->join('question','question.id', 'question_quiz_maps.question_id')
            ->join('question_bank','question_bank.id', 'question_quiz_maps.bank_id')
            ->where('quiz_id', $id);

        return Datatables::of($questions)->make(true);
    }

    // API
    public function get_questions_from_questionbank (Request $request){
        $id = $request->id;
        $questions = QuestionBank::find($id);
        if($questions){
            $result = $questions->get_questions();
            return json_encode($result);
        }
        return 'hi';
    }

}
