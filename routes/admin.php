<?php

use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\TourOperatorController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('role:Administrator')->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('users', [UserController::class, 'index'])->name('users');
    Route::get('tour-operators', [TourOperatorController::class, 'index'])->name('tour-operators');
    Route::get('destinations', [DestinationController::class, 'index'])->name('destinations');
    Route::get('reservations', [ReservationController::class, 'index'])->name('reservations');
    Route::get('payments', [PaymentController::class, 'index'])->name('payments');
    Route::get('reports', [ReportController::class, 'index'])->name('reports');
    Route::get('activity-logs', [ActivityLogController::class, 'index'])->name('activity-logs');
});