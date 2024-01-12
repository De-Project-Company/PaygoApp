@extends('payments._layout')
@section('title', 'Payment ' . $payment->invoice_number)
@section('content')
{{-- <div class="flex justify-center flex-col items-center text-center"> --}}
    @include('components.payment')
    <form action="/payments/{{ $payment->id }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
{{-- </div> --}}
@endsection