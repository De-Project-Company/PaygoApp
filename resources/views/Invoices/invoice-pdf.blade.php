<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice-details {
            margin-bottom: 20px;
        }

        .invoice-items {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .invoice-items th, .invoice-items td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .invoice-total {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="invoice-header">
        <h1>Invoice</h1>
    </div>

    <div class="invoice-details">
        <p><strong>Invoice Number:</strong> {{ $invoice->invoice_number }}</p>
        <p><strong>Customer:</strong> {{ $invoice->customer }}</p>
        <p><strong>Due Date:</strong> {{ $invoice->invoice_due_date }}</p>
    </div>

    <table class="invoice-items">
        <thead>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Unit Cost</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>           
                <tr>
                    <td>{{ $invoice->invoice_item }}</td>
                    <td>{{ $invoice->invoice_quantity }}</td>
                    <td>{{ $invoice->invoice_unit_cost }}</td>
                    <td>{{ number_format($invoice->invoice_quantity * $invoice->invoice_unit_cost,'2') }}</td>
                </tr>
        </tbody>
    </table>

    <div class="invoice-total">
        <p><strong>Total Amount:</strong> {{ $invoice->total_amount }}</p>
    </div>
</body>
</html>
