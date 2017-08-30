<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 03/07/2017
 * Time: 08:39
 */
Route::get('/', function () {
    return view('Core::index');
})->name('index');

Route::get('/admin',function (){
    return view('Admin::index');
});