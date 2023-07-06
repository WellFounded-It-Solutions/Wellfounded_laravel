<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\DeveloperController;
use App\Http\Controllers\admin\DeveloperExperienceController;
use App\Http\Controllers\admin\DeveloperCertificationController;
use App\Http\Controllers\admin\DeveloperEducationController;

use App\Http\Controllers\admin\AgencyController;
use App\Http\Controllers\admin\ClientController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'role:1'], function () {
    Route::prefix('admin')->group(function () {
        //Super_admin Wellfounded routes
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::get('/manage-developer', [DeveloperController::class, 'index'])->name('admin.manage_developers');
        Route::post('/developer-data', [DeveloperController::class, 'filter'])->name('admin.developersFilter');
        Route::get('/developer/profile/update', [DeveloperController::class, 'updateDeveloperProfile'])->name('admin.updateDeveloperProfile');
        Route::post('/developer/profile/update', [DeveloperController::class, 'developerOnboardingPost'])->name('admin.developerOnboardingPost');
        Route::get('/developer/profile/{userID}', [DeveloperController::class, 'developerProfile'])->name('admin.developerProfile');
        Route::post('/developer/profile/change/workingStatus', [DeveloperController::class, 'changeDeveloperWorkingStatus'])->name('admin.changeDeveloperWorkingStatus');
        
        Route::post('/developer/store/experience', [DeveloperExperienceController::class, 'store'])->name('admin.storeExperience');
        Route::get('/developer/delete/experience', [DeveloperExperienceController::class, 'delete'])->name('admin.deleteDeveloperExperience');
        Route::post('/developer/update/experience', [DeveloperExperienceController::class, 'updateExperience'])->name('admin.updateExperience');
        
        Route::post('/developer/store/certification', [DeveloperCertificationController::class, 'store'])->name('admin.storeCertification');
        Route::get('/developer/delete/certification', [DeveloperCertificationController::class, 'delete'])->name('admin.deleteDeveloperCertification');
        Route::post('/developer/update/certification', [DeveloperCertificationController::class, 'updateCertification'])->name('admin.updateCertification');

        Route::post('/developer/store/education', [DeveloperEducationController::class, 'store'])->name('admin.storeEducation');
        Route::get('/developer/delete/education', [DeveloperEducationController::class, 'delete'])->name('admin.deleteDeveloperEducation');
        Route::post('/developer/update/education', [DeveloperEducationController::class, 'updateEducation'])->name('admin.updateEducation');

        
        
        
        Route::get('/manage-agency', [AgencyController::class, 'index'])->name('admin.manage_agency');
        Route::post('/agency-data', [AgencyController::class, 'filter'])->name('admin.agencyFilter');

        Route::get('/manage-client', [ClientController::class, 'index'])->name('admin.manage_client');
        Route::post('/clients-data', [ClientController::class, 'filter'])->name('admin.clientFilter');
      
       
    });
});
