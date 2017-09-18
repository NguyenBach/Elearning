<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 29/07/2017
 * Time: 10:34
 */

Route::group([
   'as' => 'Text::',
    'prefix' => '/text',
    'namespace' => 'App\Modules\mod\Text\Controller',
    'middleware' => ['web','permission']
],function (){
    Route::get('/add','TextController@add')->name('addForm');
    Route::post('/add','TextController@addText')->name('addtext');
});