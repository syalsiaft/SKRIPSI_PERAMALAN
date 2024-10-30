<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DataObatController;
use App\Http\Controllers\DataPenjualanController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//grafik
Route::get('/chart', [ChartController::class,'index'])->name('chart');

//Data Obat
Route::get('/obat', [DataObatController::class,'index'])->name('obat');
Route::get('/obat/create',[DataObatController::class, 'create'])->name( 'obat.create');
Route::post('/obat/store',[DataObatController::class, 'store'])->name( 'obat.store');
Route::delete('/obat/destroy/{id}',[DataObatController::class, 'destroy'])->name('obat.destroy');
Route::get('/obat/Edit/{id}',[DataObatController::class, 'edit'])->name( 'obat.edit');
Route::put('/obat/update/{id}',[DataObatController::class, 'update'])->name( 'obat.update');

//Data Penjualan
Route::get('/penjualan', [DataPenjualanController::class,'index'])->name('penjualan');
Route::get('/penjualan/create',[DataPenjualanController::class, 'create'])->name( 'penjualan.create');
Route::post('/penjualan/store',[DataPenjualanController::class, 'store'])->name( 'penjualan.store');
Route::delete('/penjualan/destroy/{id}',[DataPenjualanController::class, 'destroy'])->name('penjualan.destroy');
Route::get('/penjualan/Edit/{id}',[DataPenjualanController::class, 'edit'])->name( 'penjualan.edit');
Route::put('/penjualan/update/{id}',[DataPenjualanController::class, 'update'])->name( 'penjualan.update');

//Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login_action']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [ChartController::class, 'index'])->name('dashboard')->middleware('auth');




