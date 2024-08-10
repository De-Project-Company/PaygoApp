<?php

namespace App\Http\Controllers\Api\Profile;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Custom\Services\PasswordService;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\UpdatePasswordRequest;

class PasswordController extends Controller
{
    /**
     * 
     * Constructor
     * 
     */
    public function __construct(private PasswordService $service)
    {
        //
    }

    /**
     * 
     * Sends Password Reset Link
     * 
     */
    public function sendPasswordResetLink(ResetPasswordRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        $this->service->checkIfEmailExists($request->email);

        return $this->service->sendPasswordResetLink($user);
    }

    /**
     * 
     * Verifies the Reset Password Token and Proceeds to Reset the Password
     * 
     */
    public function resetPassword(UpdatePasswordRequest $request)
    {
        $this->service->verifyToken($request);

        return $this->service->updatePassword($request);
    }

    /**
     * 
     * Changes Password
     * 
     */
    public function changeUserPassword(ChangePasswordRequest $request)
    {
        return $this->service->changePassword($request->validated());
    }
}
