<?php
namespace App\Modules\Quiz\Controllers;


use App\Http\Controllers\Controller;
use App\Modules\Quiz\Models\Quiz;
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
        return view('Quiz::main/view', ['quiz' => $quiz]);
    }

}
