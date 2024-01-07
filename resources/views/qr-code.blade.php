<!-- Assuming $user is the user model instance passed to the view -->
<img src="{{ asset($user->qr_code) }}" alt="QR Code">