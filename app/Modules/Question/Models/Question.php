<?php

namespace App\Modules\Question\Models;


use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'question';
    protected $fillable = ['question', 'bank_id', 'option_0', 'option_1', 'option_2', 'option_3'];

}
