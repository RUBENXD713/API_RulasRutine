<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Rutas para el usuario
Route::post('/v1/usr/sign_in','UsersController@sign_in');
Route::post('/v1/usr/log_in','UsersController@log_in');

Route::middleware('auth:sanctum')->delete('/v1/usr/log_out','UsersController@log_out');
Route::middleware('auth:sanctum')->get('/v1/usr/profile','UsersController@perfil');

Route::middleware('auth:sanctum')->put('/v1/usr/update_profile','UsersController@update_profile');
Route::middleware('auth:sanctum')->put('/v1/usr/update_user/{id}','UsersController@update_User');
Route::middleware('auth:sanctum')->put('/v1/usr/change_password','UsersController@change_password');

Route::middleware('auth:sanctum')->put('/v1/usr/level_up','UsersController@level_up');