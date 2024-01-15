<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .payment-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        .purchase-info {
            font-size: 18px;
            color: #333;
            margin-bottom: 20px;
            text-align: left;
        }

        .amount {
            font-size: 24px;
            color: #2ecc71; /* Green color for the amount */
            font-weight: bold;
            margin-top: 10px;
        }

        .pay-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db; /* Blue color for the button */
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .pay-button:hover {
            background-color: #2980b9; /* Darker blue on hover */
        }
    </style>
    <title>Payment Information</title>
</head>
<body>
    @php
    $total = 0;
@endphp
@foreach ($invoice->items as $item)
@php
    $total += $item->quantity * $item->unit_cost;
@endphp

@endforeach
<div class="payment-container">
    <div class="purchase-info">
        <p>Thank you for your purchase {{ $invoice->customer }} 😍!</p>
        <p>Your order details:</p>
        <ul>
            <li>Invoice ID: {{ $invoice->invoice_number }}</li>
            <li>Subtotal:  {{ number_format(max($total,0),'2') }} </li>
            <li>Extra Charges:  {{ number_format(max($invoice->invoice_vat,0),'2') }} </li>
            <li>Discount:  {{ number_format(max($invoice->invoice_discount,0),'2') }} </li>
            <li>Total Amount:  {{ number_format(max(($total + $invoice->invoice_vat) - $invoice->invoice_discount, 0), '2') }} </li>
        </ul>
    </div>

    <div class="amount">
        {{ number_format(max(($total + $invoice->invoice_vat) - $invoice->invoice_discount, 0), '2') }}
    </div>

    <form id="paymentForm">
       
        <div class="form-submit">
          <button type="submit" onclick="payWithPaystack(this)" class="pay-button"> Pay </button>
        </div>
    </form>
      
      <script src="https://js.paystack.co/v1/inline.js"></script>
</div>
    <script>
        const paymentForm = document.getElementById('paymentForm');
        paymentForm.addEventListener("submit", payWithPaystack, false);

        function payWithPaystack(e) {
        e.preventDefault();

        let handler = PaystackPop.setup({
            key: "{{ env('PAYSTACK_PUBLIC_KEY') }}",
            email: "ckamsi04@gmail.com",
            amount: {{ ($total + $invoice->invoice_vat) - $invoice->invoice_discount }} * 100,
            metadata:{
                custom_fields: [
                    {
                        display_name: "Invoice Number",
                        variable_name: "invoice_number",
                        value: "{{$invoice->invoice_number}}",
                    },
                    {
                        display_name: "Invoice ID",
                        variable_name: "invoice_id",
                        value: "{{$invoice->id}}",
                    },
                    {
                        display_name: "User ID",
                        variable_name: "user_id",
                        value: "{{$invoice->user_id}}",
                    },
                ]
            },
            onClose: function(){
                alert('Window closed.');
            },
            callback: function(response){
                window.location.href = "/payments/callback" + response.redirecturl ;
            }
        });

        handler.openIframe();
        }


    </script>
</body>
</html>
