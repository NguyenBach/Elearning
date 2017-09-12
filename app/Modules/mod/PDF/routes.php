<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 17/07/2017
 * Time: 15:56
 */
Route::group([
   'as' => 'PDF::',
    'prefix' => '/pdf',
    'namespace' => 'App\Modules\mod\PDF\Controller'
],function (){
    Route::get('/add','PDFController@form')->name('addForm');
    Route::post('/add','PDFController@add')->name('add');
});