<?php

use App\Http\Livewire\Employeedetails;
use App\Http\Livewire\Employees;
use App\Http\Livewire\Loantypes;
use Illuminate\Support\Facades\Route;


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


Route::get('employees',Employees::class)->name('employees');
Route::get('loantypes',Loantypes::class)->name('loantypes');

Route::get('employee/{employee_id}',Employeedetails::class)->name('employee');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
