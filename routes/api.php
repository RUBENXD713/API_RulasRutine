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
Route::middleware('auth:sanctum')->get('/v1/usr/get_all','UsersController@get_all');


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


Route::middleware('auth:sanctum')->get('/v1/levels/get_user_level','NivelesController@get_user_level');





//Rutas Calorias

Route::middleware('auth:sanctum')->post('/v1/calorias/add_calories','CaloriasController@add_calories');
Route::middleware('auth:sanctum')->get('/v1/calorias/get_all_user','CaloriasController@get_all_user');





//Rutas Ejercicios

Route::middleware('auth:sanctum')->post('/v1/ejercicios/add_exercise','EjerciciosController@add_exercise');


Route::middleware('auth:sanctum')->get('/v1/ejercicios/get_one/{id}','EjerciciosController@get_one');
Route::middleware('auth:sanctum')->get('/v1/ejercicios/get_all','EjerciciosController@get_all');
Route::middleware('auth:sanctum')->get('/v1/ejercicios/get_all_enabled','EjerciciosController@get_all_enabled');
Route::middleware('auth:sanctum')->get('/v1/ejercicios/get_all_disabled','EjerciciosController@get_all_disabled');


Route::middleware('auth:sanctum')->put('/v1/ejercicios/update_ejercise/{id}','EjerciciosController@update_ejercise');
Route::middleware('auth:sanctum')->put('/v1/ejercicios/enable/{id}','EjerciciosController@enable');
Route::middleware('auth:sanctum')->put('/v1/ejercicios/disable/{id}','EjerciciosController@disable');





//Rutas Partes del Cuerpos

Route::middleware('auth:sanctum')->get('/v1/cuerpos/get_one/{id}','CuerposController@get_one');
Route::middleware('auth:sanctum')->get('/v1/cuerpos/get_all','CuerposController@get_all');

Route::middleware('auth:sanctum')->put('/v1/cuerpos/update/{id}','CuerposController@update');
Route::middleware('auth:sanctum')->put('/v1/cuerpos/enable/{id}','CuerposController@enable');
Route::middleware('auth:sanctum')->put('/v1/cuerpos/disable/{id}','CuerposController@disable');





//Rutas Tipos

Route::middleware('auth:sanctum')->get('/v1/tipos/get_one/{id}','TiposController@get_one');
Route::middleware('auth:sanctum')->get('/v1/tipos/get_all','TiposController@get_all');

Route::middleware('auth:sanctum')->put('/v1/tipos/update/{id}','TiposController@update');
Route::middleware('auth:sanctum')->put('/v1/tipos/enable/{id}','TiposController@enable');
Route::middleware('auth:sanctum')->put('/v1/tipos/disable/{id}','TiposController@disable');



//Rutas Rutinas
Route::middleware('auth:sanctum')->post('/v1/rutinas/add_rutine','RutinasController@add_rutine');

Route::middleware('auth:sanctum')->get('/v1/rutinas/get_one/{id}','RutinasController@get_one');
Route::middleware('auth:sanctum')->get('/v1/rutinas/get_all','RutinasController@get_all');

Route::middleware('auth:sanctum')->put('/v1/rutinas/update/{id}','RutinasController@update');
Route::middleware('auth:sanctum')->put('/v1/rutinas/disable/{id}','RutinasController@disable');