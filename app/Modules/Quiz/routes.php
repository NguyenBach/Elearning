<?php

 /* ----------------------------------------------------------- */
 /*  MAIN PAGE
 /* ----------------------------------------------------------- */
 Route::group([
    'as' => 'Quiz::',
    'prefix' => '/quiz',
    'namespace' => 'App\Modules\Quiz\Controllers'
 ],function (){
//     Route::get('/','Main@index');
//     Route::get('/{id}','Main@view');
     Route::get('/{id}/doing','Main@doing')->name('doing');
     Route::get('/add','Main@addForm')->name('addForm');
     Route::post('/add','Main@addQuiz')->name('add');
 });

 /* ----------------------------------------------------------- */
 /*  TEACHER ROLE
 /* ----------------------------------------------------------- */
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

    Route::get('/edit/{id}/question_datatable','Teacher@get_question_datatable');

    Route::get('/detail/{id}/create','Teacher@create_question');
    Route::post('/detail/{id}/create','Teacher@create_question');

    Route::get('/detail/{id}/edit/{qid}','Teacher@edit_question');
    Route::post('/detail/{id}/edit/{qid}','Teacher@edit_question');

    Route::get('/detail/{id}/delete/{qid}','Teacher@delete_question');

    Route::post('/edit/{id}/get_questions/','Teacher@get_questions_from_questionbank');
    Route::post('/edit/{id}/choose_question','Teacher@add_question_from_bank');
    Route::get('/edit/{id}/delete_question/{quiz_id}/{question_id}/{bank_id}','Teacher@delete_question');
    Route::post('/edit/{id}/create_question','Teacher@create_question');
    Route::post('/edit/{id}/random_question','Teacher@random_question');

});

