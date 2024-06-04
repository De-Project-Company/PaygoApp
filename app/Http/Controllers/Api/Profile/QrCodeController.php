<?php

namespace App\Http\Controllers\Api\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\QrCodeRequest;
use App\Custom\Services\QrCodeService;

class QrCodeController extends Controller
{
    /**
     * 
     * Constructor
     * 
     */
    public function __construct(private QrCodeService $service)
    {
        //
    } 

    public function generateQrCode(QrCodeRequest $request) 
    {
        return $this->service->generateQrCode($request->validated());
    }
}
