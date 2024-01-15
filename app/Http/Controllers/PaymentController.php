<?php

namespace App\Http\Controllers;

use App\Mail\ReceiptMail;
use App\Models\User;
use App\Models\Invoices;
use App\Models\Payments;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function create(Invoices $invoice){
        return view('payments.create',[
            'invoice' => $invoice
        ]);
    }
    public function cash(Invoices $invoice){
        return view('payments.cash',[
            'invoice' => $invoice
        ]);
    }

    public function index()
    {
        $payments = Payments::where('user_id', auth()->id())
            ->latest()
            ->filter(request(['tag', 'search']))
            ->paginate(10);

        return view('payments.index', ['payments' => $payments]);
    }

    public function callback(Request $request){
        // dd($request->all());
        $secret_key = env('PAYSTACK_SECRET_KEY');
        $reference = $request->reference;
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/".$reference,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer $secret_key",
            "Cache-Control: no-cache",
            ),
        ));
        
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);
        // dd($response);

        if ($response->data->status == 'success') {
            $obj = new Payments;
            $obj->user_id = $response->data->metadata->custom_fields[2]->value;
            $obj->invoice_id = $response->data->metadata->custom_fields[1]->value;
            $obj->payment_id = $reference;
            $obj->invoice_number = $response->data->metadata->custom_fields[0]->value;
            $obj->amount = $response->data->amount / 100;
            $obj->payment_status = "Completed";
            $obj->channel = $response->data->channel;
            $obj->save();
            $payment = $obj;
            $this->generatePDF($payment);
            return redirect()->route('payments.success');
        }else{
            return redirect()->route('payments.failed');
        }
    }
    

    public function success(){
        return "Successfull";
    }

    public function failed(){
        return "Failed";
    }

    public function show(Payments $payment)
    {
        $invoice = Invoices::find($payment->invoice_id);
        return view('payments.show',[
            'invoice' => $invoice,
            'payment' => $payment
        ]);
    }

    private function generateRandomString($prefix,$length) {
        $randomNumbers = mt_rand(100000000000000, 999999999999999);
    
        // Combine the prefix 'T' with random numbers
        $result = $prefix . str_pad($randomNumbers, $length - strlen($prefix), '0', STR_PAD_LEFT);
    
        return $result;
    }


    public function store(Request $request){
        $data =  $request->validate([
            'invoice_id' => 'required',
            'invoice_number' => 'required',
            'amount' => 'required|numeric',
            'payment_status' => 'required|string',
            'channel' => 'required|string', 
        ]);
        $data['user_id'] = auth()->id();
        $data['payment_id'] = $this->generateRandomString('T',16);
        $payment = Payments::create($data);
        $this->generatePDF($payment);
        return $this->success();
    }

    private function generatePDF(Payments $payment)
    {
        try {
            // $directory = 'payments';
            // Storage::makeDirectory($directory);
        
            // Create an instance of the PDF class
            $pdf = app('dompdf.wrapper');
        
            // Load the PDF view
            $pdf->loadView('payments.receipt-pdf', [
                'payment' => $payment
            ]);
        
            // Optional: Set the paper size and orientation
            $pdf->setPaper('A4', 'landscape');
        
            // Save the PDF to a file in the storage directory
            $pdfPath = "public/payments/{$payment->payment_id}.pdf";
            Storage::put($pdfPath, $pdf->output());
        
            // Retrieve the PDF URL
            $pdfUrl = storage_path("app/{$pdfPath}");
        
            return $pdfUrl;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        
    }

    public function sendMail(Payments $payment,$email)
    {
        try {
            Mail::to($email)->send(new ReceiptMail($payment));
            return redirect('/payments')->with('success', 'Email sent successfully!');
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            return $e;
        }
    }
}
