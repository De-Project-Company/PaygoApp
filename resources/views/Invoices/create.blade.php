{{-- Add the form for creating an invoice here --}}
@extends('Invoices._layout');
@section('title', "add invoice")
@section('content')

<div class="flex justify-center flex-col items-center text-center">
    {{-- Start here --}}

    <form action="/invoices" method="POST">
        @csrf
    
        <!-- Invoice details -->
        <label for="customer">Customer:</label>
        <input type="text" name="customer" required>

        <label for="invoice_due_date">Due Date:</label>
        <input type="date" name="invoice_due_date" required>

        <label for="invoice_note">Invoice Note:</label>
        <textarea name="invoice_note"></textarea>

        <label for="invoice_vat">Invoice VAT:</label>
        <input type="number" name="invoice_vat" required step="0.01">

        <label for="invoice_discount">Invoice Discount:</label>
        <input type="number" name="invoice_discount" required step="0.01">

        <label for="payment_method">Payment Method:</label>
        <input type="text" name="payment_method" required>
    
        <!-- Other invoice fields -->
    
        <!-- Invoice items -->
        <div id="items-container">
            <div class="item">
                <label for="items[0][description]">Item Description:</label>
                <input type="text" name="items[0][description]" required>
    
                <label for="items[0][quantity]">Quantity:</label>
                <input type="number" name="items[0][quantity]" required>
    
                <label for="items[0][unit_cost]">Unit Cost:</label>
                <input type="number" name="items[0][unit_cost]" required>
    
                <!-- Other item fields -->
            </div>
    
            <div class="item">
                <!-- Repeat similar structure for each item -->
            </div>
        </div>
    
        <button type="button" id="add-item">Add Item</button>
    
        <button type="submit">Submit</button>
    </form>
    
    <script>
        document.getElementById('add-item').addEventListener('click', function () {
            var itemsContainer = document.getElementById('items-container');
            var newItem = document.createElement('div');
            newItem.className = 'item';
    
            newItem.innerHTML = `
                <label for="items[${itemsContainer.children.length}][description]">Item Description:</label>
                <input type="text" name="items[${itemsContainer.children.length}][description]" required>
    
                <label for="items[${itemsContainer.children.length}][quantity]">Quantity:</label>
                <input type="number" name="items[${itemsContainer.children.length}][quantity]" required>
    
                <label for="items[${itemsContainer.children.length}][unit_cost]">Unit Cost:</label>
                <input type="number" name="items[${itemsContainer.children.length}][unit_cost]" required>
    
                <!-- Other item fields -->
            `;
    
            itemsContainer.appendChild(newItem);
        });
    </script>
    

</div>
@endsection