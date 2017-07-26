<?php
namespace App\Modules\Question\Controllers;


use App\Http\Controllers\Controller;
use App\Modules\Question\Models\QuestionBank;
use App\Modules\Question\Models\Question;
use Datatables;

class QuestionController extends Controller
{
    public function __construct(){

    }

    public function index (){
        $question_banks = QuestionBank::all();
        return view('Question::index', ['question_banks' => $question_banks]);
    }

    public function create(){
        $question_bank = new QuestionBank();
        $question_bank->name = $request->name;
        $question_bank->description = $request->description;
        $question_bank->difficulty = $request->difficulty;
        $question_bank->save();

        return redirect('/question');

    }

    public function get_datatable(){
        return Datatables::of(QuestionBank::query())->make(true);
    }
}
