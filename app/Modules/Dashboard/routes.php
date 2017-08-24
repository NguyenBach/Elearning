<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 08/08/2017
 * Time: 21:23
 */

Route::group([
   'as' => 'dashboard::',
    'prefix' => '/dashboard',
    'namespace' => 'App\Modules\Dashboard\Controller'
],function (){
    Route::get('/','DashboardController@index')->name('index');
//    Route::get('/editcourse/{id}','DashboardController@editCourse')->name('edit');
//    Route::post('/editcourse/{id}','DashboardController@newCourse')->name('new');
//    Route::get('/course/{id}','DashboardController@courseOverview')->name('overview');
//    Route::get('/course/{id}/editlesson/{lesson}','DashboardController@editLesson')->name('editlesson');
//    Route::post('/newform','DashboardController@newActivityForm')->name('newform');
});
