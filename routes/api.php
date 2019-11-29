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

Route::get('students', 'ApiController@getAllStudent');
Route::get('students/{id}','ApiController@getStudent');
Route::get('students','ApiController@createStudent');
Route::get('students/{id}','ApiController@updateStudent');
Route::get('students/{id}','ApiController@deleteStudent');