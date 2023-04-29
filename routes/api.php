<?php

use App\Http\Controllers\Invoices\InvoiceController;
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

Route::post('/invoice', [InvoiceController::class, 'index'])->name('invoice.index');
Route::post('/invoice/approve', [InvoiceController::class, 'approve'])->name('invoice.approve');
Route::post('/invoice/reject', [InvoiceController::class, 'reject'])->name('invoice.reject');
