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
        if($request->isMethod('post')){
            $question_bank = new QuestionBank;

            $question_bank->name = $request->input('name');
            $question_bank->description = $request->input('description');
            $question_bank->difficulty = $request->input('difficulty');

            $question_bank->save();
        }
        return view('Question::create');

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
