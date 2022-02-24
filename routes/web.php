<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/', 'principal')->name('principal');
Route::get('/inicio', [HomeController::class,'index'])->name('inicio');
Route::get('meteCarro/{producto}', [HomeController::class,'meteCarro'])->name('metecarro');
Route::get('quitaCarro/{producto}', [HomeController::class,'quitaCarro'])->name('quitacarro');
Route::get('detalle/{producto}', [HomeController::class,'detalle'])->name('detalle');
Route::get('cesta', [HomeController::class,'cesta'])->name('cesta');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
