<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use function Symfony\Component\String\u;
use App\Http\Controllers;
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

Route::get('/login', [LoginController::class, 'loginForm'])->name('loginForm');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('regis', 'App\Http\Controllers\UserController@regisUserForm')->name('regisForm');
Route::post('regis', 'App\Http\Controllers\UserController@regisUser')->name('regis');

Route::get('/error', function () {
    return view('errorPage');
})->name('error');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'App\Http\Controllers\HomeController@showHome')->name('home');

    Route::prefix('task')->group(function () {
        Route::get('/search', [TaskController::class, 'search'])->name('search');

        //Done
        Route::get('list', [TaskController::class, 'index'])->name('list');
        //in progress
        Route::get('listpage', [TaskController::class, 'pagination'])->name('listpage');

        //Done
        Route::get('detail/{id}', [TaskController::class, 'show'])->name('detail');

        //Done
        Route::get('add', [TaskController::class, 'create'])->name('addTaskForm');
        Route::post('add', [TaskController::class, 'store'])->name('addTask');

        //Done
        Route::get('update/{id}', [TaskController::class, 'edit'])->name('updateTaskForm');
        Route::put('update', [TaskController::class, 'update'])->name('updateTask');

        //Done
        Route::delete('delete/{id}', [TaskController::class, 'destroy'])->name('deleteTask');

        //in progress
        Route::post('', [TaskController::class, 'exportCsv'])->name('exportCsv');

    });
});
