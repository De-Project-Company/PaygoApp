<?php

namespace App\Http\Controllers;



    use Illuminate\Support\Facades\Storage;
    use App\Mail\InvoiceEmail;
    use Barryvdh\DomPDF\Facade\Pdf;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Mail;
    use App\Models\Invoices;
    
    class InvoiceController extends Controller
    {
        public function create()
        {
            return view('invoices.create');
        }
        public function index(){
            return view('Invoices.index',[
                'invoices' => Invoices::latest()->filter(request(['tag','search']))->paginate(10),
            ]);
        }
    
        public function show(Invoices $invoice){
            return view('Invoices.show',[
                'invoice' => $invoice
               ]);
        }
        
        public function store(Request $request)
        {
            $data = $request->validate([
                'invoice_item' => 'required',
                'invoice_quantity' => 'required|numeric',
                'invoice_unit_cost' => 'required|numeric',
                'invoice_number' => 'required',
                'customer' => 'required',
                'invoice_due_date' => 'required|date',
                'invoice_note' => 'nullable',
            ]);
    
            $invoice = Invoices::create($data);
            $this->generatePDF($invoice);
            // Add logic to send the invoice via email
            $this->sendMail($invoice,'ckamsi04@gmail.com');
    
            return redirect('/invoices')->with('success', 'Invoice added and sent successfully!');
        }
    
        public function sendMail(Invoices $invoice,$email)
        {
            try {
                Mail::to($email)->send(new InvoiceEmail($invoice));
                return redirect('/invoices')->with('success', 'Email sent successfully!');
            } catch (\Exception $e) {
                // Log the error or handle it as needed
                return $e;
            }
        }


        public function generatePDF(Invoices $invoice)
        {
            try {
                // Ensure the directory exists
                $directory = 'invoices';
                Storage::makeDirectory($directory);

                // Load the PDF view
                $pdf = PDF::loadView('invoices.invoice-pdf', [
                    'invoice' => $invoice
                ]);

                // Optional: Set the paper size and orientation
                $pdf->setPaper('A4', 'landscape');

                // Save the PDF to a file
                Storage::put("public/invoices/{$invoice->invoice_number}.pdf", $pdf->output());

                // Retrieve PDF URL
                $pdfUrl = Storage::url("public/invoices/{$invoice->invoice_number}.pdf");

                return $pdfUrl;
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }

    }
    