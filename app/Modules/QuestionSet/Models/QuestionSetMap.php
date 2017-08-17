<?php

namespace App\Modules\QuestionSet\Models;


use Illuminate\Database\Eloquent\Model;

class QuestionSetMap extends Model
{
    protected $table = 'question_set_maps';
    protected $fillable = ['set_id', 'question_id', 'bank_id'];

}
