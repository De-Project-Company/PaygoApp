<?php

namespace App\Http\Controllers\Api\Profile;

use App\Custom\Services\PasswordService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
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
     * Change Password
     * 
     */
    public function changeUserPassword(ChangePasswordRequest $request)
    {
        return $this->service->changePassword($request->validated());
    }
}
