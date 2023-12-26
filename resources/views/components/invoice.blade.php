{{-- Add internal styles here on top --}}


<style>
    section {
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

{{--  --}}
<section>
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
            @php
                $total = 0;
            @endphp
            @foreach ($invoice->items as $item)
            @php
                $total += $item->quantity * $item->unit_cost;
            @endphp
            <tr>
                <td>{{ $item->description }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->unit_cost }}</td>
                <td>{{ number_format($item->quantity * $item->unit_cost, '2') }}</td>
            </tr>
            
        @endforeach
        
        </tbody>
    </table>
    
    <div class="invoice-total">
        <p><strong>Extra Charges:</strong> {{ number_format($invoice->invoice_vat,'2') }}</p>
        <p><strong>Discount Applied:</strong> {{ number_format($invoice->invoice_discount,'2') }}</p>
        <p><strong>Total Amount:</strong> {{ number_format(($total + $invoice->invoice_vat) - $invoice->invoice_discount,'2') }}</p>
    </div>
</section>