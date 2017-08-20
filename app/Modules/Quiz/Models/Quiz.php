<?php

namespace App\Modules\Quiz\Models;


use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quizzes';
    protected $fillable = ['name', 'description'];

    public function get_questions(){
       return $this->belongsToMany('App\Modules\Quiz\Models\Question', 'question_quiz_maps', 'quiz_id', 'question_id')->get();
    }

    public function get_questionbanks(){
       return $this->belongsToMany('App\Modules\Quiz\Models\QuestionBank', 'question_quiz_maps', 'quiz_id', 'bank_id')
                   ->distinct()->get();
    }

    public static function get_detail($id){
        $query         = Quiz::find($id);
        if($query){
            $question_set  = $query;
            $questions     = $query->get_questions();
            $question_banks= $query->get_questionbanks();

            $data = array(
                'quiz' => $question_set,
                'questionbanks'=> $question_banks,
                'questions'    => $questions
            );

            return $data;
        }
        else
            return FALSE;
    }

}
