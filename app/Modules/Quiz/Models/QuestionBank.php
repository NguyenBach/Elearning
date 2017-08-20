<?php

namespace App\Modules\Quiz\Models;


use Illuminate\Database\Eloquent\Model;

class QuestionBank extends Model
{
    protected $table = 'question_bank';
    protected $fillable = ['name', 'description', 'difficulty'];

    public function get_questions(){
       return $this->hasMany('App\Modules\Question\Models\Question', 'bank_id')->get();
    }

    public static function get_detail($id){
        $query         = QuestionBank::find($id);
        if($query){
            $question_bank = $query;
            $questions     = $query->get_questions();
            switch ($question_bank->difficulty) {
                case '0':
                    $question_bank->difficulty = "BEGINNER";
                    break;
                case '1':
                    $question_bank->difficulty = "INTERMIDIATE";
                    break;
                case '2':
                    $question_bank->difficulty = "ADVANCED";
                    break;
            }

            $data = array(
                'question_bank' => $question_bank,
                'questions'     => $questions
            );

            return $data;
        }
        else
            return FALSE;
    }
}
