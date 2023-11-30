<?php

use Illuminate\Support\Facades\Route;

// Admin Namespace
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\AkunController;
use App\Http\Controllers\Admin\DompetController;
use App\Http\Controllers\Admin\ImportKurirController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\PaketController;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Admin\PenerimaController;
use App\Http\Controllers\Admin\PengirimanController;

use App\Http\Controllers\Admin\KurirController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\ProfileAdminController;

// User Namespace
use App\Http\Controllers\transaksiController;
use App\Http\Controllers\User\HomeUserController;
use App\Http\Controllers\User\ProfileUserController;
use App\Http\Controllers\User\PengirimanUserController;
use App\Http\Controllers\User\PembayaranUserController;
use App\Http\Controllers\User\TopUpController;

// homepae namaspace
use App\Http\Controllers\Homepage\HomepageController;
use App\Http\Controllers\Homepage\LacakController;
use App\Http\Controllers\Homepage\LoginController;



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
    return view('homepage.dashboardhome');
});


Route::get('/home', [HomepageController::class, 'index']);
Route::get('/lacakpaket', [LacakController::class, 'index1']);
// Route::get('/login', function() {
//     return view('auth.login');
// });

// Rute untuk admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index']);

        // Resource Controller
        Route::resource('akun', AkunController::class);
        Route::resource('pengiriman', PengirimanController::class);
        Route::resource('paket', PaketController::class);
        Route::resource('penerima', PenerimaController::class);
        Route::resource('pembayaran', PembayaranController::class);
        Route::resource('kurir', KurirController::class);
        Route::resource('dompet', DompetController::class);
        Route::resource('layanan', LayananController::class);
        Route::resource('paket', PaketController::class);

        // profile
        Route::get('/profile', [ProfileAdminController::class, 'show']);
        Route::patch('/profile/{id}', [ProfileAdminController::class, 'update']);

        // Laporan Controller
        Route::get('/laporan', [LaporanController::class, 'index']);
        Route::get('/laporan/laporanPDF', [LaporanController::class, 'exportPDF']);
        Route::get('/laporan/laporanExcel', [LaporanController::class, 'exportPengiriman']);

        // import excel
        Route::post('/kurir/importKurir', [ImportKurirController::class, 'importKurir']);
    });
});

// Rute untuk user
Route::middleware(['auth', 'user'])->group(function () {
    Route::prefix('user')->group(function () {

        Route::get('/home', [HomeUserController::class, 'index']);
        Route::get('/profile', [ProfileUserController::class, 'index']);
        // Pengiriman Controller
        Route::get('/pengirimanUser', [PengirimanUserController::class, 'index']);
        Route::post('/pengirimanUser', [PengirimanUserController::class, 'store']);
        Route::get('/pengirimanUser/create', [PengirimanUserController::class, 'create']);
        Route::post('/pengirimanUser/pull', [PengirimanUserController::class, 'pul']);
        // Pembayaran Controller
        Route::get('/pembayaranUser', [PembayaranUserController::class, 'index']);

        // Resource Controller
        // Route::resource('transaksi', transaksiController::class);

        // Dompetku Controller
        Route::get('/dompetku', [TopUpController::class, 'index']);
        Route::post('/dompetku/store', [TopUpController::class, 'store']);
        Route::get('/dompetku/laporanPDF/{id}', [TopUpController::class, 'exportPDF']);
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
