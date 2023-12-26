<?php

namespace App\Mail;

    use Illuminate\Support\Facades\Storage;
    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Mail\Mailable;
    use Illuminate\Queue\SerializesModels;
    
    class InvoiceEmail extends Mailable
    {
        use Queueable, SerializesModels;
    
        public function __construct($invoice)
        {
            $this->sendIt($invoice);
        }
    
        public function sendIt($invoice)
        {
            try {
                $pdfPath = storage_path("app/public/invoices/{$invoice->invoice_number}.pdf");

                return $this->subject('Invoice Email')
                    ->view('invoices.email-template', [
                        'invoice' => $invoice
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
    