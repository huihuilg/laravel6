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

Route::get('/', function () {
    return view('test.welcome');
});

Route::get('/test/store', 'TestController@store');
Route::get('/test/dbTest', 'TestController@dbTest');
Route::redirect('/here', '/test/dbTest');
Route::post('/test/age', 'TestController@age');

Route::apiResource('photos', 'PhotoController');
