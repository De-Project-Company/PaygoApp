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




//This is to test that the server works as it and it is up and running, send a request to /api to check if it is up
Route::get('/', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'Server is working'
    ], 200);
});

Route::post('auth/register', [OnboardingController::class, 'register']);
Route::post('auth/login', [OnboardingController::class, 'login']);
Route::post('auth/verify_user_email', [OnboardingController::class, 'verifyUserEmail']);
Route::post('auth/resend_email_verification_link', [OnboardingController::class, 'resendEmailVerificationLink']);
Route::post('auth/password/reset_password_request', [PasswordController::class, 'sendPasswordResetLink']);
Route::post('auth/password/reset_password', [PasswordController::class, 'resetPassword']);



Route::group([
    'prefix' => 'v1',
    'middleware' => ['auth:api']
], function()
{
    Route::put('update_profile', [ProfileController::class, 'updateProfile']);
    Route::post('profile/upload_picture', [ProfileController::class, 'uploadProfilePicture']);
    Route::put('generate_qrcode', [QrCodeController::class, 'generateQrCode']);
    Route::get('refresh-token', [OnboardingController::class, 'refreshToken']);
    Route::post('/change_password', [PasswordController::class, 'changeUserPassword']);
    Route::get('logout', [OnboardingController::class, 'logout']);



});
