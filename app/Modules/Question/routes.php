<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 03/07/2017
 * Time: 11:14
 */
Route::group([
   'as' => 'question',
   'prefix' => '/question',
   'namespace' => 'App\Modules\Question\Controllers'
],function (){
    Route::get('/','QuestionController@index');
    Route::get('/datatable','QuestionController@get_datatable');
    Route::get('/create','QuestionController@create');
    Route::post('/create','QuestionController@create');
});
