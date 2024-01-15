{{-- Holds the template of the email  customize the email--}}

Hello there
<a href="http://127.0.0.1:8000/payments/{{ $invoice->id }}/create/client">Make payment here </a>

{{-- If payment method not equal to cash --}}


{{-- Qr code  --}}