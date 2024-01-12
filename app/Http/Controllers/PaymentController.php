<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\Payments;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
}
