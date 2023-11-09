<?php

use Illuminate\Support\Facades\Route;

//Admin Namespace
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AkunController;
use App\Http\Controllers\Admin\DompetController;
use App\Http\Controllers\Admin\KurirController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\PaketController;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Admin\PenerimaController;
use App\Http\Controllers\Admin\PengirimanController;
use App\Http\Controllers\User\HomeController;

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
    return view('welcome');
});

// User
Route::prefix('user')->group(function () {
    
    Route::get('/home',[HomeController::class, 'index']);

});


// Admin
Route::prefix('admin')->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Resource Controller
    Route::resource('akun', AkunController::class)->except(['update', 'destroy']);
    Route::resource('pengiriman', PengirimanController::class)->except(['update', 'destroy']);
    Route::resource('paket', PaketController::class);
    Route::resource('penerima', PenerimaController::class)->except(['update','destroy']);
    Route::resource('pembayaran', PembayaranController::class);
    Route::resource('kurir', KurirController::class);
    Route::resource('dompet', DompetController::class);
    Route::resource('layanan', LayananController::class);
    Route::resource('paket', PaketController::class);

    // Route Update & Delete
    // Akun
    Route::post('/akun/update/{id}', [AkunController::class,'update']);
    Route::get('/akun/delete/{id}', [AkunController::class,'destroy']);

    // Pengiriman
    Route::post('/pengiriman/update/{id}', [PengirimanController::class,'update']);
    Route::get('/pengiriman/delete/{id}', [PengirimanController::class,'destroy']);

    //penerima
    Route::post('/penerima/update/{id}',[PenerimaController::class,'update']);
    Route::get('/penerima/delete/{id}',[PenerimaController::class,'destroy']);
});
