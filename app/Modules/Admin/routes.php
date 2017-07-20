<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 17/07/2017
 * Time: 16:12
 */
Route::group([
    'as' => 'admin',
    'prefix' =>'/admin'
],function (){
    Route::get('/',function (){
       return view('Admin::index');
    });
});