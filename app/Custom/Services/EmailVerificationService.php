<?php

namespace App\Custom\Services;

use App\Models\EmailVerificationToken;
use App\Models\User;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class EmailVerificationService
{

    /**
     * 
     * Send Verification Link to User
     * 
     */
    public function sendVerificationLink(object $user)
    {
        Notification::send($user, new VerifyEmailNotification($this->generateVerificationLink($user->email)));
        return response()->json([
            'status' => 'success',
            'message' => 'Verification link sent successfully'
        ]);
    }

    /**
     * 
     * Resend Verification Link to User
     * 
     */
    public function resendVerificationLink($email)
    {
        $user = User::where('email', $email)->first();
        if($user)
        {
            $this->sendVerificationLink($user);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'User not found'
            ]);
        }
    }

    /**
     * 
     * Check if user has already been verified
     * 
     */
    public function checkIfEmailIsVerified($user)
    {
        if($user->email_verified_at != NULL)
        {
            response()->json([
                'status' => 'failed',
                'message' => 'Email has already been verified'
            ])->send();
            exit;
        }
    }

    /**
     * 
     * Verify user email
     * 
     */
    public function verifyEmail(string $email, string $token)
    {
        $user = User::where('email', $email)->first();
        if(!$user)
        {
            response()->json([
                'status' => 'failed',
                'message' => 'User not found'
            ])->send();
            exit;
        }
        $this->checkIfEmailIsVerified($user);
        $verifiedToken = $this->verifyToken($email, $token);

        if($user->markEmailAsVerified())
        {
            $verifiedToken->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Email has been verified successfully'
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Email verification failed, try again later'
            ]);
        }
    }

    /**
     * 
     * Verify Token
     * 
     */
    public function verifyToken(string $email, string $token)
    {
        $token = EmailVerificationToken::where('email', $email)->where('token', $token)->first();

        if($token)
        {
            if($token->expired_at >= now())
            {
                return $token;
            } else {
                $token->delete();
                response()->json([
                    'status' => 'failed',
                    'message' => "Token expired"
                ])->send();
                exit;
            }
        } else {
            response()->json([
                'status' => 'failed',
                'message' => 'Invalid token'
            ])->send();
            exit;
        }
    }

    /**
     * 
     * Generate Verification Link
     * 
     */
    public function generateVerificationLink(string $email): string
    {
        $checkIfTokenExist = EmailVerificationToken::where('email', $email)->first();

        if($checkIfTokenExist) $checkIfTokenExist->delete();

        $token = Str::uuid();
        $url = config('app.url'). '?token='.$token . '&email='.$email;

        $saveToken = EmailVerificationToken::create([
            'email' => $email,
            'token' => $token,
            'expired_at' => now()->addMinutes(60)
        ]);

        if($saveToken)
        {
            return $url;
        }
    }
}