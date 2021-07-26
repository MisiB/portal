<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboadController;
use App\Http\Controllers\downloadmanagerController;
use App\Http\Controllers\mytenderFeesController;
use App\Http\Controllers\mytendersController;
use App\Http\Controllers\notificationController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\supplier\documentUploadController;
use App\Http\Controllers\supplier\invoicingController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\payments\awaitingController;
use App\Http\Controllers\payments\bankController;
use App\Http\Controllers\payments\mobilepaymentsController;
use App\Http\Controllers\payments\paynowController;
use App\Http\Controllers\payments\pendingController;
use App\Http\Controllers\payments\rtgsController;
use App\Http\Controllers\supplier\certificateController;
use App\Http\Controllers\supplier\registrationsController;
use App\Http\Controllers\supplier\reports\documentsController;
use App\Http\Controllers\supplier\reports\invoiceController;
use App\Http\Controllers\supplier\reports\paymentsController;
use App\Http\Controllers\supplier\reports\receiptController;
use App\Http\Controllers\supplier\reports\statementController;
use App\Http\Controllers\supplier\reports\usersController;
use App\Http\Controllers\tenders\bankpaymentController;
use App\Http\Controllers\tenders\bidbondController;
use App\Http\Controllers\tenders\FeesController;
use App\Http\Controllers\tenders\paymentController as AppPaymentController;

Route::group(['prefix'=>'bidders'],function() {
    Route::get('/check',[paynowController::class,'check'])->name('paynow_check');
});
Route::group(['middleware'=>'auth'],function(){
    Route::group(['prefix'=>'bidders'],function() {
        Route::get('/', [dashboadController::class, 'index'])->name('dashboard');
        Route::resource('/changeCategory',registrationsController::class);
        Route::resource('/documents', documentUploadController::class);
        Route::resource('/Invoicing', invoicingController::class);
        Route::resource('/Mobilepayments',mobilepaymentsController::class);
        Route::resource('/Pendingpayments',pendingController::class);
        Route::resource('/Bankpayments',bankController::class);
        Route::resource('/rtgs',rtgsController::class);
        Route::resource('/awaiting',awaitingController::class);
        Route::resource('/reportInvoices',invoiceController::class);
        Route::resource('/reportReceipts',receiptController::class);
        Route::resource('/reportPayments',paymentsController::class);
        Route::resource('/reportDocuments',documentsController::class);
        Route::resource('/reportUsers',usersController::class);
        Route::resource('/reportStatement',statementController::class);
        Route::resource('/TenderFees',FeesController::class);
        Route::resource('/Mybidbond',bidbondController::class);
        Route::resource('/Tenderpayment',AppPaymentController::class);
        Route::resource('/TenderBankpayments',bankpaymentController::class);
        Route::resource('/Notifications',notificationController::class);
        Route::resource('/Mytenders',mytendersController::class);
        Route::resource('/Mytenderfees',mytenderFeesController::class);
        
        Route::get('/Paynowpayments',[paynowController::class,'initiate'])->name('paynow_initiate');    
        Route::get('/payment',[paymentController::class,'index'])->name('payment');
        Route::get('/payment/{id}',[paymentController::class,'show'])->name('payment.show');
        Route::resource('/supplierCertificates',certificateController::class);
        Route::get('/profile/user', [profileController::class, 'index'])->name('profile.index');
        Route::post('/profile/user', [profileController::class, 'updateUser'])->name('profile.user');
        Route::get('/profile/company',[profileController::class,'company'])->name('profile.companyindex');
        Route::post('/profile/company', [profileController::class, 'updateCompany'])->name('profile.company');

    });
});
