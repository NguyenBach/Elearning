<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 11/09/2017
 * Time: 15:28
 */

namespace App\Modules\Course\Request;


use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
{
    public function authorize(){
        return true;
    }
    public function rules(){
        return [
            'courseid' =>'required',
            'title' => 'required',
            'summary' => 'required',
            'template' => 'required'
        ];
    }
}