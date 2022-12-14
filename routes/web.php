<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\OfferController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Web\VehicleController;
use App\Http\Controllers\Web\PropertyController;
use App\Http\Controllers\Admin\AuctionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\VehicleController as AdminVehicleController;
use App\Http\Controllers\Admin\PropertyController as AdminPropertyController;
use App\Http\Controllers\Admin\OfferController as AdminOfferController;

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

    Route::post('product/offer', [OfferController::class, 'create'])->name('make.offer');
    Route::post('meus-lances', [OfferController::class, 'index'])->name('client.offers');

});

Route::name('admin.')->prefix('admin')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('login', [AdminAuthController::class, 'login'])->name('login');

    Route::resource('banks', BankController::class);
    Route::resource('auctions', AuctionController::class);
    Route::resource('vehicles', AdminVehicleController::class);
    Route::resource('properties', AdminPropertyController::class);

    Route::get('offers/{id}/vehicles', [AdminOfferController::class, 'vehicles'])->name('offers.vehicles');
    Route::get('offers/{id}/properties', [AdminOfferController::class, 'properties'])->name('offers.properties');

});