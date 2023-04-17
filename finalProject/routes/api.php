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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'App\Http\Controllers\LoginController@login')->name('login')->where(null, null);
Route::post('user/regis', 'App\Http\Controllers\UserController@regis')->name('regis')->where(null, null);
Route::get('task/list', 'App\Http\Controllers\TaskController@list')->name('list')->where(null, null);
Route::post('task/add', 'App\Http\Controllers\TaskController@list')->name('addTask')->where(null, null);
Route::delete('task/delete/{id}', 'App\Http\Controllers\TaskController@delete')->name('deleteTask')->where(null, null);
Route::put('task/update', 'App\Http\Controllers\TaskController@update')->name('updateTask')->where(null, null);
