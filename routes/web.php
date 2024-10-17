<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('dokter', dokterController::class);
Route::resource('pasien', PasienController::class);
Route::get('/siswa/export_excel', [PasienController::class, 'export_excel'])->name('pasien.export_excel');
