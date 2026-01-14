<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('order')->group(function () {
    Route::get('/', [OrderController::class, 'getAll']);
    Route::post('/', [OrderController::class, 'store']);
    Route::get('/{id}', [OrderController::class, 'show']);
    Route::put('/{id}', [OrderController::class, 'update']);
    Route::delete('/{id}', [OrderController::class, 'remove']);
});

Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'getAll']);
    Route::post('/', [ProductController::class, 'store']);
    Route::get('/{id}', [ProductController::class, 'show']);
    Route::put('/{id}', [ProductController::class, 'update']);
    Route::delete('/{id}', [ProductController::class, 'remove']);
});
