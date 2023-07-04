<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client\DashboardController;
use App\Http\Controllers\client\OnboardingController;
use App\Http\Controllers\client\RequiremetController;


//Client Routes
Route::group(['middleware' => 'role:4'], function () {
    Route::prefix('clients')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('clients.dashboard');

        Route::get('/onboarding', [OnboardingController::class, 'index'])->name('clients.onboarding');
        Route::post('onboarding',  [OnboardingController::class, 'clientOnboarding'])->name('clients.onboardingPost');

        Route::get('/post/requirement', [RequiremetController::class, 'index'])->name('clients.postRequirement');
        Route::post('/post/requirement/', [RequiremetController::class, 'postRequirement'])->name('clients.postRequirementSave');
    });
});


