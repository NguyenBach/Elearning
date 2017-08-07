<?php
namespace App\Modules\Question\Controllers;


use App\Http\Controllers\Controller;
use App\Modules\Question\Models\QuestionBank;
use App\Modules\Question\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class QuestionController extends Controller
{
    public function __construct(){

    }

    public function index (){
        return view('Question::index');
    }

    public function create(Request $request){
        $question_bank = new QuestionBank;
        if($request->isMethod('post')){
            $question_bank->fill($request->all());
            $question_bank->save();

            return redirect('question');
        }
        return view('Question::create', ['question_bank' => $question_bank]);
    }

    public function edit(Request $request, $id){
        $question_bank = QuestionBank::find($id);
        if($request->isMethod('post')){
            $question_bank->update($request->all());
            return  redirect('question');
        }

        return view('Question::edit', ['question_bank' => $question_bank]);
    }

    public function delete($id){
        QuestionBank::destroy($id);
        return redirect('question');
    }

    public function get_detail($id){
        $detail = QuestionBank::get_detail($id);
        return view('Question::detail', ['detail' => $detail]);;
    }

    public function create_question(Request $request){
        $question = new Question;
        if($request->isMethod('post')){
            $question->fill($request->all());
            $question->save();

            return redirect()->back();
        }
        return redirect()->back();
    }

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
}
