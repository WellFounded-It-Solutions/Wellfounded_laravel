<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\DeveloperController;
use App\Http\Controllers\admin\AgencyController;
use App\Http\Controllers\admin\ClientController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'role:1'], function () {
    Route::prefix('admin')->group(function () {
        //Super_admin Wellfounded routes
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::get('/manage-developer', [DeveloperController::class, 'index'])->name('admin.manage_developers');

        Route::get('/manage-agency', [AgencyController::class, 'index'])->name('admin.manage_agency');

        Route::get('/manage-client', [ClientController::class, 'index'])->name('admin.manage_client');
      
       
    });
});
