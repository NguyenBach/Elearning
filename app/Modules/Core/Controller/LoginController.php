<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 26/07/2017
 * Time: 15:50
 */

namespace App\Modules\Core\Controller;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        if($username == 'dangian1' && $password == '123456'){
            $request->session()->put('permission','teacher');
            return redirect('/');
        }else{
            return redirect('/login');
        }
    }
}