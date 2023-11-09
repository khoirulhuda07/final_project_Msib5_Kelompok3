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
    
    // Route::get('/home', [HomeController::class, 'index']);

});


// Admin
Route::prefix('admin')->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Resource Controller
    Route::resource('akun', AkunController::class);
    Route::resource('paket', PaketController::class);
    Route::resource('penerima', PenerimaController::class);
    Route::resource('pembayaran', PembayaranController::class);
    Route::resource('pengiriman', PengirimanController::class);
    Route::resource('kurir', KurirController::class);
    Route::resource('dompet', DompetController::class);
    Route::resource('layanan', LayananController::class);
    Route::resource('paket', PaketController::class);

});
//user
Route::prefix('user')->group(function(){
    Route::get('/dashboard',[HomeController::class, 'index']);
});
