<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends Controller
{
    public function sendVerificationEmail(Request $request)
    {
        if($request->user()->hasVerifiedEmail())
        {
            return response()->json([
                "status" => 422,
                "message" => "User has already been verified"
            ]);
        }
        $request->user()->sendEmailVerificationNotification();
        return response()->json([
            "status" => 200,
            "message" => "Verification link has been sent!"
        ]);
    }

    public function verify(EmailVerificationRequest $emailVerificationRequest)
    {
        if($emailVerificationRequest->user()->hasVerifiedEmail())
        {
            return response()->json([
                "status" => 422,
                "message" => "Email has already been verified"
            ]);
        }
        if($emailVerificationRequest->user()->markEmailAsVerified())
        {
            event(new Verified($emailVerificationRequest->user()));
        }
        return response()->json([
            "status" => 200,
            "message" => "Email has been verified!"
        ]);
    }

    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) 
        {
            return response()->json([
                "status" => 422,
                "message" => "Email has already been verified"
            ]);
        }   
        $request->user()->sendEmailVerificationNotification();
        return response()->json([
            "status" => 200,
            "message" => "Verification link has been sent!"
        ]);
    }
}
