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

    Route::get('confirm-partner', [ConfirmController::class, 'confirimPartner'])->name('confirm-partner');
    Route::post('confirm-partner/{partner}/confirm', [ConfirmController::class, 'confirimPartner']);
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

    Route::get('sale', [SaleController::class, 'index'])->name('sale');
    Route::post('sale/save', [SaleController::class, 'save']);
    Route::post('edit-sale/{sale}/change', [SaleController::class, 'edit']);
    Route::patch('update-sale/{sale}/patch', [SaleController::class, 'put']);
    Route::delete('delete-sale/{sale}/drop', [SaleController::class, 'destroy']);

    Route::get('submission', [SubmissionController::class, 'index'])->name('submission');
    Route::post('submission/save', [SubmissionController::class, 'save']);

    Route::get('progress', [ProgressController::class, 'index'])->name('progress');
    Route::post('progress/save', [ProgressController::class, 'save']);
});

require __DIR__.'/auth.php';
