<?php

namespace App\Modules\Question\Models;


use Illuminate\Database\Eloquent\Model;

class QuestionBank extends Model
{
    protected $table = 'question_bank';
    protected $fillable = ['name', 'description', 'difficulty'];

}
