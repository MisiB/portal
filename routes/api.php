<?php

use App\Http\Controllers\banktransactionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('sendPayment',banktransactionsController::class);

