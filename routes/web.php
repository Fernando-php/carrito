<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class,'index'])->name('inicio');
Route::get('meteCarro/{producto}', [HomeController::class,'meteCarro'])->name('metecarro');
Route::get('quitaCarro/{producto}', [HomeController::class,'quitaCarro'])->name('quitacarro');
Route::get('detalle/{producto}', [HomeController::class,'detalle'])->name('detalle');
Route::get('cesta', [HomeController::class,'cesta'])->name('cesta');