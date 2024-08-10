<?php

namespace App\Http\Controllers\Api\Profile;

use App\Custom\Services\PasswordService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\VerifyResetPasswordTokenRequest;
use App\Models\User;
use Illuminate\Http\Request;

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
     * Send Password Reset Link
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
     * Change Password
     * 
     */
    public function changeUserPassword(ChangePasswordRequest $request)
    {
        return $this->service->changePassword($request->validated());
    }


}
