<?php

use App\Http\Controllers\Admin\AuctionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\VehicleController;

/**Auth Routes */
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

/**JWT Token protected Routes */
Route::middleware('auth:api')->group(function () {

    Route::apiResource('banks', BankController::class);

    Route::apiResource('auctions', AuctionController::class);

    Route::apiResource('vehicles', VehicleController::class);

    Route::apiResource('properties', PropertyController::class);

    Route::apiResource('offers', OfferController::class);

});
