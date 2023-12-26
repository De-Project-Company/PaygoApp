@extends('Invoices._layout')
@section('title','my invoices')
@section('content')
<div class="flex justify-center flex-col items-center text-center">
<!-- customer segmentation image -->
@if (count($invoices) === 0)
    <div class="flex justify-center px-5 py-6">
        <img src="{{asset('storage/images/Piggy bank with calculator, money and calendar for accounting.svg')}}" alt="">
    </div>
    <p class="w-[322px] h-[71px] font-poppins font-medium text-base ">
        Create Invoices to receive or record payments from your customers
    </p>
    <a href="/invoices/create" class="flex justify-center font-poppins items-center w-[146px] h-[40px] rounded-2xl border px-[32px] py-[8px] gap-[8px] text-[#3676E0] border-[#3676E0] font-bold text-base whitespace-nowrap"><span class="font-semibold text-[32px] leading-[48px]">+</span> Add new </a>
@endif

@foreach ($invoices as $invoice)
    <p>{{ $invoice->invoice_number}}</p>
@endforeach
</div>

<div class="mt-6 p-4">
    {{ $invoices->links() }}
</div>
@endsection