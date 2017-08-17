<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 03/07/2017
 * Time: 11:14
 */
Route::group([
   'as' => 'questionset',
   'prefix' => '/questionset',
   'namespace' => 'App\Modules\QuestionSet\Controllers'
],function (){
    Route::get('/','QuestionSetController@index');
    Route::get('/datatable','QuestionSetController@get_datatable');

    Route::get('/create','QuestionSetController@create');
    Route::post('/create','QuestionSetController@create');

    Route::get('/generate','QuestionSetController@generate');
    Route::post('/generate','QuestionSetController@generate');

    Route::get('/edit/{id}','QuestionSetController@edit');
    Route::post('/edit/{id}','QuestionSetController@edit');

    Route::get('/delete/{id}','QuestionSetController@delete');

    Route::get('/detail/{id}','QuestionSetController@get_detail');


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
