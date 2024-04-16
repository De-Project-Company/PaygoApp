<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\OnboardingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('email/verification-notification', [EmailVerificationController::class, 'sendVerificationEmail'])->name('emailverification.notification');

// Route::get('email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('emailverification.verify');

// Route::get('email/resend', [EmailVerificationController::class, 'resend'])->name('emailverification.resend');

Route::post('auth/register', [OnboardingController::class, 'register']);
Route::post('auth/login', [OnboardingController::class, 'login']);

Route::group([
    "middleware" => ["auth:api"]
], function()
{
    Route::get('dashboard', [OnboardingController::class, 'profile']);
    Route::get('refresh-token', [OnboardingController::class, 'refreshToken']);
    Route::get('logout', [OnboardingController::class, 'logout']);

});
