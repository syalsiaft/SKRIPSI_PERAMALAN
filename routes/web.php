<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DashboardController;
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



Route::get('/', function () {
    return view('pages.login.index');
});
Route::resource('dashboard', DashboardController::class)->middleware('auth');
//update chart filter
Route::get('/chart/{id_obat}/{tahun}', [DashboardController::class, 'getChartData']);

//Data Obat
Route::resource('obat', DataObatController::class)->middleware('auth');

//Data Penjualan
Route::resource('penjualan', DataPenjualanController::class)->middleware('auth');

//Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login_action']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
