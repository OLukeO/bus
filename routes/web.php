<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('bus', 'App\Http\Controllers\UserController');

/*Route::get('/user', [Controllers\UserController::class, 'index']);
Route::get('/home', [Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user/add', [Controllers\HomeController::class, 'add']);
Route::post('/user/store', [Controllers\HomeController::class, 'store']);
Route::get('user/edit/{id}', [Controllers\HomeController::class, 'edit']);
Route::post('user/update', [Controllers\HomeController::class, 'update']);
Route::get('user/delete/{id}', [Controllers\HomeController::class, 'delete']);
Route::get('user/buy/{id}', [Controllers\HomeController::class, 'buy']);*/
