<?php

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Log;
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

//  all email authentication routes -- start --

//this will return a view instructing the user to click the email verification link that was emailed to them
Route::get('/email/verify', function () {
    return view('verify');
})->middleware('auth')->name('verification.notice');

//handles request generated when the user clicks the email verification link
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

//allows the user to request that the verification email be resent
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//  all email authentication routes -- end --

//display the signup view
Route::get('/signup', function (){
    return view('signup');
});

//onboarding Controller - display the veify email screen
Route::get('/onboarding/verify', [OnboardingController::class, 'verify_email']);

//display login view
Route::get('/login', [OnboardingController::class, 'showLoginForm'])->name('login');

//create new users - business
Route::post('/onboarding', [OnboardingController::class, 'store']);

//login users - business
Route::post('/onboarding/authenticate', [OnboardingController::class, 'authenticate'])->name('authenticate');

//facebook login route --start--

//displays the facebook page for login
Route::get('auth/facebook', [SocialController::class, 'loginWithFacebook'])->name('facebook.login');

//facebook login route - logs user in using facebook
Route::get('auth/facebook/callback', [SocialController::class, 'facebookRedirect']);

//facebook login route --end--

//google login routes --start--

Route::get('auth/google', [SocialController::class, 'loginWithGoogle'])->name('google.login');

Route::get('auth/google/callback', [SocialController::class, 'googleRedirect']);

//google login routes --end--

// Authenticated routes are here, only authenticated users would have access to this routes
Route::middleware(['auth', 'verified'])->group(function () {
    
    //show the dashboard for the logged-in user
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    //logout
    Route::post('/onboarding/logout', [OnboardingController::class, 'logout'] );

    //show the clients/customers
    Route::get('clients', function (){
        return view('customers');
    });

    //show the view for adding new clients
    Route::get('/add-clients', [CustomersController::class, 'index']);

    // --------Invoice Route Starts Here ----------\\
    //show invoice page
    Route::get('/invoices', [InvoiceController::class, 'index']);
    
    Route::get('/invoices/create', [InvoiceController::class, 'create']);

    Route::post('/invoices', [InvoiceController::class, 'store']);
    
    Route::get('/invoices/{invoice}/generate',[InvoiceController::class,'generatePDF']);

    Route::get('/invoices/{invoice}/mail/{email}',[InvoiceController::class,'sendMail']);
    
    Route::get('/invoices/{invoice}',[InvoiceController::class,'show']);

});
