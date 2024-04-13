<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{

    use VerifiesEmails;

    /**
     * Get the post register/login redirect path.
     *
     * @var string
    */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    /**
     * Show the email verification notice
     * 
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
    */

    public function show(Request $request)
    {
        //
    }

    /**
     * Mark the authenticated user's email address as verified.
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @return \Illuminate\Http\Response
    */

    public function verify(Request $request)
    {
        $userId = $request['id'];
        $user = User::find0rFail($userId);
        $date = date("Y-m-d g:i:s");

        $user->email_verified_at = $date;

    }

    /**
     * Resend the email verification notification.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
    */

    public function resend(Request $request)
    {

    }
}
