<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\VerifyEmailRequest;
use App\Http\Requests\RegistrationRequest;
use App\Custom\Services\EmailVerificationService;
use App\Http\Requests\ResendEmailVerificationRequest;

class OnboardingController extends Controller
{

    public function __construct(private EmailVerificationService $service)
    {
        //
    }

    /**
     * 
     * Register Method
     * 
     */
    public function register(RegistrationRequest $request)
    {
        $request['password'] = Hash::make($request->password);
        $user = User::create($request->validated());

        if($user)
        {
            $this->service->sendVerificationLink($user);
            $token = auth()->login($user);
            return $this->responseWithToken($token, $user);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'An error occurred while trying to create user'
            ], 500);
        }
    }

    /**
     * 
     * Returns JWT access token
     * 
     */
    public function responseWithToken($token, $user)
    {
        return response()->json([
            'status' => 'success',
            'user' => $user,
            'access_token' => $token,
            'type' => 'bearer'
        ]);
    }

    /**
     * 
     * Login Method
     * 
     */
    public function login(LoginRequest $request)
    {
        $token = auth()->attempt($request->validated());
        $user = auth()->user();

        if($token)
        {
            if($user->email_verified_at != NULL)
            {
                return $this->responseWithToken($token, auth()->user());
            }
            return response()->json([
                'status' => 'failed',
                'message' => 'Kindly Verify Your Email'
            ], 401);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Invalid Credentials'
            ], 401);
        }
    }

    /**
     * 
     * Resends Email Verification Link
     * 
     */
    public function resendEmailVerificationLink(ResendEmailVerificationRequest $request)
    {
        return $this->service->resendVerificationLink($request->email);
    }

    /**
     * 
     * Verifies User Email
     * 
     */
    public function verifyUserEmail(VerifyEmailRequest $request)
    {
        return $this->service->verifyEmail($request->email, $request->token);
    }

    /**
     * 
     * Log Out Method
     * 
     */
    public function logout()
    {
        auth()->logout();
        return response()->json([
            'status' => 'success',
            'message' => 'User logged out successfully!'
        ]);
    }
}