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
        Route::post('/developer-data', [DeveloperController::class, 'filter'])->name('admin.developersFilter');
        
        Route::get('/manage-agency', [AgencyController::class, 'index'])->name('admin.manage_agency');
        Route::post('/agency-data', [AgencyController::class, 'filter'])->name('admin.agencyFilter');

        Route::get('/manage-client', [ClientController::class, 'index'])->name('admin.manage_client');
        Route::post('/clients-data', [ClientController::class, 'filter'])->name('admin.clientFilter');
      
       
    });
});
