<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 26/06/2017
 * Time: 21:12
 */
Route::group([
   'as' => 'course::',
    'prefix' => '/course',
    'namespace' => 'App\Modules\Course\Controller'
],function (){
    Route::get('/','CourseController@index');
    Route::get('/newcourse',function (){
       return view('Course::form.NewCourse');
    });
    Route::post('/newcourse','CourseController@newCourse');
    Route::get('/{id}',['uses'=>'CourseController@showCourse','as'=>'courseview']);
});