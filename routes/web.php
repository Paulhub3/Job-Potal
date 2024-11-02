<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NurseApplicationController;

Route::get('/', function () {
    return view('home');
})->name('home');



//Job Seeker Route Controller
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
