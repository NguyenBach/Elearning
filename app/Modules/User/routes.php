<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 07/08/2017
 * Time: 22:12
 */
Route::group([
    'as' => 'user::',
    'prefix' => '/user',
    'namespace' => 'App\Modules\User\Controller'
],function (){
    Route::get('/register',function (){
        return view('User::register');
    })->name('dangky');
    Route::post('/register','UserController@register');
    Route::get('/logout','UserController@logout')->name('logout');
});