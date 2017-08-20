<?php

 /* ----------------------------------------------------------- */
 /*  MAIN PAGE
 /* ----------------------------------------------------------- */
 Route::group([
    'as' => 'quiz',
    'prefix' => '/quiz',
    'namespace' => 'App\Modules\Quiz\Controllers'
 ],function (){
     Route::get('/','Main@index');
     Route::get('/{id}','Main@view');
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

    Route::get('/detail/{id}/question_datatable','TeacherTeacher@get_question_datatable');

    Route::get('/detail/{id}/create','Teacher@create_question');
    Route::post('/detail/{id}/create','Teacher@create_question');

    Route::get('/detail/{id}/edit/{qid}','Teacher@edit_question');
    Route::post('/detail/{id}/edit/{qid}','Teacher@edit_question');

    Route::get('/detail/{id}/delete/{qid}','Teacher@delete_question');

});
