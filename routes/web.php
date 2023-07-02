<?php

use App\Http\Controllers\Auth\ProviderController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('product', 'ProductController');
Route::resource('productType', 'ProductTypeController');
Route::resource('department', 'DepartmentController');
Route::resource('customer', 'CustomerController');
Route::resource('business', 'BusinessController');
Route::resource('individual', 'IndividualController');
Route::resource('officer', 'OfficerController');
Route::resource('branch', 'BranchController');
Route::resource('employee', 'EmployeeController');
Route::resource('account', 'AccountController');
Route::resource('accTransaction', 'AccTransactionController');
Route::resource('bankInformations', 'BankInformationsController');

Route::get('/api/bankInformations', 'BankInformationsController@apiIndex');

Route::get('/api/branch', 'BranchController@apiIndex');
Route::post('/api/branch','BranchController@apiStore');
Route::put('/api/branch/{id}', 'BranchController@apiUpdate');
Route::delete('/api/branch/{id}', 'BranchController@apiDestroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);
