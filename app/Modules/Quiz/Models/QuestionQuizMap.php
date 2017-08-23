<?php

namespace App\Modules\Quiz\Models;


use Illuminate\Database\Eloquent\Model;

class QuestionQuizMap extends Model
{
    protected $table = 'question_quiz_maps';
    protected $fillable = ['quiz_id', 'question_id', 'bank_id'];

}
