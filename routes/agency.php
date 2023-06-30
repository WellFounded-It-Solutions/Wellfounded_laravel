<?php

use App\Http\Controllers\agency\DashboardController;
use App\Http\Controllers\agency\OnboardingController;
use Illuminate\Support\Facades\Route;

//Agency Routes
Route::group(['middleware' => 'role:2'], function () {
    Route::prefix('agency')->group(function () {
        

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('agency.dashboard');

        Route::get('/onboarding', [OnboardingController::class, 'index'])->name('agency.onboarding');
        Route::post('onboarding',  [OnboardingController::class, 'agencyOnboarding'])->name('agency.onboardingPost');
    });
});