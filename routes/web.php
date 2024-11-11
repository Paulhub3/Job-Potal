<?php

use App\Models\OtherMedicalJob;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\OtherMedicalJobController;
use App\Http\Controllers\Users\UserLoginController;
use App\Http\Controllers\NurseApplicationController;
use App\Http\Controllers\OtherProffessionEmployeeController;
use App\Http\Controllers\OtherProffessionEmployerController;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/remote/control/dashboard', function () {
    return view('user.dashboard');
})->name('dashboard');

//Adim USer Login
Route::get('/remote/control/login', [UserLoginController::class, 'index'])->name('login');


//Other proffessional Jobs Employer
Route::get('/other/proffession/employer', [OtherProffessionEmployerController::class, 'index'])->name('other-proffessions.employer');
Route::post('/other/proffession/employer', [OtherProffessionEmployerController::class, 'store'])->name('other-proffessions.storeEmployer');



//Other proffessional Jobs Employee
Route::get('/other/proffession/employee', [OtherProffessionEmployeeController::class, 'index'])->name('other-proffessions.employee');
Route::post('/other/proffession/employee', [OtherProffessionEmployeeController::class, 'store'])->name('other-proffessions.storeEmployee');



//Other Medical Jobs
Route::get('/other/medical/jobs', [OtherMedicalJobController::class, 'index'])->name('other.form');
Route::post('/other/medical/jobs', [OtherMedicalJobController::class, 'store'])->name('other.store');


//Nursing application Route Controller
Route::get('/processing/job/nationality', [NurseApplicationController::class, 'showStep'])->name('form.step');
Route::post('/processing/job/nationality', [NurseApplicationController::class, 'postStep']);

Route::get('/processing/job/country-resident', [NurseApplicationController::class, 'showStep1'])->name('form.step1');
Route::post('/processing/job/country-resident', [NurseApplicationController::class, 'postStep1']);

Route::get('/processing/job/work-country', [NurseApplicationController::class, 'showStep2'])->name('form.step2');
Route::post('/processing/job/work-country', [NurseApplicationController::class, 'postStep2']);

Route::get('/processing/job/work-city', [NurseApplicationController::class, 'showStep3'])->name('form.step3');
Route::post('/processing/job/work-city', [NurseApplicationController::class, 'postStep3']);

Route::get('/processing/job/future_work', [NurseApplicationController::class, 'showStep4'])->name('form.step4');
Route::post('/processing/job/future_work', [NurseApplicationController::class, 'postStep4']);

Route::get('/processing/job/section-work', [NurseApplicationController::class, 'showStep5'])->name('form.step5');
Route::post('/processing/job/section-work', [NurseApplicationController::class, 'postStep5']);

Route::get('/processing/job/training', [NurseApplicationController::class, 'showStep6'])->name('form.step6');
Route::post('/processing/job/training', [NurseApplicationController::class, 'postStep6']);

Route::get('/processing/job/additional-qualifications', [NurseApplicationController::class, 'showStep7'])->name('form.step7');
Route::post('/processing/job/additional-qualifications', [NurseApplicationController::class, 'postStep7']);

Route::get('/processing/job/start-date', [NurseApplicationController::class, 'showStep8'])->name('form.step8');
Route::post('/processing/job/start-date', [NurseApplicationController::class, 'postStep8']);

Route::get('/processing/job/eu-license', [NurseApplicationController::class, 'showStep9'])->name('form.step9');
Route::post('/processing/job/eu-license', [NurseApplicationController::class, 'postStep9']);

Route::get('/processing/job/language', [NurseApplicationController::class, 'showStep10'])->name('form.step10');
Route::post('/processing/job/language', [NurseApplicationController::class, 'postStep10']);


Route::get('/processing/job/contact', [NurseApplicationController::class, 'showLast'])->name('form.complete');
Route::post('/processing/job/contact', [NurseApplicationController::class, 'postLast']);


Route::get('/work-country', [NurseApplicationController::class, 'skipPage'])->name('skip.page');


//Employers route Controller
Route::get('/listing/job/company-location', [EmployerController::class, 'showPage'])->name('form.page');
Route::post('/listing/job/company-location', [EmployerController::class, 'postPage']);

Route::get('/listing/job/company-city', [EmployerController::class, 'showPage1'])->name('form.page1');
Route::post('/listing/job/company-city', [EmployerController::class, 'postPage1']);

Route::get('/listing/job/profession', [EmployerController::class, 'showPage2'])->name('form.page2');
Route::post('/listing/job/profession', [EmployerController::class, 'postPage2']);

Route::get('/listing/job/time-frame', [EmployerController::class, 'showPage3'])->name('form.page3');
Route::post('/listing/job/time-frame', [EmployerController::class, 'postPage3']);

Route::get('/listing/job/salary-rate', [EmployerController::class, 'showPage4'])->name('form.page4');
Route::post('/listing/job/salary-rate', [EmployerController::class, 'postPage4']);

Route::get('/listing/job/contact-information', [EmployerController::class, 'viewLastPage'])->name('form.submit');
Route::post('/listing/job/contact-information', [EmployerController::class, 'postLastPage']);

