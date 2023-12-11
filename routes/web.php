<?php

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\OnboardingController;
use Illuminate\Support\Facades\Route;

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


//for testing purpose
Route::get('/test', function (){
    return view('test');
});


//onboarding Controller -show logo first
Route::get('/onboarding', [OnboardingController::class, 'index']);

//onboarding Controller -show signup
Route::get('/onboarding/signup', [OnboardingController::class, 'signup']);

////onboarding Controller -show signup
Route::get('/onboarding/verify-email', [OnboardingController::class, 'verify_email']);


//create new onboarding users-business
Route::post('/onboarding', [OnboardingController::class, 'store']);


//login users
Route::post('/onboarding/authenticate', [OnboardingController::class, 'authenticate']);

//logout
Route::post('/onboarding/logout', [OnboardingController::class, 'logout'] );



//show login view
Route::get('login', function (){
    return view('login');
});

//show customers views
Route::get('/customers', [CustomersController::class, 'index']);


Route::get('/add-clients', [CustomersController::class, 'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
});


//show the clients/customers dashboard
Route::get('clients', function (){
    return view('customers');
});

//show invoice page
Route::get('invoices', function (){
    return view('invoices');
});
