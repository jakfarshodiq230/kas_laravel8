<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\DasbortController;
use App\Http\Controllers\OtentikasiController;
use App\Http\Middleware\CekLoginMiddleware;
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

Route::get('/', [OtentikasiController::class, 'index'])->name('login');
Route::post('login', [OtentikasiController::class, 'login'])->name('login');

Route::group(['middleware' => 'CekLoginMiddleware'], function(){
    Route::resource('dasbort', DasbortController::class);
    Route::resource('pemasukan', PemasukanController::class);
    Route::resource('pengeluaran', PengeluaranController::class);
    Route::resource('pengguna', PenggunaController::class);
    Route::get('pengguna/kabupaten/{id}',[PenggunaController::class, 'kabupaten']);
    Route::get('pengguna/kecamatan/{id}',[PenggunaController::class, 'kecamatan']);
    Route::get('pengguna/desa/{id}',[PenggunaController::class, 'desa']);
    Route::get('logout',  [OtentikasiController::class, 'logout'])->name('logout');
});


