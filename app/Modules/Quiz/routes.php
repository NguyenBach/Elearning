<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 03/07/2017
 * Time: 11:14
 */
Route::group([
   'as' => 'quiz',
   'prefix' => '/teacher/quiz',
   'namespace' => 'App\Modules\Quiz\Controllers'
],function (){
    Route::get('/','Teacher@index');
    Route::get('/datatable','Teacher@get_datatable');

    Route::get('/create','Teacher@create');
    Route::post('/create','Teacher@create');

    Route::get('/generate','Teacher@generate');
    Route::post('/generate','Teacher@generate');

    Route::get('/edit/{id}','Teacher@edit');
    Route::post('/edit/{id}','Teacher@edit');

    Route::get('/delete/{id}','Teacher@delete');

    Route::get('/detail/{id}','Teacher@get_detail');

    // Route::get('/detail/{id}/question_datatable','QuestionController@get_question_datatable');
    //
    // Route::get('/detail/{id}/create','QuestionController@create_question');
    // Route::post('/detail/{id}/create','QuestionController@create_question');
    //
    // Route::get('/detail/{id}/edit/{qid}','QuestionController@edit_question');
    // Route::post('/detail/{id}/edit/{qid}','QuestionController@edit_question');
    //
    // Route::get('/detail/{id}/delete/{qid}','QuestionController@delete_question');

});

Route::group([
   'as' => 'quiz',
   'prefix' => '/quiz',
   'namespace' => 'App\Modules\Quiz\Controllers'
],function (){
    Route::get('/','Main@index');


});
