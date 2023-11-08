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

// Admin
Route::prefix('admin')->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('akun', AkunController::class);
    Route::get('/kurir',[KurirController::class, 'index']);
    Route::get('/kurir/create',[KurirController::class, 'create']);
    Route::post('/kurir/store',[KurirController::class, 'store']);
    Route::get('/dompet',[DompetController::class, 'index']);
    Route::get('/dompet/create',[DompetController::class, 'create']);
    Route::post('/dompet/store',[DompetController::class, 'store']);
    Route::resource('dompet', DompetController::class);
    Route::resource('layanan', LayananController::class);
    Route::resource('paket', PaketController::class);
    Route::resource('penerima', PenerimaController::class);
    Route::resource('pembayaran', PembayaranController::class);
    Route::resource('pengiriman', PengirimanController::class);

});
