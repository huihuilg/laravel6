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
    echo 1;
});

Route::get('/tt', 'TestController@test');

//Route::get('/test/store', 'TestController@store');
//Route::get('/test/db', 'TestController@dbTest');

//Route::redirect('/here', '/test/dbTest');
//Route::post('/test/age', 'TestController@age');
//Route::post('/upload', 'TestController@upload');
//Route::group(['prefix' => 'event'], function () {
//    Route::any('/event', 'TestController@eventTest');
//    Route::any('/event/test','Test\EventController@event');
//});
//
//
//Route::apiResource('photos', 'PhotoController');
