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

    <form action="/payments" method="post">
        @csrf
        <input type="hidden" value="{{ $invoice->id }}" name="invoice_id">
        <input type="hidden" value="{{ $invoice->invoice_number }}" name="invoice_number">
        <input type="hidden" value="{{ ($total + $invoice->invoice_vat) - $invoice->invoice_discount }}" name="amount">
        <input type="hidden" value="Completed" name="payment_status">
        <input type="hidden" value="Cash" name="channel">
        <input type="submit" value="Deposit" class="pay-button">
    </form>
</div>

</body>
</html>
