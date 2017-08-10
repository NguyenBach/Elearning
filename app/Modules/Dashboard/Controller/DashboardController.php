<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 10/08/2017
 * Time: 10:21
 */

namespace App\Modules\Dashboard\Controller;


use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $teacher = 0;
        $student = 1;
        $session = session('permission');
        if(!isset($session)){
            return redirect('/login');
        }
        foreach ($session as $s){
            if($s == 'teacher') $teacher = 1;
            if($s == 'student') $student = 1;
        }
        if($teacher){
            return view('Dashboard::teacher');
        }
        if($student){
            return view('Dashboard::student');
        }
    }
}