<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 03/07/2017
 * Time: 11:14
 */
Route::group([
   'as' => 'questionbank',
   'prefix' => '/teacher/questionbank',
   'namespace' => 'App\Modules\QuestionBank\Controllers'
],function (){
    Route::get('/','Teacher@index');
    Route::get('/datatable','Teacher@get_datatable');

    Route::get('/create','Teacher@create');
    Route::post('/create','Teacher@create');

    Route::get('/edit/{id}','Teacher@edit');
    Route::post('/edit/{id}','Teacher@edit');

    Route::get('/delete/{id}','Teacher@delete');

    Route::get('/detail/{id}','Teacher@get_detail');

    // Route::post('/create_question','Teacher@create_question');

    Route::get('/detail/{id}/question_datatable','Teacher@get_question_datatable');

    Route::get('/detail/{id}/create','Teacher@create_question');
    Route::post('/detail/{id}/create','Teacher@create_question');

    Route::get('/detail/{id}/edit/{qid}','Teacher@edit_question');
    Route::post('/detail/{id}/edit/{qid}','Teacher@edit_question');

    Route::get('/detail/{id}/delete/{qid}','Teacher@delete_question');

});
