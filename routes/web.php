<?php

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\PropertyController;
use App\Http\Controllers\Web\VehicleController;
use Illuminate\Support\Facades\Route;

Route::name('web.')->group(function () {

    Route::get('/', [HomeController::class, 'home'])->name('home');

    Route::get('/veiculos', [VehicleController::class, 'index'])->name('vehicle.index');

    Route::get('/imoveis', [PropertyController::class, 'index'])->name('property.index');

});