<?php
namespace App\Modules\Quiz\Controllers;


use App\Http\Controllers\Controller;
use App\Modules\Quiz\Models\QuestionSet;
use App\Modules\Quiz\Models\QuestionSetMap;
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

    // QUESTIONSET
    public function generate(Request $request){
        $question_set = new QuestionSet;
        if($request->isMethod('post')){
            $question_set->name = $request->name;
            $question_set->description = $request->description;
            $question_set->save();

            $set_id = $question_set->id;
            $bank_ids = $request->input('bank_ids');
            $question_per_bank = $request->input('question_per_bank');
            $this->generate_question_set($set_id, $bank_ids, $question_per_bank);
            return redirect('questionset');
        }

        $question_banks = QuestionBank::pluck('name', 'id');
        return view('Quiz::teacher/create', ['question_banks' => $question_banks]);
    }

    public function generate_question_set($set_id, $bank_ids, $question_per_bank){

        foreach ($bank_ids as $bank_id) {
            $questions = Question::inRandomOrder()->where('bank_id', $bank_id)->limit($question_per_bank)->get();
            foreach ($questions as $question) {
                $question_set_maps = array(
                    'set_id'      => $set_id,
                    'bank_id'     => $bank_id,
                    'question_id' => $question->id
                );

                QuestionSetMap::insert($question_set_maps);
            }
        }
    }

    public function delete($id){
        QuestionSet::destroy($id);
        return redirect('quiz');
    }

    public function get_detail($id){
        $this->current_detail_id = $id;
        $detail = QuestionSet::get_detail($id);
        return view('Quiz::teacher/detail', ['detail' => $detail]);;
    }


    // DATATABLE API
    public function get_datatable(){
        $question_sets = QuestionSet::select([
            'question_sets.id',
            'question_sets.name',
            'question_sets.description',
            \DB::raw('count(question_set_maps.set_id) as total')
            ])
            ->leftJoin('question_set_maps','question_sets.id','=', 'question_set_maps.set_id')
            ->groupBy('question_sets.id', 'question_sets.name', 'question_sets.description');

        return Datatables::of($question_sets)->make(true);
    }

}
