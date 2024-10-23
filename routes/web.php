<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataObatController;
use App\Http\Controllers\DataPenjualanController;

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

Route::get('/dashboard', function () {
    return view('Dashboard.index'); // Pastikan jalur file sudah benar
})->name('dashboard');

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

