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
    'namespace' => 'App\Modules\Course\Controller',
    'middleware' => ['web','permission']
], function () {
    Route::get('/overview/{id}', 'CourseController@courseOverview')->name('overview');
    Route::get('/editcourse/{id}', 'CourseController@showEditForm')->name('edit');
    Route::post('/editcourse/{id}', 'CourseController@create');

    Route::get('/{id}/editlesson', 'LessonController@showEditLessonForm')->name('editlesson');
    Route::post('/{id}/editlesson', 'LessonController@create');
    Route::get('/overview/{courseid}/lesson/{lessonid}','LessonController@lessonOverview')->name('lessonOverview');

    Route::post('/newform','ActivityController@createActivity')->name('createActivity');
    Route::post('/delete/activity/delete','ActivityController@deleteActivity')->name('deleteactivity');
});

Route::group([
    'as' => 'course::',
    'prefix' => '/course',
    'namespace' => 'App\Modules\Course\Controller',
    'middleware' => 'web'
],function (){
    Route::get('/', 'CourseController@index')->name('index');
    Route::get('/{id}',  'CourseController@show')->name('show');
    Route::get('/{id}/{lessonid}', 'LessonController@show')->name('lesson');

});

Route::group([
    'as' => 'CourseDashboard::',
    'prefix' => '/dashboard/course',
    'namespace' => 'App\Modules\Course\Controller'
], function () {
    Route::get('/', 'CourseController@dashboard_index')->name('index');
});

Route::group([
    'as' => 'ActivityDashboard::',
    'prefix' => '/dashboard/activity',
    'namespace' => 'App\Modules\Course\Controller'
], function () {
    Route::get('/', 'ActivityController@dashboard_index')->name('index');
});


Route::group([
    'as' => 'CourseAPI::',
    'prefix' => '/api/course',
    'namespace' => 'App\Modules\Course\Controller'
], function () {
    Route::get('/allactivity', 'ActivityController@getAllActivityType');
});