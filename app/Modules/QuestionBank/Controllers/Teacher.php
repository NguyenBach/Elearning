<?php
namespace App\Modules\QuestionBank\Controllers;


use App\Http\Controllers\Controller;
use App\Modules\QuestionBank\Models\QuestionBank;
use App\Modules\QuestionBank\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class Teacher extends Controller
{
    private $current_detail_id;
    public function __construct(){

    }

    public function index (){
        return view('QuestionBank::teacher/index');
    }

    // QUESTIONBANK
    public function create(Request $request){
        $question_bank = new QuestionBank;
        if($request->isMethod('post')){
            $question_bank->fill($request->all());
            $question_bank->save();

            return redirect('teacher/questionbank');
        }
        return view('QuestionBank::teacher/create', ['question_bank' => $question_bank]);
    }

    public function edit(Request $request, $id){
        $question_bank = QuestionBank::find($id);
        if($request->isMethod('post')){
            $question_bank->update($request->all());
            return redirect('teacher/questionbank');
        }

        return view('QuestionBank::teacher/edit', ['question_bank' => $question_bank]);
    }

    public function delete($id){
        QuestionBank::destroy($id);
        return redirect('teacher/questionbank');
    }

    public function get_detail($id){
        $this->current_detail_id = $id;
        $detail = QuestionBank::get_detail($id);
        return view('QuestionBank::teacher/detail', ['detail' => $detail]);;
    }


    // QUESTIONS DETAIL
    public function create_question(Request $request, $id){
        $question = new Question;
        if($request->isMethod('post')){
            $question->fill($request->all());
            $question->save();

            return redirect('teacher/questionbank');
        }
        return view('QuestionBank::teacher/question_create',['id' => $id]);
    }

    public function edit_question(Request $request, $id ,$qid){
        $question = Question::find($qid);
        if($request->isMethod('post')){
            $question->update($request->all());
            return redirect('teacher/questionbank');
        }

        return view('QuestionBank::teacher/question_edit', ['question' => $question]);
    }

    public function delete_question($id, $qid){
        Question::destroy($qid);
        return redirect()->back();
    }

    public function get_question_detail($id){
        $this->current_detail_id = $id;
        $detail = QuestionBank::get_detail($id);
        return view('QuestionBank::teacher/question_detail', ['detail' => $detail]);;
    }

    // DATATABLE API
    public function get_datatable(){
        $question_bank = QuestionBank::select([
            'question_bank.id',
            'question_bank.name',
            'question_bank.description',
            'question_bank.difficulty',
            \DB::raw('count(question.bank_id) as total')
            ])
            ->leftJoin('question','question.bank_id','=', 'question_bank.id')
            ->groupBy('question_bank.description', 'question_bank.difficulty','question_bank.id', 'question_bank.name');

        return Datatables::of($question_bank)->make(true);
    }

    public function get_question_datatable($id){
        $question = QuestionBank::select([
            'question.id',
            'question.question',
            ])->join('question','question_bank.id', 'question.bank_id')
            ->where('bank_id', $id);

        return Datatables::of($question)->make(true);
    }
}
