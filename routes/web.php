<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LoanProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('loan-products', LoanProductController::class);
Route::resource('customers', CustomerController::class);
Route::resource('loans', LoanController::class);
Route::post('loans/{loan}/approve', [LoanController::class, 'approve'])->name('loans.approve');
Route::post('loans/{loan}/disburse', [LoanController::class, 'disburse'])->name('loans.disburse');
Route::post('loans/{loan}/repay', [LoanController::class, 'repay'])->name('loans.repay');
Route::get('loan-report', [LoanController::class, 'report']);

