<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{   
    public function generateQrCode(Request $request) 
    {
        $user = Auth::user();

        if($user->id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formData = $request->validate([
            'bank_name' => 'required',
            'account_name' => 'required',
            'account_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);
        $qrCodeData = "Bank Name: {$formData['bank_name']}, Account Name: {$formData['account_name']}, Account Number: {$formData['account_number']}";
        $fileName = 'qrcode_' . $user->id . '.png';
        $filePath = 'qrcodes/' . $fileName;

        $qrCode = QrCode::size(300)->format('png')->generate($qrCodeData);

        Storage::put($filePath, $qrCode);

         /** @var \App\Models\User $user **/
        $user->update($formData + [
            'qr_code_data' => $qrCodeData,
            'qr_code' => $filePath
        ]);
        return back()->with('success', 'QR code generated successfully!');
    } 

    public function showQrCode() 
    {
        $user = Auth::user();
        return view('qr-code', compact('user', 'user'));
    }
}
