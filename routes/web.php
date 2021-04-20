<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('notice');
});

Route::get('/test', function () {
    return view('test');
});

Route::post('/play', function () {
    return view('play');
});
Route::get('/loser', function () {
    return view('loser');
});

Route::get('/terms', function () {
    return view('terms');
});
Route::get('/vewsBackup', function () {
    return view('vewsBackup');
});
Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/winner', function () {
    return view('winner');
});
Route::get('/promoCode', function () {
    return view('promoCode');
});


Route::post('/createUser','MainController@createUser');
Route::post('/sendResult','MainController@sendResult');



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
