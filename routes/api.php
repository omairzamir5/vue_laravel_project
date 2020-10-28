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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//login
Route::middleware('auth:api')->post('/login', 'API\LoginController@login');

//Users 
Route::post('api/user', 'API\UserController@store');
Route::get('api/user', 'API\UserController@show');
Route::post('api/user', 'API\UserController@update');
Route::delete('api/user/{id}', 'API\UserController@delete');