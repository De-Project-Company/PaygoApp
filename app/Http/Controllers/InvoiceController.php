<?php

namespace App\Http\Controllers;



    use Illuminate\Support\Facades\Storage;
    use App\Mail\InvoiceEmail;
use App\Models\InvoiceItems;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Validator;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Mail;
    use App\Models\Invoices;
    
    class InvoiceController extends Controller
    {


        public function create()
        {
            return view('invoices.create');
        }
        
        public function edit(Invoices $invoice)
        {
            return view('invoices.edit',[
                'invoice' => $invoice
            ]);
        }

        // InvoiceController.php
        public function index()
        {
            $invoices = Invoices::where('user_id', auth()->id())
                ->latest()
                ->filter(request(['tag', 'search']))
                ->paginate(10);

            return view('Invoices.index', ['invoices' => $invoices]);
        }

        
    
        public function show(Invoices $invoice) {
            try {
                $invoice = Invoices::where('user_id', auth()->id())->findOrFail($invoice->id);
        
                return view('Invoices.show', ['invoice' => $invoice]);
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                return redirect()->route('invoices.index')->with('error', 'Invoice not found.');
            }
        }
        

        // Adding invoice and related methods

        private function checkForUniqueNumber($number):bool{
            if (Invoices::where('invoice_number',$number)->doesntExist()){
                return true;
            }
            return false;
        }

        public function store(Request $request)
        {
            $data = $this->validateInvoiceData($request);

            // Associate the user with the invoice
            $data['user_id'] = auth()->id();
            $data['status'] = "issued";
            $invoice = $this->generateUniqueInvoice($data);

            $itemsData = $request->input('items');

            $this->createInvoiceItems($invoice, $itemsData);

            $this->generatePDF($invoice);

            $invoiceId = $invoice->id;

            return redirect()->route('invoices.show', ['invoice' => $invoice->id])->with('success', 'Invoice added successfully!');
        }


        private function validateInvoiceData(Request $request)
        {
            return $request->validate([
                'customer' => 'required',
                'invoice_due_date' => 'required|date',
                'invoice_note' => 'nullable',
                'invoice_vat' => 'required|numeric',
                'invoice_discount' => 'required|numeric',
                'payment_method' => 'required|string', // Fix typo
            ]);
        }

        private function generateUniqueInvoice(array $data)
        {
            $invoiceNumber = $this->generateUniqueInvoiceNumber();

            // Add the unique number to data array and save it in the database
            $data['invoice_number'] = $invoiceNumber;
            $data['invoice_total'] = 0;
            // dd($data);
            return Invoices::create($data);
        }

        private function generateUniqueInvoiceNumber()
        {
            do {
                $uniqId = uniqid('inv_');
                $invoiceNumber = substr($uniqId, 0, 10);
            } while (!$this->checkForUniqueNumber($invoiceNumber));

            return $invoiceNumber;
        }

        private function createInvoiceItems(Invoices $invoice, array $itemsData)
        {
            foreach ($itemsData as $index => $itemData) {
                $itemData['quantity'] = (float) $itemData['quantity'];
                $itemData['unit_cost'] = (float) $itemData['unit_cost'];

                // $rules = [
                //     "items.{$index}.description" => 'required|string',
                //     "items.{$index}.quantity" => 'required|numeric',
                //     // Add more rules as needed for other item fields
                // ];
                // $validator = Validator::make($itemData, $rules);

                // // Check if validation fails
                // if ($validator->fails()) {
                //     dd('Validation failed for item', [
                //         'item_index' => $index,
                //         'errors' => $validator->errors()->toArray(),
                //     ]);
                //     return;
                // }
        
                // // If validation passes, create and associate the item with the invoice
                // $validatedItemData = $validator->validated();
                $item = new InvoiceItems($itemData);
                $invoice->items()->save($item);
            }
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


        private function generatePDF(Invoices $invoice)
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

        // Deleting invoice and related methods

        public function destroy(Invoices $invoice){
            $this->deleteInvoiceItems($invoice);

            // Delete generated PDF
            $this->deleteGeneratedPDF($invoice);
        
            // Delete the invoice
            $invoice->delete();
            return redirect('/invoices')->with('success', 'Deleted this invoice');
        }

        private function deleteGeneratedPDF(Invoices $invoice)
        {
            try {
                Storage::delete("public/invoices/{$invoice->invoice_number}.pdf");

                return true;
            } catch (\Exception $e) {
                dd($e);
            }
        }

        private function deleteInvoiceItems(Invoices $invoice)
        {
            $invoice->items()->delete();

            return true;
        }

        // Updating invoice and all related methods\

        public function update(Request $request, Invoices $invoice)
        {
            $data = $this->validateInvoiceData($request);
        
            // Update the invoice
            $invoice->update($data);
        
            // Update the related items
            $this->updateItems($request, $invoice);
            $this->generatePDF($invoice);
            return redirect()->route('invoices.show', ['invoice' => $invoice->id])->with('success', 'Invoice and items updated successfully!');
        }
        

        private function updateItems(Request $request, Invoices $invoice)
        {
            $itemsData = $request->input('items');

            foreach ($itemsData as $itemId => $itemData) {
                $item = InvoiceItems::find($itemId);

                if ($item) {
                    $item->update($itemData);
                }
            }

            return true;
        }



    }
    