<?php

use App\Http\Controllers\agency\DashboardController;
use App\Http\Controllers\agency\OnboardingController;
use App\Http\Controllers\agency\DeveloperController;
use App\Http\Controllers\agency\AgencyController;
use App\Http\Controllers\agency\AgencySkillController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\agency\developer\DeveloperExperienceController;
use App\Http\Controllers\agency\developer\DeveloperCertificationController;
use App\Http\Controllers\agency\developer\DeveloperEducationController;

// Routes
Route::group(['middleware' => 'role:2'], function () {
    Route::prefix('agency')->group(function () {
        

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('agency.dashboard');

        Route::get('/onboarding', [OnboardingController::class, 'index'])->name('agency.onboarding');
        Route::post('onboarding',  [OnboardingController::class, 'agencyOnboarding'])->name('agency.onboardingPost');

        Route::get('/manage-developer', [DeveloperController::class, 'index'])->name('agency.manage_developers');
        Route::post('/developer-data', [DeveloperController::class, 'filter'])->name('agency.developersFilter');
        Route::get('/add/developer', [DeveloperController::class, 'addDeveloper'])->name('agency.addDeveloper');
        Route::post('/add/devemloper/post', [DeveloperController::class, 'addDeveloperPost'])->name('agency.addDeveloperPost');


        Route::get('/profile', [AgencyController::class, 'profile'])->name('agency.profile');
        Route::get('/profile/update', [AgencyController::class, 'updateAgencyProfile'])->name('agency.updateAgencyProfile');
        Route::post('/profile/update', [AgencyController::class, 'agencyOnboardingPost'])->name('agency.agencyOnboardingPost');
        
        Route::post('/store/skills', [AgencySkillController::class, 'store'])->name('agency.storeSkills');
        Route::get('/delete/skills', [AgencySkillController::class, 'delete'])->name('agency.deleteAgencySkill');
        Route::post('/update/skills', [AgencySkillController::class, 'updateSkills'])->name('agency.updateSkills');
        

        Route::post('/store/images', [AgencyController::class, 'storeImages'])->name('agency.storeImages');
        Route::get('/delete/images', [AgencyController::class, 'deleteImages'])->name('agency.deleteImage');
        Route::post('/store/documents', [AgencyController::class, 'storeDocuments'])->name('agency.storeDocuments');
        Route::get('/delete/documents', [AgencyController::class, 'deleteDocuments'])->name('agency.deleteDocument');


        Route::get('/developer/profile/update', [DeveloperController::class, 'updateDeveloperProfile'])->name('agency.updateDeveloperProfile');
        Route::post('/developer/profile/update', [DeveloperController::class, 'developerOnboardingPost'])->name('agency.developerOnboardingPost');
        Route::get('/developer/profile/{userID}', [DeveloperController::class, 'developerProfile'])->name('agency.developerProfile');
        Route::post('/developer/profile/change/workingStatus', [DeveloperController::class, 'changeDeveloperWorkingStatus'])->name('agency.changeDeveloperWorkingStatus');
        
        Route::post('/developer/store/experience', [DeveloperExperienceController::class, 'store'])->name('agency.storeExperience');
        Route::get('/developer/delete/experience', [DeveloperExperienceController::class, 'delete'])->name('agency.deleteDeveloperExperience');
        Route::post('/developer/update/experience', [DeveloperExperienceController::class, 'updateExperience'])->name('agency.updateExperience');
        
        Route::post('/developer/store/certification', [DeveloperCertificationController::class, 'store'])->name('agency.storeCertification');
        Route::get('/developer/delete/certification', [DeveloperCertificationController::class, 'delete'])->name('agency.deleteDeveloperCertification');
        Route::post('/developer/update/certification', [DeveloperCertificationController::class, 'updateCertification'])->name('agency.updateCertification');

        Route::post('/developer/store/education', [DeveloperEducationController::class, 'store'])->name('agency.storeEducation');
        Route::get('/developer/delete/education', [DeveloperEducationController::class, 'delete'])->name('agency.deleteDeveloperEducation');
        Route::post('/developer/update/education', [DeveloperEducationController::class, 'updateEducation'])->name('agency.updateEducation');



        
    });
});