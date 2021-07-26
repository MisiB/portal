<?php

use App\Http\Controllers\entity\dashboardController;
use App\Http\Controllers\entity\procurementbudgetController;
use App\Http\Controllers\entity\procurementnoticeController;
use App\Http\Controllers\entity\procurementplansController;
use App\Http\Controllers\entity\procurementreturnController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'auth'],function(){
    Route::group(['prefix'=>'entity'],function() {
        Route::get('/',[dashboardController::class,'index'])->name('entity.home');
        Route::resource('/procurementnotice',procurementnoticeController::class);
        Route::resource('/entityreturns',procurementreturnController::class);
        Route::resource('/entityprocurementplans',procurementplansController::class);
        Route::resource('/entityprocurementbudgets',procurementbudgetController::class);
    });

});