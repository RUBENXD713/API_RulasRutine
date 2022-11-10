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



//Rutas Pesos

Route::middleware('auth:sanctum')->post('/v1/peso/add_weight','PesosController@add_weight');
Route::middleware('auth:sanctum')->get('/v1/peso/peso_perdido','PesosController@get_first_last_weight');
Route::middleware('auth:sanctum')->get('/v1/peso/get_historial','PesosController@index_weight');
Route::middleware('auth:sanctum')->delete('/v1/peso/delete_weight/{id}','PesosController@delete_weight');





//Rutas Niveles

Route::middleware('auth:sanctum')->get('/v1/levels/get_all','NivelesController@get_levels');
Route::middleware('auth:sanctum')->get('/v1/levels/get_one/{id}','NivelesController@get_level');

Route::middleware('auth:sanctum')->put('/v1/levels/update/{id}','NivelesController@update_level');
Route::middleware('auth:sanctum')->put('/v1/levels/disable/{id}','NivelesController@disable');
Route::middleware('auth:sanctum')->put('/v1/levels/enable/{id}','NivelesController@enable');


