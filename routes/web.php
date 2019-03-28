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

Auth::routes(['verify'=>true]);
Route::get('login/google', 'Auth\LoginController@redirectToProvider')->name('google.login');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');
Route::put('user/update/{user}','UsersController@update')->name('user.update');
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/current', 'UsersController@current');
Route::resource('events','EventsController');

Route::resource('mooc','MoocsController')->middleware('verified');

Route::group(['prefix'=>'{mooc}'],function(){
    Route::resource('chapter','ChaptersController')->middleware('verified');
});

Route::post('/home/file','HomeController@storefile')->name('file.store')->middleware('verified');

