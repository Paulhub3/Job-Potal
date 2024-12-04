<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\OtherMedicalJobController;
use App\Http\Controllers\Users\UserLoginController;
use App\Http\Controllers\NurseApplicationController;
use App\Http\Controllers\Users\AdminDashboardController;
use App\Http\Controllers\Users\MedicalEmployerController;
use App\Http\Controllers\Users\OtherMedicalJobsController;
use App\Http\Controllers\OtherProffessionEmployeeController;
use App\Http\Controllers\OtherProffessionEmployerController;
use App\Http\Controllers\Users\NursingApplicationController;
use App\Http\Controllers\Users\OtherProffessionEmployeesController;
use App\Http\Controllers\Users\OtherProffessionEmployersController;


// Basic Routes
Route::get('/', function () {
    return view('home');
})->name('home');

// Admin Dashboard Routes
Route::prefix('remote/control')->group(function () {
    // Dashboard Area

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->middleware('auth')->name('dashboard');

    // Authentication Routes
    Route::get('/login', [UserLoginController::class, 'index'])->name('login');
    Route::post('/login', [UserLoginController::class, 'login']);
    Route::post('/logout', [UserLoginController::class, 'logout'])->name('logout');

    // Nursing Job Applications Management
    Route::resource('nurse-application-data', NursingApplicationController::class)->middleware('auth');

    // Medical employer
    Route::resource('medical-employer', MedicalEmployerController::class)->middleware('auth');

    // Other Medical Job
    Route::resource('other-medical-job', OtherMedicalJobsController::class)->middleware('auth');

    // Other Proffession Employee
    Route::resource('other-proffession-employee', OtherProffessionEmployeesController::class)->middleware('auth');

    // Other Proffession Employer
    Route::resource('other-proffession-employer', OtherProffessionEmployersController::class)->middleware('auth');
});

// Other Professional Routes
Route::prefix('other/proffession')->group(function () {
    // Employer Routes
    Route::get('/employer', [OtherProffessionEmployerController::class, 'index'])
        ->name('other-proffessions.employer');
    Route::post('/employer', [OtherProffessionEmployerController::class, 'store'])
        ->name('other-proffessions.storeEmployer');

    // Employee Routes
    Route::get('/employee', [OtherProffessionEmployeeController::class, 'index'])
        ->name('other-proffessions.employee');
    Route::post('/employee', [OtherProffessionEmployeeController::class, 'store'])
        ->name('other-proffessions.storeEmployee');
});

// Other Medical Jobs Routes
Route::prefix('other/medical/jobs')->group(function () {
    Route::get('/', [OtherMedicalJobController::class, 'index'])->name('other.form');
    Route::post('/', [OtherMedicalJobController::class, 'store'])->name('other.store');
});

// Nurse Application Process Routes
Route::prefix('processing/job')->group(function () {
    Route::get('/nationality', [NurseApplicationController::class, 'showStep'])->name('form.step');
    Route::post('/nationality', [NurseApplicationController::class, 'postStep']);

    Route::get('/country-resident', [NurseApplicationController::class, 'showStep1'])->name('form.step1');
    Route::post('/country-resident', [NurseApplicationController::class, 'postStep1']);

    Route::get('/work-country', [NurseApplicationController::class, 'showStep2'])->name('form.step2');
    Route::post('/work-country', [NurseApplicationController::class, 'postStep2']);

    Route::get('/work-city', [NurseApplicationController::class, 'showStep3'])->name('form.step3');
    Route::post('/work-city', [NurseApplicationController::class, 'postStep3']);

    Route::get('/future_work', [NurseApplicationController::class, 'showStep4'])->name('form.step4');
    Route::post('/future_work', [NurseApplicationController::class, 'postStep4']);

    Route::get('/section-work', [NurseApplicationController::class, 'showStep5'])->name('form.step5');
    Route::post('/section-work', [NurseApplicationController::class, 'postStep5']);

    Route::get('/training', [NurseApplicationController::class, 'showStep6'])->name('form.step6');
    Route::post('/training', [NurseApplicationController::class, 'postStep6']);

    Route::get('/additional-qualifications', [NurseApplicationController::class, 'showStep7'])->name('form.step7');
    Route::post('/additional-qualifications', [NurseApplicationController::class, 'postStep7']);

    Route::get('/start-date', [NurseApplicationController::class, 'showStep8'])->name('form.step8');
    Route::post('/start-date', [NurseApplicationController::class, 'postStep8']);

    Route::get('/eu-license', [NurseApplicationController::class, 'showStep9'])->name('form.step9');
    Route::post('/eu-license', [NurseApplicationController::class, 'postStep9']);

    Route::get('/language', [NurseApplicationController::class, 'showStep10'])->name('form.step10');
    Route::post('/language', [NurseApplicationController::class, 'postStep10']);

    Route::get('/contact', [NurseApplicationController::class, 'showLast'])->name('form.complete');
    Route::post('/contact', [NurseApplicationController::class, 'postLast']);
});

// Additional Nurse Routes
Route::get('/work-country', [NurseApplicationController::class, 'skipPage'])->name('skip.page');

// Employer Listing Process Routes
Route::prefix('listing/job')->group(function () {
    Route::get('/company-location', [EmployerController::class, 'showPage'])->name('form.page');
    Route::post('/company-location', [EmployerController::class, 'postPage']);

    Route::get('/company-city', [EmployerController::class, 'showPage1'])->name('form.page1');
    Route::post('/company-city', [EmployerController::class, 'postPage1']);

    Route::get('/profession', [EmployerController::class, 'showPage2'])->name('form.page2');
    Route::post('/profession', [EmployerController::class, 'postPage2']);

    Route::get('/time-frame', [EmployerController::class, 'showPage3'])->name('form.page3');
    Route::post('/time-frame', [EmployerController::class, 'postPage3']);

    Route::get('/salary-rate', [EmployerController::class, 'showPage4'])->name('form.page4');
    Route::post('/salary-rate', [EmployerController::class, 'postPage4']);

    Route::get('/contact-information', [EmployerController::class, 'viewLastPage'])->name('form.submit');
    Route::post('/contact-information', [EmployerController::class, 'postLastPage']);
});
