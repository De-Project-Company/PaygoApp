<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Log;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
// use Illuminate\Support\Facades\Log;
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

//displays the reset password view
Route::get('/forgot-password', [OnboardingController::class, 'forgotPasswordView'])->name('forgot.password');

//handles sending reset password link via mail
Route::post('/forgot-password', [OnboardingController::class, 'resetPasswordRequest'])->name('reset.password.request');

//displays reset password view after user clicks on the link sent via mail
Route::get('/reset-password/{token}', [OnboardingController::class, 'resetPasswordView'])->name('reset.password.view');

//handles the password reset logic
Route::post('/reset-password', [OnboardingController::class, 'resetPassword'])->name('reset.password');

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

// Payment routes outside the authentication middleware to enable customers to make payment
Route::get('/payments/{invoice}/create/client',[PaymentController::class,'create'])->name('payments.create');
Route::get('/payments/callback',[PaymentController::class,'callback'])->name('payments.callback');
Route::get('/payments/success',[PaymentController::class,'success'])->name('payments.success');
Route::get('/payments/failed',[PaymentController::class,'failed'])->name('payments.failed');
// Payment routes end

// Authenticated routes are here, only authenticated users would have access to this routes
Route::middleware(['auth', 'verified'])->group(function () {

    //show the dashboard for the logged-in user
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    //show the clients/customers
    Route::get('clients', function (){
        return view('customers');
    });

    //show invoice page
    Route::get('invoices', function (){
        return view('invoices');
    });

    //logout
    Route::post('/onboarding/logout', [OnboardingController::class, 'logout'] );

    //show the view for adding new clients
    Route::get('/add-clients', [CustomersController::class, 'index']);

    // --------Invoice Route Starts Here ----------\\
    //show invoice page
    Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');

    Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');

    Route::post('/invoices', [InvoiceController::class, 'store']);

    Route::get('/invoices/{invoice}/mail/{email}',[InvoiceController::class,'sendMail']);


    Route::get('/invoices/{invoice}/edit',[InvoiceController::class,'edit'])->name('invoices.edit');

    Route::put('/invoices/{invoice}',[InvoiceController::class,'update']);

    Route::delete('/invoices/{invoice}',[InvoiceController::class,'destroy']);

    Route::get('/invoices/{invoice}',[InvoiceController::class,'show'])->name('invoices.show');

    //displays the business edit form
    Route::get('/business/edit', [OnboardingController::class, 'editBusiness'])->name('edit.business');

    //updates business info
    Route::put('/business', [OnboardingController::class, 'updateBusiness'])->name('update.business');

    // Payment route with authentification to allow users view payments made to their business
    Route::get('/payments',[PaymentController::class,'index'])->name('payments.index');

        // On counter payment page assuming payment is made in cash
    Route::get('/payments/{invoice}/create/cash',[PaymentController::class,'cash'])->name('payments.cash');
    Route::post('/payments',[PaymentController::class,'store'])->name('payments.store');
    
    Route::get('/payments/{payment}/mail/{email}',[PaymentController::class,'sendMail']);

    Route::get('/payments/{payment}',[PaymentController::class,'show'])->name('payments.show');
});
