<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }

    h2 {
        margin-top: 20px;
    }
</style>

<div>
    <h2>Amount</h2>
    {{-- Currency should be added to d business --}}
    <p style="font-weight: bolder">NGN {{ number_format($payment->amount,'2') }}</p>

    <h2>{{ $payment->payment_status }}</h2>
    <table>
        <tr>
            <th>Payment ID</th>
            <td>{{ $payment->payment_id }}</td>
        </tr>
        <tr>
            <th>Channel</th>
            <td>{{ $payment->channel }}</td>
        </tr>
        <tr>
            <th>Paid At</th>
            <td>{{ $payment->created_at }}</td>
        </tr>
        <tr>
            <th>Invoice Number</th>
            <td>{{ $payment->invoice_number }}</td>
        </tr>
    </table>
</div>
