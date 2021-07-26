<?php

use App\Http\Controllers\downloadmanagerController;
use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\welcomeController;
 use App\Http\Controllers\verificationController;
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

Route::get('/',[welcomeController::class,'index'])->name('welcome');
Route::get('/tenders',[welcomeController::class,'tenders'])->name('tenders');
Route::get('/tender/{uuid}',[welcomeController::class,'show'])->name('notice');
Route::get('/awards',[welcomeController::class,'awards'])->name('awards');
Route::get('/suppliers',[welcomeController::class,'suppliers'])->name('suppliers');
Route::get('/supplier/{id}',[welcomeController::class,'showlist'])->name('supplier');
Route::get('/verification',[verificationController::class,'verify'])->name('verifydata');

Route::get('/DownloadManager/{id}/{type}',[downloadmanagerController::class,'download']);
/**
 * authenticated users routes
 */



require __DIR__.'/auth.php';
require  __DIR__.'/users.php';
require __DIR__.'/entity.php';
require __DIR__.'/admin.php';
