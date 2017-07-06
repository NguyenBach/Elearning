<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 26/06/2017
 * Time: 21:12
 */
Route::get('/course',function (){
    return view("Course::index");
});
Route::get('/course/listening',function (){
    return view("Course::format.listeningFormat");
});
Route::group(['namespace'=>'App\Modules\Course\Controller'],function (){
    Route::post('/course/addcourse','CourseController@addcourse');
    Route::group([
        'name'=>'course',
        'prefix'=>'/course'
    ],function (){
        Route::get('/{id}','CourseController@course');
        Route::post('/{id}','CourseController@addContent');
    });

});
