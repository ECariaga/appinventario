<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\UsuarioController;

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

Route::resource("/articulo", ArticuloController::class)->middleware('auth');

Route::get('/registrarse',[RegisterController::class,'create'])->name('registrarse.index');
Route::post('/registrarse',[RegisterController::class,'register'])->name('registrarse.register');

Route::get('/login',[SessionsController::class,'create'])->name('login.index');
Route::post('/login',[SessionsController::class,'login'])->name('login.login');
Route::get('/logout',[SessionsController::class,'destroy'])->name('login.destroy');


Route::resource('/lista-usuarios',UsuarioController::class);

//Rutas Excel
Route::get('/reportes',[ExportController::class,'index'])->name('reporte');
Route::get('/exportar',[ExportController::class,'export'])->name('exportar');