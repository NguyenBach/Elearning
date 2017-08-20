<?php
namespace App\Modules\Quiz\Controllers;


use App\Http\Controllers\Controller;
use App\Modules\QuizSet\Models\QuestionSet;
use App\Modules\QuizSet\Models\QuestionSetMap;
use App\Modules\QuizSet\Models\QuestionBank;
use App\Modules\QuizSet\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class Main extends Controller
{
    public function __construct(){

    }

    public function index (){
        return view('Quiz::main/index');
    }

}
