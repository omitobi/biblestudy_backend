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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/messages', 'MessageController@send')->name('messages.send');

Route::get('/groups', 'GroupController@index')->name('group');
Route::get('/groups/{group}/messages', 'MessageController@index')->name('messages');