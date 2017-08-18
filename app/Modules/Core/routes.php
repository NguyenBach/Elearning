<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 03/07/2017
 * Time: 08:39
 */
Route::get('/', function () {
    return view('Core::index');
});
Route::get('/login',function (){
    return view('Core::login');
});
Route::post('/login','App\Modules\User\Controller\UserController@login');
Route::get('/admin',function (){
    return view('Admin::index');
});