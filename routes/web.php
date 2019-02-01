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

Route::get('/test/{id?}', 'TestController@showTest')->name('showTest')->middleware('auth');

Route::post('/test', 'TestController@handleTest')->name('handleTest');

Route::get('/delete/{id}', 'TestController@handleDeleteTest')->name('handleDeleteTest');

Route::get('/update/{id}', 'TestController@showUpdateTest')->name('showUpdateTest');

Route::post('/update/{id}', 'TestController@handleUpdateTest')->name('handleUpdateTest');

Route::get('/student/{id}', 'TestController@showStudents')->name('showStudents');

Route::post('/student/{id}', 'TestController@handleStudent')->name('handleStudent');

Route::get('/show', 'TestController@showStudent')->name('showStudent');


Route::get('/user', 'TestController@showUser')->name('showUser');

Route::post('/user', 'TestController@handleUser')->name('handleUser');

Route::get('/login', 'TestController@showLogin')->name('showLogin');

Route::post('/login', 'TestController@checkLogin')->name('checkLogin');

Route::get('/logout', 'TestController@handleLogout')->name('handleLogout');
