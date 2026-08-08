<?php

use App\Http\Controllers\Operator\DashboardController;
use App\Http\Controllers\Operator\ReservationController;
use App\Http\Controllers\Operator\ScheduleController;
use App\Http\Controllers\Operator\TourPackageController;
use App\Http\Controllers\Operator\WeatherAdvisoryController;
use Illuminate\Support\Facades\Route;

Route::middleware('role:Operator,Administrator')->prefix('operator')->name('operator.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('tour-packages', [TourPackageController::class, 'index'])->name('tour-packages');
    Route::get('schedules', [ScheduleController::class, 'index'])->name('schedules');
    Route::get('reservations', [ReservationController::class, 'index'])->name('reservations');
    Route::get('weather-advisory', [WeatherAdvisoryController::class, 'index'])->name('weather-advisory');
});