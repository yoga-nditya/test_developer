<?php

use App\Http\Controllers\CommissionController;
use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/komisi', [CommissionController::class, 'index']);
Route::post('/cicilan/{penjualan_id}', [PaymentController::class, 'store']);
Route::get('/cicilan/{penjualan_id}', [PaymentController::class, 'show']);
Route::post('/pembayaran/{kredit_id}', [PaymentController::class, 'payment']);
Route::get('/pembayaran/{kredit_id}', [PaymentController::class, 'showPayment']);

