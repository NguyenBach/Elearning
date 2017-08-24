<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 17/07/2017
 * Time: 15:56
 */
Route::group([
   'as' => 'Video::',
    'prefix' => '/video',
    'namespace' => 'App\Modules\activity\Video\Controller'
],function (){
    Route::get('/add','VideoController@addForm')->name('addForm');
    Route::post('/add','VideoController@addVideo')->name('add');
});