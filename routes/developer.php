<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\developer\DashboardController;
use App\Http\Controllers\developer\OnboardingController;

use App\Http\Controllers\developer\DeveloperController;
use App\Http\Controllers\developer\DeveloperExperienceController;
use App\Http\Controllers\developer\DeveloperCertificationController;
use App\Http\Controllers\developer\DeveloperEducationController;

// Routes
Route::group(['middleware' => 'role:3'], function () {
    Route::prefix('developer')->group(function () {
        
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('developer.dashboard');
        Route::get('/taskboard', [DashboardController::class, 'taskboard'])->name('developer.taskboard');

        Route::get('/onboarding', [OnboardingController::class, 'index'])->name('developer.onboarding');
        Route::post('/onboarding',  [OnboardingController::class, 'developerOnboarding'])->name('developer.onboardingPost');
        
        Route::get('/profile', [DashboardController::class, 'profile'])->name('developer.profile');
        Route::get('/profile/update', [DeveloperController::class, 'updateDeveloperProfile'])->name('developer.updateDeveloperProfile');
        Route::post('/profile/update', [DeveloperController::class, 'developerOnboardingPost'])->name('developer.developerOnboardingPost');

        Route::post('/profile/change/workingStatus', [DeveloperController::class, 'changeDeveloperWorkingStatus'])->name('developer.changeDeveloperWorkingStatus');
        
        Route::post('/store/experience', [DeveloperExperienceController::class, 'store'])->name('developer.storeExperience');
        Route::get('/delete/experience', [DeveloperExperienceController::class, 'delete'])->name('developer.deleteDeveloperExperience');
        Route::post('/update/experience', [DeveloperExperienceController::class, 'updateExperience'])->name('developer.updateExperience');
        
        Route::post('/store/certification', [DeveloperCertificationController::class, 'store'])->name('developer.storeCertification');
        Route::get('/delete/certification', [DeveloperCertificationController::class, 'delete'])->name('developer.deleteDeveloperCertification');
        Route::post('/update/certification', [DeveloperCertificationController::class, 'updateCertification'])->name('developer.updateCertification');

        Route::post('/store/education', [DeveloperEducationController::class, 'store'])->name('developer.storeEducation');
        Route::get('/delete/education', [DeveloperEducationController::class, 'delete'])->name('developer.deleteDeveloperEducation');
        Route::post('/update/education', [DeveloperEducationController::class, 'updateEducation'])->name('developer.updateEducation');

        

    });
});

