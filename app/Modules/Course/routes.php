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
], function () {
    Route::get('/', 'CourseController@index')->name('index');
    Route::get('/editcourse/{id}', 'CourseController@editCourse')->name('edit');
    Route::post('/editcourse/{id}', 'CourseController@newCourse');
    Route::get('/overview/{id}', 'CourseController@courseOverview')->name('overview');
    Route::get('/{id}', ['uses' => 'CourseController@showCourse', 'as' => 'courseview']);
    Route::get('/{id}/{lessonid}', 'LessonController@showLesson')->name('lesson');
    Route::get('/{id}/editlesson/{lessonid}', 'LessonController@editLesson')->name('editlesson');
    Route::post('/{id}/editlesson/{lessonid}', 'LessonController@newLesson');
    Route::post('/newform','ActivityController@newActivityForm')->name('newform');
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