<?php

use App\Http\Controllers\agency\DashboardController;
use App\Http\Controllers\agency\OnboardingController;
use App\Http\Controllers\agency\DeveloperController;
use Illuminate\Support\Facades\Route;

//Agency Routes
Route::group(['middleware' => 'role:2'], function () {
    Route::prefix('agency')->group(function () {
        

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('agency.dashboard');

        Route::get('/onboarding', [OnboardingController::class, 'index'])->name('agency.onboarding');
        Route::post('onboarding',  [OnboardingController::class, 'agencyOnboarding'])->name('agency.onboardingPost');

        Route::get('/manage-developer', [DeveloperController::class, 'index'])->name('agency.manage_developers');
        Route::post('/developer-data', [DeveloperController::class, 'filter'])->name('agency.developersFilter');
        Route::get('/add/developer', [DeveloperController::class, 'addDeveloper'])->name('agency.addDeveloper');
        Route::post('/add/devemloper/post', [DeveloperController::class, 'addDeveloperPost'])->name('agency.addDeveloperPost');

        

        
    });
});