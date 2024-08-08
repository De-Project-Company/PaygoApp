<?php

namespace App\Custom\Services;

use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeService
{
    /**
     * Generate Qr Code using data passed
     */
    public function generateQrCode($data)
    {
        $user = auth()->user();

        if($user->id != auth()->id()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized Action'
            ], 403);
        }

        // Deletes existing qr_code (if it exists)
        if ($user->qr_code) {
            Storage::disk('public')->delete($user->qr_code);
        }

        $qrCodeData = "Bank Name: {$data['bank_name']}\nAccount Name: {$data['account_name']}\nAccount Number: {$data['account_number']}";
        $fileName = 'qrcode_' . $user->id . '.png';
        $filePath = 'qrcodes/' . $fileName;
        
        $qrCode = QrCode::size(300)->format('png')->generate($qrCodeData);
        Storage::put($filePath, $qrCode);

         /** @var \App\Models\User $user **/
        $updateQrcode = $user->update($data + [
            'qr_code_data' => $qrCodeData,
            'qr_code' => $filePath
        ]);

        if($updateQrcode)
        {
            return response()->json([
                'status' => 'success',
                'message' => 'Your QrCode has been generated successfully',
                'user' => $user
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'An error occured while trying to generate your QrCode, pleas etry again'
            ]);
        }
    }
}
?>