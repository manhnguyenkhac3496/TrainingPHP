<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

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


Route::get('/login', function () {
    return view('user/login');
});

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/home1', function () {
    return "This is home page 1!";
})->name('home1');

//Route::group(['middleware' => ['check_access', 'auth']], function() {
//Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return "This is home page!";
    })->name('home');

    Route::prefix('admin/regis_user')->group(function () {
        Route::get('', function () {
            return view('regisUser');
        });
        Route::post('', 'App\Http\Controllers\UserController@regis')->name('regis');
    });

    Route::prefix('task')->group(function () {
        Route::get('list', 'App\Http\Controllers\TaskController@list')->name('list');
        Route::post('add', 'App\Http\Controllers\TaskController@list')->name('addTask');
        Route::delete('delete/{id}', 'App\Http\Controllers\TaskController@delete')->name('deleteTask');
        Route::put('update', 'App\Http\Controllers\TaskController@update')->name('updateTask');
    });
//});
