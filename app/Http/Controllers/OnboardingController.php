<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;


class OnboardingController extends Controller
{

    //This will validate, handle the email verification call, and store user
    public function store(Request $request)
    {
        $formData = $request->validate([
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            "phone_number" => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            "password" => 'required|confirmed|min:6'
        ]);

        $formData['password'] = Hash::make($request->password);
        $user = User::create($formData);

        event(new Registered($user));

        auth()->login($user);
        $request->session()->regenerate();

        return redirect('/onboarding/verify');
    }

    //this will come up after user has been stored, telling them to check their email for the verification link
    // public function verify_email()
    // {
    //     return view('verify');
    // }

    //this will display the login form
    public function showLoginForm()
    {
        return view('login');
    }

    //this will validate users when they try to login user
    public function authenticate(Request $request)
    {
        $formData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($formData))
        {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Credentials do not match what is in our records!',
        ])->onlyInput('email');
    }

    //this will log out users
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');
    }

    //displays the forgot password view
    public function forgotPasswordView() {
        return view('resetpassword');
    }

    //sends mail containing reset password link
    public function resetPasswordRequest(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('emails.resetpassword', ['token' => $token], function ($message) use ($request){
            $message->to($request->email);
            $message->subject("Reset Password");
        });

        return redirect()->to(route('forgot.password'))->with('success', 'We have sent an email to reset your password');
    }

    //displays the view for setting new password
    public function resetPasswordView($token) {
        return view('newpassword', compact('token'));
    }

    //updates the new password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $updatePassword = DB::table('password_reset_tokens')
        ->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if(!$updatePassword) {
            return redirect()->to(route('reset.password.view'))->with('error', 'Invalid details!');
        }

        User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

        return redirect()->to(route('login'))->with('success', 'Password reset successfully!');
    }

    public function editBusiness()
    {
        return view('editbusiness');
    }

    public function updateBusiness(Request $request) 
    {
        $user = Auth::user();

        if($user->id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'name' => 'nullable',
            'email' => 'nullable|email',
            'phone_number' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            'business_name' => 'nullable',
            'company_email' => 'nullable|email|unique:users',
        ]);

        /** @var \App\Models\User $user **/
        $user->update($formFields);

        return back()->with('success', 'Business Info Updated Successfully!');
    }
}