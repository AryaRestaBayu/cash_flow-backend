<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CashFlowController;
use App\Http\Controllers\UserController;


 // Route UserController
 Route::post('/register', [UserController::class, 'register']);
 Route::post('/login', [UserController::class, 'login']);
 Route::post('/logout', [UserController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    // Route CashFlowController
    Route::get('/cashflows', [CashFlowController::class, 'index']);
    Route::post('/cashflows', [CashFlowController::class, 'store']);
    Route::get('/cashflows/{id}', [CashFlowController::class, 'show']);
    Route::put('/cashflows/{id}', [CashFlowController::class, 'update']);
    Route::delete('/cashflows/{id}', [CashFlowController::class, 'destroy']);
});
