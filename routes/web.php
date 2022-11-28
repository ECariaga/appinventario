<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

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
    return view('home');
});

Route::resource("/articulo", ArticuloController::class);
//Route::post('/articulo/{id}', [ArticuloController::class, 'updateCategoria']);

Route::get('/registrarse',[RegisterController::class,'create'])->name('registrarse.index');
Route::get('/login',[SessionsController::class,'create'])->name('login.index');