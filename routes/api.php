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
Route::post('login','Api\AuthController@login');
Route::post('register','Api\AuthController@register');
Route::get('logout', 'Api\AuthController@logout');

//room
Route::post('rooms/create', 'Api\RoomController@create')->middleware('jwtAuth');
Route::post('rooms/delete', 'Api\RoomController@delete')->middleware('jwtAuth');
Route::post('rooms/update', 'Api\RoomController@update')->middleware('jwtAuth');
Route::get('rooms', 'Api\RoomController@rooms')->middleware('jwtAuth');

//furniture
Route::post('furniture/create', 'Api\FurnitureController@create')->middleware('jwtAuth');
Route::post('furniture/delete', 'Api\FurnitureController@delete')->middleware('jwtAuth');
Route::post('furniture/update', 'Api\FurnitureController@update')->middleware('jwtAuth');
Route::get('furniture', 'Api\FurnitureController@furniture')->middleware('jwtAuth');
