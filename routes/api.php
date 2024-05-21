<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\Api\Profile\ProfileController;
use App\Http\Controllers\Api\Profile\PasswordController;
use App\Http\Controllers\Api\Profile\QrCodeController;

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

Route::post('auth/register', [OnboardingController::class, 'register']);
Route::post('auth/login', [OnboardingController::class, 'login']);
Route::post('auth/verify_user_email', [OnboardingController::class, 'verifyUserEmail']);
Route::post('auth/resend_email_verification_link', [OnboardingController::class, 'resendEmailVerificationLink']);

Route::group([
    'prefix' => 'v1',
    'middleware' => ['auth:api']
], function()
{
    Route::put('update_profile', [ProfileController::class, 'updateProfile']);
    Route::put('generate_qrcode', [QrCodeController::class, 'generateQrCode']);
    Route::get('refresh-token', [OnboardingController::class, 'refreshToken']);
    Route::post('/change_password', [PasswordController::class, 'changeUserPassword']);
    Route::get('logout', [OnboardingController::class, 'logout']);

});
