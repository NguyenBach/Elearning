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
    Route::get('/','DashboardController@index');
});