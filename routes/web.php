<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|s
*/


Route::get('/', 'Test\TestController@test1');
//用户
Route::group(['prefix' => 'user', 'namespace' => 'User'], function() {
    //获取用户
    Route::get('/', 'UserController@test');
});

//Route::get('/test/store', 'UserController@store');
//Route::get('/test/db', 'UserController@dbTest');

//Route::redirect('/here', '/test/dbTest');
//Route::post('/test/age', 'UserController@age');
//Route::post('/upload', 'UserController@upload');
//Route::group(['prefix' => 'event'], function () {
//    Route::any('/event', 'UserController@eventTest');
//    Route::any('/event/test','Test\UserController@event');
//});
//
//
//Route::apiResource('photos', 'PhotoController');
