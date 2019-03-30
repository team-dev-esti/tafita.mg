<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// get files options
Route::get('/files','FilesController@index');
// create event
Route::post('/events/create','Api\EventsController@store');
// get event of on user
Route::get('/events/{user}','Api\EventsController@index');
//get users participate in event
Route::get('/events/{user}/{event}','Api\EventsController@show');
// uptade status user
Route::put('/events/update','Api\EventsController@update');
//get selected user
Route::get('/event/selected/{event}','Api\EventsController@showselected');
// profile user
Route::get('/users/{user}','Api\UsersController@show');

Route::post('/event/notify','Api\EventController@notify');

