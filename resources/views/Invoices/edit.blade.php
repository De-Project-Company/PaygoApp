{{-- Add the form for creating an invoice here --}}
@extends('Invoices._layout');
@section('title', "add invoice")
@section('content')

<div class="flex justify-center flex-col items-center text-center">
    {{-- Start here --}}
<form action="/invoices/{{$invoice->id}}" method="post">
    @csrf
    @method('PUT')

    <label for="customer">Customer:</label>
        <input type="text" name="customer" required value="{{ $invoice->customer }}">

        <label for="invoice_due_date">Due Date:</label>
        <input type="date" name="invoice_due_date" required value="{{ date($invoice->invoice_due_date) }}">

        <label for="invoice_note">Invoice Note:</label>
        <textarea name="invoice_note">{{ $invoice->invoice_note }}</textarea>

        <label for="invoice_vat">Invoice VAT:</label>
        <input type="number" name="invoice_vat" required step="0.01" value="{{ $invoice->invoice_vat }}">

        <label for="invoice_discount">Invoice Discount:</label>
        <input type="number" name="invoice_discount" required step="0.01" value="{{ $invoice->invoice_discount }}">

        <label for="payment_method">Payment Method:</label>
        <input type="text" name="payment_method" required value={{ $invoice->payment_method }}><br>

    @foreach ($invoice->items as $item)
        <label for="items[{{ $item->id }}][description]">Description:</label>
        <input type="text" name="items[{{ $item->id }}][description]" value="{{ $item->description }}" required>

        <label for="items[{{ $item->id }}][quantity]">Quantity:</label>
        <input type="number" name="items[{{ $item->id }}][quantity]" value="{{ $item->quantity }}" required>

        <label for="items[{{ $item->id }}][quantity]">Unit Cost:</label>
        <input type="number" name="items[{{ $item->id }}][unit_cost]" value="{{ $item->unit_cost }}" required><br>

        {{-- Add other item fields as needed --}}
    @endforeach

    <button type="submit">Update Invoice</button>
</form>
</div>
@endsection