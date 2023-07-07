<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\developer\DeveloperController;
use App\Http\Controllers\admin\developer\DeveloperExperienceController;
use App\Http\Controllers\admin\developer\DeveloperCertificationController;
use App\Http\Controllers\admin\developer\DeveloperEducationController;

use App\Http\Controllers\admin\agency\AgencyController;
use App\Http\Controllers\admin\agency\AgencySkillController;

use App\Http\Controllers\admin\clients\ClientController;
use App\Http\Controllers\admin\clients\ClientSkillController;

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

        Route::get('/agency/profile/update', [AgencyController::class, 'updateAgencyProfile'])->name('admin.updateAgencyProfile');
        Route::post('/agency/profile/update', [AgencyController::class, 'agencyOnboardingPost'])->name('admin.agencyOnboardingPost');
        Route::get('/agency/profile/{userID}', [AgencyController::class, 'agencyProfile'])->name('admin.agencyProfile');

        
        Route::post('/agency/store/skills', [AgencySkillController::class, 'store'])->name('admin.storeSkills');
        Route::get('/agency/delete/skills', [AgencySkillController::class, 'delete'])->name('admin.deleteAgencySkill');
        Route::post('/agency/update/skills', [AgencySkillController::class, 'updateSkills'])->name('admin.updateSkills');
        

        Route::post('/agency/store/images', [AgencyController::class, 'storeImages'])->name('admin.storeImages');
        Route::get('/agency/delete/images', [AgencyController::class, 'deleteImages'])->name('admin.deleteImage');
        Route::post('/agency/store/documents', [AgencyController::class, 'storeDocuments'])->name('admin.storeDocuments');
        Route::get('/agency/delete/documents', [AgencyController::class, 'deleteDocuments'])->name('admin.deleteDocument');

        Route::get('/manage-client', [ClientController::class, 'index'])->name('admin.manage_client');
        Route::post('/clients-data', [ClientController::class, 'filter'])->name('admin.clientFilter');
        Route::get('/client/profile/update', [ClientController::class, 'updateClientProfile'])->name('admin.updateClientProfile');
        Route::post('/client/profile/update', [ClientController::class, 'clientOnboardingPost'])->name('admin.clientOnboardingPost');
        Route::get('/client/profile/{userID}', [ClientController::class, 'clientProfile'])->name('admin.clientProfile');



        Route::post('/client/store/skills', [ClientSkillController::class, 'store'])->name('admin.storeSkillsClient');
        Route::get('/client/delete/skills', [ClientSkillController::class, 'delete'])->name('admin.deleteSkillClient');
        Route::post('/client/update/skills', [ClientSkillController::class, 'updateSkills'])->name('admin.updateSkillsClient');
        

        Route::post('/client/store/images', [ClientController::class, 'storeImages'])->name('admin.storeImagesClient');
        Route::get('/client/delete/images', [ClientController::class, 'deleteImages'])->name('admin.deleteImageClient');
        Route::post('/client/store/documents', [ClientController::class, 'storeDocuments'])->name('admin.storeDocumentsClient');
        Route::get('/client/delete/documents', [ClientController::class, 'deleteDocuments'])->name('admin.deleteDocumentClient');

        
        Route::get('/client/update/requirement', [ClientController::class, 'updateClientRequirement'])->name('admin.updateClientRequirement');
        Route::post('/client/store/requirement', [ClientController::class, 'postRequirementSave'])->name('admin.postRequirementSave');

        

        Route::get('/profile', [DashboardController::class, 'profile'])->name('admin.profile');
       
    });
});
