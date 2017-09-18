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
    'namespace' => 'App\Modules\mod\Video\Controller',
    'middleware' => ['web','permission']
],function (){
    Route::get('/add','VideoController@form')->name('addForm');
    Route::post('/add','VideoController@add')->name('addVideo');
});