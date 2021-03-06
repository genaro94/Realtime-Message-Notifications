<?php

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


Route::middleware(['auth'])->group(function(){
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/message', ['as' =>'message', 'uses' => 'MessageController@message']);
    Route::post('/message/submit', ['as' =>'message.submit', 'uses' => 'MessageController@create']);
    Route::get('/send', ['as' =>'message.send', 'uses' => 'MessageController@send']);
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
