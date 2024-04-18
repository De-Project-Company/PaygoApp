@extends('payments._layout')
@section('title','Payments Received')
@section('content')
<div class="flex justify-center flex-col items-center text-center">
<!-- customer segmentation image -->
@if (count($payments) === 0)
    <div class="flex justify-center px-5 py-6">
        <img src="{{asset('storage/images/Piggy bank with calculator, money and calendar for accounting.svg')}}" alt="">
    </div>
    <p class="w-[322px] h-[71px] font-poppins font-medium text-base ">
        Your Payments
    </p>
@endif

@foreach ($payments as $payment)
    <tr>
        <td><a href="/payments/{{$payment->id}}"><p>{{ $payment->payment_id}}</p></a></td>
        <td>{{ $payment->payment_status }}</td>
    </tr>
@endforeach
</div>

<div class="mt-6 p-4">
    {{ $payments->links() }}
</div>
@endsection