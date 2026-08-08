<?php

use App\Http\Controllers\Tourist\BookingController;
use App\Http\Controllers\Tourist\DashboardController;
use App\Http\Controllers\Tourist\DestinationController;
use App\Http\Controllers\Tourist\PaymentController;
use App\Http\Controllers\Tourist\TourPackageController;
use App\Http\Controllers\Tourist\WeatherAdvisoryController;
use Illuminate\Support\Facades\Route;

Route::middleware('role:Tourist / User,Administrator')->prefix('tourist')->name('tourist.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('tour-packages', [TourPackageController::class, 'index'])->name('tour-packages');
    Route::get('destinations', [DestinationController::class, 'index'])->name('destinations');
    Route::get('my-bookings', [BookingController::class, 'index'])->name('my-bookings');
    Route::get('payments', [PaymentController::class, 'index'])->name('payments');
    Route::get('weather-advisory', [WeatherAdvisoryController::class, 'index'])->name('weather-advisory');
});