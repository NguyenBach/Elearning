<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 29/08/2017
 * Time: 20:30
 */

namespace App\Modules\User\Request;


use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(){
        return true;
    }
    public function rules(){
        return [
            'username' => 'required',
            'password' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'A username is required',
            'password.required'  => 'A password is required',
        ];
    }
}