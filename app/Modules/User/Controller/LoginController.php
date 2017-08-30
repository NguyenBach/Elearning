<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 29/08/2017
 * Time: 20:44
 */

namespace App\Modules\User\Controller;


use App\Http\Controllers\Controller;
use App\Modules\User\Helper\UserHelper;

class LoginController extends Controller
{
    public function loginView(){
        if(UserHelper::isLogined()) {
            return redirect()->back();
        }else{
            return view('User::login');
        }
    }
}