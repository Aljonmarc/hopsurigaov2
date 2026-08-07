<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Operator\DashboardController as OperatorDashboardController;
use App\Http\Controllers\Tourist\DashboardController as TouristDashboardController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');

    Route::middleware('role:Administrator')->group(function () {
        Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    });

    Route::middleware('role:Operator')->group(function () {
        Route::get('operator/dashboard', [OperatorDashboardController::class, 'index'])->name('operator.dashboard');
    });

    Route::middleware('role:Tourist / User')->group(function () {
        Route::get('tourist/dashboard', [TouristDashboardController::class, 'index'])->name('tourist.dashboard');
    });
});

require __DIR__ . '/settings.php';
