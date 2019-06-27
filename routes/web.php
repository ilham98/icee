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

Route::group(['prefix' => 'admin'], function() {
	Route::get('news', 'NewsController@index');
	Route::post('news', 'NewsController@store');
	Route::delete('news/{id}', 'NewsController@destroy');
	Route::get('news/{id}', 'NewsController@edit');
	Route::put('news/{id}', 'NewsController@update');
	Route::get('teachers', 'TeacherController@index');
	Route::get('teachers/{id}', 'TeacherController@edit');
	Route::put('teachers/{id}', 'TeacherController@update');
	Route::post('teachers', 'TeacherController@store');
	Route::delete('teachers/{id}', 'TeacherController@destroy');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login', 'LoginController@showLoginPage')->name('login')->middleware('guest');
Route::post('/login', 'LoginController@login');

Route::get('/dashboard', 'HomeController@dashboard')->middleware('auth');