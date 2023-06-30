<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\developer\DashboardController;
use App\Http\Controllers\developer\OnboardingController;

//Developer Routes
Route::group(['middleware' => 'role:3'], function () {
    Route::prefix('developer')->group(function () {
        
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('developer.dashboard');
        Route::get('/taskboard', [DashboardController::class, 'taskboard'])->name('developer.taskboard');

        Route::get('/onboarding', [OnboardingController::class, 'index'])->name('developer.onboarding');
        Route::post('onboarding',  [OnboardingController::class, 'developerOnboarding'])->name('developer.onboardingPost');
        
    });
});

