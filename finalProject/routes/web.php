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


Route::get('/login', function () {
    return view('user/login');
});

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('error', function () {
    return redirect('errorPage');
})->name('error');

//Route::group(['middleware' => ['check_access', 'auth']], function() {
Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return "This is home page!";
    })->name('home');

    Route::prefix('admin/regis_user')->group(function () {
        Route::get('', function () {
            return view('regisUser');
        });
        Route::post('', 'App\Http\Controllers\UserController@regisUser')->name('regis');
    });

    Route::prefix('task')->group(function () {
        Route::get('add', function () {
            return view('home');
        });

        Route::get('list', [LoginController::class, 'index'])->name('list');
        Route::post('add', [LoginController::class, 'store'])->name('addTask');
        Route::get('detail', [LoginController::class, 'show'])->name('detail');
        Route::put('update', [LoginController::class, 'update'])->name('updateTask');
        Route::delete('delete/{id}', [LoginController::class, 'destroy'])->name('deleteTask');
    });
});
