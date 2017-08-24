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
    'namespace' => 'App\Modules\activity\PDF\Controller'
],function (){
    Route::get('/add','PDFController@addForm')->name('addForm');
    Route::post('/add','PDFController@addPDF')->name('add');
});