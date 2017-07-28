<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 21/07/2017
 * Time: 21:23
 */

namespace App\Modules\Course\Request;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CourseRequest extends FormRequest
{
    public function authorize(){
        return true;
    }
    public function rules(){
        return [
            'fullname' =>  'required',
            'shortname' => 'required',
            'intro' => '',
            'featurepicture' => '',
            'startdate' => '',
            'courseformat' => 'required',
            'numberlessons' => 'required',
            'active' => 'required',
            'visible' => 'required',
            'action' =>'required'
        ];
    }
}