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
    Route::get('/','CourseController@index')->name('index');
    Route::get('/editcourse/{id}','CourseController@editCourse');
    Route::post('/editcourse','CourseController@newCourse');
    Route::get('/{id}',['uses'=>'CourseController@showCourse','as'=>'courseview']);
    Route::get('/{id}/{lessonid}','LessonController@showLesson')->name('lesson');
    Route::get('/{id}/editlesson/{lessonid}','LessonController@editLesson');
    Route::post('/{id}/editlesson/{lessonid}','LessonController@newLesson');
});

Route::group([
    'as' => 'CourseAPI::',
    'prefix' => '/api/course',
    'namespace'=> 'App\Modules\Course\Controller'
],function (){
    Route::get('/allactivity','ActivityController@getAllActivityType');
});