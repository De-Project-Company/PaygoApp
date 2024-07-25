<?php

namespace App\Custom\Services;

use Illuminate\Support\Facades\Storage;

class ProfilePictureUploadService
{
    /**
     * 
     * Upload/Change Profile Picture with Uploaded File
     * 
     */
    public function uploadProfilePicture($data)
    {
        try{
            $user = auth()->user();
            
            // Deletes existing profile picture (if it exists)
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            // Retrieves and saves the picture uploaded
            $file = $data->file('picture');
            $fileName = $user->id . '_' . $file->getClientOriginalName();
            $filePath = 'profile_pictures/' . $fileName;
            Storage::put($filePath, $file);

            /** @var \App\Models\User $user **/
            $user->profile_picture = $filePath;
            $user->update();

            return response()->json([
                'status' => 'success',
                'message' => 'Profile picture uploaded successfully!',
                'profile_picture' => $filePath
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred.',
                'error' => $e->getMessage()
            ], 500);
        }

    }
}