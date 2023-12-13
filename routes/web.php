<?php

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\OnboardingController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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


//for testing purpose
Route::get('/bottom', function (){
    return view('bottom');
});

/*
 * The following process should be done on the Onboarding Controller
 * Process users signup
 * Process email verification
 * Process login
 *
 * The views for these onboarding controller are rendered directly, the view
 * are not rendered from the onboarding controller
 *
 *  */

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/index');
})->middleware(['auth', 'signed'])->name('verification.verify');

 
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//show the signup view
Route::get('/signup', function (){
    return view('signup');
});

//show the verify email screen
Route::get('verify-email', function (){
    return view('verify-email');
});

//show login view
Route::get('login', function (){
    return view('login');
});

// Authenticated routes are here, only authenticated users would have access to this routes
Route::middleware(['auth', 'verified'])->group(function () {

//create new users -business
Route::post('/onboarding', [OnboardingController::class, 'store']);

//login users - Business
Route::post('/onboarding/authenticate', [OnboardingController::class, 'authenticate']);

//logout
Route::post('/onboarding/logout', [OnboardingController::class, 'logout'] );

////onboarding Controller -show the veify email screen
Route::get('/onboarding/verify-email', [OnboardingController::class, 'verify_email']);

//show the clients/customers
Route::get('clients', function (){
    return view('customers');
});

//show the view for adding new clients
Route::get('/add-clients', [CustomersController::class, 'index']);

//show the dashboard for the logged-in users
Route::get('/dashboard', function () {
    return view('dashboard');
});


//show invoice page
Route::get('invoices', function (){
    return view('invoices');
});

});