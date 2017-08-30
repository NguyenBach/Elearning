<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 30/08/2017
 * Time: 15:53
 */

namespace App\Modules\User\Request;


use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(){
        return true;
    }
    public function rules(){
        return [
            'username'=>'required',
            'fullname' => 'required',
            'email' =>'required|email',
            'birthday' => 'required|date',
            'password' => 'required',
            'repassword' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'A username is required',
            'password.required'  => 'A password is required',
            'fullname.required' => 'A fullname is required',
            'email.required' =>'A email is required',
            'birthday.required' => 'A birthday is required',
            'repassword.required' => 'Repeat password is required'
        ];
    }
}