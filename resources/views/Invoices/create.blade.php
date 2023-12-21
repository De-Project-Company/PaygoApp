@extends('Invoices._layout');
@section('title', "add invoice")
@section('content')
<div class="flex justify-center flex-col items-center text-center">
<form action="/invoices" method="post">
    @csrf
    <div class="form-group">
        <label for="invoice_item">Invoice Item:</label>
        <input type="text" name="invoice_item" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="invoice_quantity">Quantity:</label>
        <input type="number" name="invoice_quantity" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="invoice_unit_cost">Unit Cost:</label>
        <input type="number" name="invoice_unit_cost" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="invoice_number">Invoice Number:</label>
        <input type="text" name="invoice_number" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="customer">Customer:</label>
        <input type="text" name="customer" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="invoice_due_date">Due Date:</label>
        <input type="date" name="invoice_due_date" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="invoice_note">Note:</label>
        <textarea name="invoice_note" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection