<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client\DashboardController;
use App\Http\Controllers\client\OnboardingController;
use App\Http\Controllers\client\RequiremetController;
use App\Http\Controllers\client\clients\ClientController;
use App\Http\Controllers\client\clients\ClientSkillController;


// Client Routes
Route::group(['middleware' => 'role:4'], function () {
    Route::prefix('clients')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('clients.dashboard');

        Route::get('/onboarding', [OnboardingController::class, 'index'])->name('clients.onboarding');
        Route::post('onboarding',  [OnboardingController::class, 'clientOnboarding'])->name('clients.onboardingPost');

        Route::get('/post/requirement', [RequiremetController::class, 'index'])->name('clients.postRequirement');
        Route::post('/post/requirement/', [RequiremetController::class, 'postRequirement'])->name('clients.postRequirementSave');

        Route::get('/post/requirement', [RequiremetController::class, 'index'])->name('clients.postRequirement');

        Route::get('/profile', [ClientController::class, 'profile'])->name('client.profile');
        Route::get('/profile/update', [ClientController::class, 'updateClientProfile'])->name('client.updateClientProfile');
        Route::post('/profile/update', [ClientController::class, 'clientOnboardingPost'])->name('client.clientOnboardingPost');

        Route::post('/store/skills', [ClientSkillController::class, 'store'])->name('client.storeSkillsClient');
        Route::get('/delete/skills', [ClientSkillController::class, 'delete'])->name('client.deleteSkillClient');
        Route::post('/update/skills', [ClientSkillController::class, 'updateSkills'])->name('client.updateSkillsClient');
        

        Route::post('/store/images', [ClientController::class, 'storeImages'])->name('client.storeImagesClient');
        Route::get('/delete/images', [ClientController::class, 'deleteImages'])->name('client.deleteImageClient');
        Route::post('/store/documents', [ClientController::class, 'storeDocuments'])->name('client.storeDocumentsClient');
        Route::get('/delete/documents', [ClientController::class, 'deleteDocuments'])->name('client.deleteDocumentClient');

        
        Route::get('/view/requirement', [ClientController::class, 'viewRequirement'])->name('client.viewRequirement');
        Route::get('/update/requirement', [ClientController::class, 'updateClientRequirement'])->name('client.updateClientRequirement');
        Route::post('/store/requirement', [ClientController::class, 'postRequirementSave'])->name('client.postRequirementSave');
        Route::post('/requirement-data', [ClientController::class, 'requirementData'])->name('client.requirementData');
        

    });
    
});


