@extends('Invoices._layout')
@section('title', 'Invoice ' . $invoice->invoice_number)
@section('content')
{{-- <div class="flex justify-center flex-col items-center text-center"> --}}
    @include('components.invoice')
    <a href="/invoices/{{ $invoice->id }}/mail/ckamsi04@gmail.com">Mail Invoice</a>
    <a href="/invoices/{{ $invoice->id }}/edit">Edit</a>
    <form action="/invoices/{{ $invoice->id }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
{{-- </div> --}}
@endsection