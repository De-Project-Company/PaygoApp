<?php

namespace App\Custom\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordService
{
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
}