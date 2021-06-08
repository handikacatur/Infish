<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Support\DeferringDisplayableValue;


use App\Http\Controllers\TransactionController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PartnerProfileController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\InvestationController;
use App\Http\Controllers\ConfirmController;
use App\Http\Controllers\DetailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing-page');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/faq', [DashboardController::class, 'faq'])->middleware(['auth'])->name('faq');

Route::group(['middleware' => ['role:superadmin']], function(){
    
});

Route::group(['middleware' => ['role:admin']], function(){
    Route::get('transaction', [TransactionController::class, 'index'])->name('transaction');
    Route::post('transaction/save', [TransactionController::class, 'save']);

    Route::get('confirm-partner', [ConfirmController::class, 'confirmPartner'])->name('confirm-partner');
    Route::post('confirm-partner/{partner}/partner', [ConfirmController::class, 'actionPartner']);
    Route::patch('confirm-partner/{partner}/patch', [ConfirmController::class, 'patchPartner']);

    Route::get('confirm-progress', [ConfirmController::class, 'confirmProgress'])->name('confirm-progress');
    Route::post('confirm-progress/{progress}/progress', [ConfirmController::class, 'actionProgress']);
    Route::patch('confirm-progress/{progress}/patch', [ConfirmController::class, 'patchProgress']);

    Route::get('confirm-submission', [ConfirmController::class, 'confirmSubmission'])->name('confirm-submission');
    Route::post('confirm-submission/{submission}/submission', [ConfirmController::class, 'actionSubmission']);
    Route::patch('confirm-submission/{submission}/patch', [ConfirmController::class, 'patchSubmission']);

    Route::get('detail-partner', [DetailController::class, 'detailPartner'])->name('detail-partner');
    Route::post('detail-partner/{partner}/partner', [DetailController::class, 'detailPartnerEdit']);
    Route::patch('detail-partner/{partner}/patch', [DetailController::class, 'detailPartnerPatch']);
});

Route::group(['middleware' => ['role:investor']], function(){
    Route::get('invest-partner', [InvestationController::class, 'index'])->name('invest-partner');
    Route::post('detail-investation/{detail}/detail', [InvestationController::class, 'detail']);
    Route::post('invest/{check}/check', [InvestationController::class, 'investCheck']);
    Route::post('go-invest/{invest}/go', [InvestationController::class, 'invest']);

    Route::get('transaction-investation', [InvestationController::class, 'transaction'])->name('transaction-investation');
});

Route::group(['middleware' => ['role:partner']], function(){
    Route::get('company-profile', [PartnerProfileController::class, 'index'])->name('company-profile');
    Route::post('company-profile/save', [PartnerProfileController::class, 'save']);
    Route::post('company-profile/change', [PartnerProfileController::class, 'edit']);

    Route::post('company-profile/save-fish', [PartnerProfileController::class, 'saveFish']);
    Route::delete('company-profile/{partnerFish}/dropFish', [PartnerProfileController::class, 'dropFish']);

    Route::get('sale', [SaleController::class, 'index'])->name('sale');
    Route::post('sale/save', [SaleController::class, 'save']);
    Route::post('edit-sale/{sale}/change', [SaleController::class, 'edit']);
    Route::patch('update-sale/{sale}/patch', [SaleController::class, 'put']);
    Route::delete('delete-sale/{sale}/drop', [SaleController::class, 'destroy']);

    Route::get('submission', [SubmissionController::class, 'index'])->name('submission');
    Route::post('submission/save', [SubmissionController::class, 'save']);

    Route::get('progress', [ProgressController::class, 'index'])->name('progress');
    Route::post('progress/save', [ProgressController::class, 'save']);

    Route::get('edit-profile', [PartnerProfileController::class, 'editProfile'])->name('edit-profile');
    Route::get('edit-profile-form', [PartnerProfileController::class, 'formEditProfile']);
    Route::post('edit-profile/update', [PartnerProfileController::class, 'updateProfile']);
    Route::post('edit-profile/password', [PartnerProfileController::class, 'passwordProfile']);
});

require __DIR__.'/auth.php';
