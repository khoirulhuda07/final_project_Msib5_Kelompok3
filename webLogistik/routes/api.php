<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homepage\LacakController;
use App\Http\Controllers\api\pengirimanController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/lacak', [LacakController::class, 'index']);
Route::get('/lacak/{kode}', [LacakController::class, 'show']);
Route::get('/pengiriman', [pengirimanController::class, 'index']);
Route::post('/pengiriman', [pengirimanController::class, 'store']);
Route::put('/pengiriman/{id}', [pengirimanController::class, 'update']);
// Route::get('/lacak', function(){
//     dd('test api');
// });
