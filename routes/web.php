<?php

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\OfferController;
use App\Http\Controllers\Web\PropertyController;
use App\Http\Controllers\Web\VehicleController;
use App\Http\Controllers\Web\AuthController;
use Illuminate\Support\Facades\Route;

Route::name('web.')->group(function () {

    Route::get('/', [HomeController::class, 'home'])->name('home');

    Route::get('/veiculos', [VehicleController::class, 'index'])->name('vehicle.index');
    Route::get('/veiculos/{id}', [VehicleController::class, 'show'])->name('vehicle.show');

    Route::get('/imoveis', [PropertyController::class, 'index'])->name('property.index');
    Route::get('/imoveis/{id}', [PropertyController::class, 'show'])->name('property.show');

    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginPost'])->name('login.post');

    Route::get('registrar', [AuthController::class, 'register'])->name('register');
    Route::post('registrar', [AuthController::class, 'registerPost'])->name('register.post');

    Route::post('/product/offer', [OfferController::class, 'create'])->name('make.offer');


});