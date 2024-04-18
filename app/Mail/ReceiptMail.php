<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReceiptMail extends Mailable
{
    use Queueable, SerializesModels;
    public function __construct($payment)
    {
        $this->sendIt($payment);
    }

    public function sendIt($payment)
    {
        try {
            $pdfPath = storage_path("app/public/payments/{$payment->payment_id}.pdf");

            return $this->subject('Invoice Email')
                ->view('payments.email-template', [
                    'payment' => $payment
                ])
                ->attach($pdfPath, [
                    'as' => 'invoice.pdf',
                    'mime' => 'application/pdf',
                ]);
        } catch (\Exception $e) {
            // Handle the exception as needed
            return $e->getMessage();
        }
    }
}
