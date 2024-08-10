<?php

namespace App\Custom\Services;

use App\Models\PasswordResetToken;
use App\Models\User;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Notification;

class PasswordService
{

    /**
     * 
     * Send Password Reset Link to User
     * 
     */
    public function sendPasswordResetLink(object $user)
    {
        Notification::send($user, new ResetPasswordNotification($this->generatePasswordResetLink($user->email)));
        return response()->json([
            'status' => 'success',
            'message' => 'The link to reset your password has been sent successfully'
        ]);
    }

    /**
     * 
     * Checks that the Email exists in the DB
     * 
     */
    public function checkIfEmailExists($email)
    {
        $user = User::where('email', $email)->first();

        if($user == NULL)
        {
            response()->json([
                'status' => 'failed',
                'message' => 'There is no account associated with this email address'
            ])->send();
            exit;
        }
    }

    /**
     * 
     * Resets Password
     * 
     */

    public function resetPassword(string $email, string $token)
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
    public function verifyToken($request)
    {
        $token = PasswordResetToken::where('email', $request->email)->where('token', $request->token)->first();

        if($token)
        {
            if($token->expired_at >= now())
            {
                return $token;
            } else {
                $token->delete();
                response()->json([
                    'status' => 'failed',
                    'message' => "Token expired, try making the password request again"
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
     * Generates Password Reset Link
     * 
     */

    public function generatePasswordResetLink($email)
    {
        $checkIfTokenExist = PasswordResetToken::where('email', $email);

        if($checkIfTokenExist) $checkIfTokenExist->delete();

        $token = Str::uuid();
        $url = config('app.url'). '?token='.$token . '&email='.$email;

        $saveToken = PasswordResetToken::create([
            'email' => $email,
            'token' => $token,
            'expired_at' => now()->addMinutes(60)
        ]);

        if($saveToken)
        {
            return $url;
        }
    }

    /**
     * 
     * Validate Current Password
     * 
     */
    public function validateCurrentPassword($currentPassword)
    {
        if(!password_verify($currentPassword, auth()->user()->password))
        {
            response()->json([
                'status' => 'failed',
                'message' => 'Password doesn\'t match current password'
            ])->send();
            exit;
        }
    }

    /**
     * 
     * Change Password
     * 
     */
    public function changePassword($data)
    {
        $this->validateCurrentPassword($data['current_password']);

        $user = Auth::user();
        /** @var \App\Models\User $user **/
        $updatePassword = $user->update([
            'password' => Hash::make($data['password'])
        ]);
        if($updatePassword)
        {
            return response()->json([
                'status' => 'success',
                'message' => 'Password updated successfully'
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'An error occurred while updating password'
            ]);
        }
    }

    /**
     * 
     * Update Password
     * 
     */

    public function updatePassword($data)
    {
        $user = User::where('email', $data->email)->first();

        $updatePassword = $user->update([
            'password' => Hash::make($data['password'])
        ]);
        if($updatePassword)
        {
            return response()->json([
                'status' => 'success',
                'message' => 'Password updated successfully'
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'An error occurred while updating password'
            ]);
        }
    }
}