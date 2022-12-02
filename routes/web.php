<?php

use App\Http\Livewire\Accountdetails;
use App\Http\Livewire\Accounttypes;
use App\Http\Livewire\Employeedetails;
use App\Http\Livewire\Employees;
use App\Http\Livewire\Loandetails;
use App\Http\Livewire\Loans;
use App\Http\Livewire\Loantypes;
use App\Http\Livewire\Memberdetails;
use App\Http\Livewire\Members;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Livewire\Capitalshares;
use App\Http\Livewire\Printpayments;

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

// Route::get('/register', function() {
//     return redirect('/login');
// });

// Route::post('/register', function() {
//     return redirect('/login');
// });

Route::get('/', function () {
    return view('welcome');
});




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::get('employees',Employees::class)->name('employees');
    Route::get('loantypes',Loantypes::class)->name('loantypes');
    Route::get('accounttypes',Accounttypes::class)->name('accounttypes');
    Route::get('members',Members::class)->name('members');
    Route::get('employee/{employee_id}',Employeedetails::class)->name('employee');
    Route::get('member/{employee_id}',Memberdetails::class)->name('member');
    Route::get('account/{account_id}',Accountdetails::class)->name('account');
    Route::get('loans',Loans::class)->name('loans');
    Route::get('loan/{loan_id}',Loandetails::class)->name('loan');
    Route::get('capitalshares',Capitalshares::class)->name('capitalshares');
    // Route::get('printpayments/{loan_id}',Printpayments::class)->name('printpayments');

    // pdf controller 

    Route::controller(PDFController::class)->group(function () {
        Route::get('/printPaymentSchedule/{loan_id}', 'printPaymentSchedule')->name('printPaymentSchedule');
        Route::get('/printAccount/{account_id}', 'printAccount')->name('printAccount');
        Route::get('/printPayments/{loan_id}', 'printPayments')->name('printpayments');
    });


});