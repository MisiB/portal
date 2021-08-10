<?php

use App\Http\Controllers\administration\assignfunctionController;
use App\Http\Controllers\administration\authController;
use App\Http\Controllers\administration\bankapiController;
use App\Http\Controllers\administration\bidbondcapController;
use App\Http\Controllers\administration\budgetsController;
use App\Http\Controllers\administration\categoryController;
use App\Http\Controllers\administration\classificationController;
use App\Http\Controllers\administration\contractfeeController;
use App\Http\Controllers\administration\currencyController;
use App\Http\Controllers\administration\customerController as AppCustomerController;
use App\Http\Controllers\administration\dashboardController;
use App\Http\Controllers\administration\downloadadminfeesController;
use App\Http\Controllers\administration\downloadbidbondController;
use App\Http\Controllers\administration\entitiesController;
use App\Http\Controllers\administration\entityuserController;
use App\Http\Controllers\administration\establishmentfeeController;
use App\Http\Controllers\administration\modulesController;
use App\Http\Controllers\administration\onlinepaymentController;
use App\Http\Controllers\administration\passwordChangeController;
use App\Http\Controllers\administration\pendingsupplierController;
use App\Http\Controllers\administration\permissionsController;
use App\Http\Controllers\administration\plansController;
use App\Http\Controllers\administration\procurementclassController;
use App\Http\Controllers\administration\rateController;
use App\Http\Controllers\administration\returnsController;
use App\Http\Controllers\administration\revenuereportController;
use App\Http\Controllers\administration\submodulesController;
use App\Http\Controllers\administration\roleController;
use App\Http\Controllers\administration\rtgsController;
use App\Http\Controllers\administration\sectionController;
use App\Http\Controllers\administration\spocfeeController;
use App\Http\Controllers\administration\suppliercommentsController;
use App\Http\Controllers\administration\supplierpriceController;
use App\Http\Controllers\administration\suppliertypeController;
use App\Http\Controllers\administration\reports\finance\suspensereportController;
use App\Http\Controllers\administration\tenderfeeController;
use App\Http\Controllers\administration\tenderinvoicingController;
use App\Http\Controllers\administration\tenderreceiptingController;
use App\Http\Controllers\administration\thresholdController;
use App\Http\Controllers\administration\usersController as AppUsersController;
use App\Http\Controllers\administration\awaitingInvoicesController ;
use App\Http\Controllers\administration\customeruserController;
use App\Http\Controllers\administration\awaitingsupplierinvoiceController;
use App\Http\Controllers\administration\reports\finance\bidbondrefundController;
use App\Http\Controllers\administration\reports\finance\bidbondrevenueController;
use App\Http\Controllers\administration\reports\finance\revenueController;
use App\Http\Controllers\administration\reports\finance\tenderrevenueController;
use App\Http\Controllers\administrator\customerController;
//use App\Http\Controllers\administration\suspenseReportController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'auth:admin'],function(){
    Route::group(['prefix'=>'administrator'],function() {
      Route::get('/',[dashboardController::class,'index'])->name('admin.home');
      Route::resource('/roles',roleController::class)->middleware(['checkpermission']);
      Route::resource('/users',AppUsersController::class)->middleware(['checkpermission']);
      Route::resource('/modules',modulesController::class)->middleware(['checkpermission']);
      Route::resource('/suppliertypes',suppliertypeController::class)->middleware(['checkpermission']);
      Route::resource('/categories',categoryController::class)->middleware(['checkpermission']);
      Route::resource('/sections',sectionController::class)->middleware(['checkpermission']);
      Route::resource('/submodules',submodulesController::class)->middleware(['checkpermission']);
      Route::resource('/permissions',permissionsController::class)->middleware(['checkpermission']);
      Route::resource('/assignfunctions',assignfunctionController::class)->middleware(['checkpermission']);
      Route::resource('/currency',currencyController::class)->middleware(['checkpermission']);
      Route::resource('/rates',rateController::class)->middleware(['checkpermission']);
      Route::resource('/supplierprice',supplierpriceController::class)->middleware(['checkpermission']);
      Route::resource('/tenderfees',tenderfeeController::class)->middleware(['checkpermission']);
      Route::resource('/establishmentfees',establishmentfeeController::class)->middleware(['checkpermission']);
      Route::resource('/contractfees',contractfeeController::class)->middleware(['checkpermission']);
      Route::resource('/spocfees',spocfeeController::class)->middleware(['checkpermission']);
      Route::resource('/bidbondcaps',bidbondcapController::class)->middleware(['checkpermission']);
      Route::resource('/classifications',classificationController::class)->middleware(['checkpermission']);
      Route::resource('/procurementclass',procurementclassController::class)->middleware(['checkpermission']);
      Route::resource('/threshold',thresholdController::class)->middleware(['checkpermission']);
      Route::resource('/rtgsprocessing',rtgsController::class)->middleware(['checkpermission']);
      Route::resource('/customer',AppCustomerController::class)->middleware(['checkpermission']);
      Route::resource('/tenderinvoicing',tenderinvoicingController::class)->middleware(['checkpermission']);
      Route::resource('/tenderreceipting',tenderreceiptingController::class)->middleware(['checkpermission']);
      Route::resource('/downloadbidbond',downloadbidbondController::class);
      Route::resource('/downloadadminfees',downloadadminfeesController::class);
      Route::resource('/bankapi',bankapiController::class)->middleware(['checkpermission']);
      Route::resource('/onlinepayments',onlinepaymentController::class)->middleware(['checkpermission']);
      Route::resource('/pendingsuppliers',pendingsupplierController::class)->middleware(['checkpermission']);
      Route::resource('/suppliercomments',suppliercommentsController::class)->middleware(['checkpermission']);
      Route::resource('/changepassword',passwordChangeController::class)->middleware(['checkpermission']);
      Route::resource('/entitylist',entitiesController::class)->middleware(['checkpermission']);
      Route::resource('/entityusers',entityuserController::class)->middleware(['checkpermission']);
      Route::resource('/procurementplans',plansController::class)->middleware(['checkpermission']);
      Route::resource('/procurementbudgets',budgetsController::class)->middleware(['checkpermission']);
      Route::resource('/procurementreturns',returnsController::class)->middleware(['checkpermission']);
      Route::resource('/suspensereports',suspenseReportController::class);
      Route::resource('/revenuereport',revenuereportController::class)->middleware(['checkpermission']);
      Route::resource('/awaitinginvoices',awaitingInvoicesController::class)->middleware(['checkpermission']);
      Route::resource('/awaitingsupplierinvoices',awaitingsupplierinvoiceController::class)->middleware(['checkpermission']);
      Route::resource('/customerusers',customeruserController::class)->middleware(['checkpermission']);
      Route::resource('/report-revenue-downloads',revenueController::class);
      Route::resource('/report-tender-revenue',tenderrevenueController::class)->middleware(['checkpermission']);
      Route::resource('/report-bidbond-revenue',bidbondrevenueController::class);
      Route::resource('/report-bidbond-refund',bidbondrefundController::class);
     // Route::resource('/report-suspense-balances',suspenseReportController::class);
      
    });
});

Route::group(['prefix'=>'administrator'],function() {
    Route::get('/login',[authController::class,'loginForm'])->name('admin.loginForm');
    Route::post('/login',[authController::class,'login'])->name('admin.login');
});