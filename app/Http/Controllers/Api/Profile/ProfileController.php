<?php

namespace App\Http\Controllers\Api\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = auth()->user();
        
        if($user->id != auth()->id())
        {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized Action'
            ],403);
        }

        /** @var \App\Models\User $user **/
        $updateProfile = $user->update($request->validated());


        if($updateProfile)
        {
            return response()->json([
                'status' => 'success',
                'user' => $user,
                'message' => 'Profile has been updated successfully'
            ]);
        } else
        {
            return response()->json([
                'status' => 'failed',
                'message' => 'An error occurred while trying to update profile'
            ],500);
        }
    }
}
