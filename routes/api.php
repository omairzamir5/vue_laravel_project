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
Route::middleware('auth:api')->post('posts', 'UserController@store');
Route::middleware('auth:api')->get('posts', 'UserController@get');
Route::middleware('auth:api')->delete('posts/{id}', 'UserController@delete');