<?php

namespace App\Custom\Services;

use App\Models\EmailVerificationToken;
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