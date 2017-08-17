<?php

namespace App\Modules\QuestionSet\Models;


use Illuminate\Database\Eloquent\Model;

class QuestionSet extends Model
{
    protected $table = 'question_sets';
    protected $fillable = ['name', 'description'];

    public function get_questions(){
       return $this->belongsToMany('App\Modules\QuestionSet\Models\Question', 'question_set_maps', 'set_id', 'question_id')->get();
    }

    public static function get_detail($id){
        $query         = QuestionSet::find($id);
        if($query){
            $question_set = $query;
            $questions     = $query->get_questions();

            $data = array(
                'question_set' => $question_set,
                'questions'    => $questions
            );

            return $data;
        }
        else
            return FALSE;
    }

}
