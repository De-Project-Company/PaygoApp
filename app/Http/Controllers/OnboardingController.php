<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
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

        return redirect('/onboarding/verify');
    }

    //this will come up after user has been stored, telling them to check their email for the verification link
    public function verify_email()
    {
        return view('verify');
    }

    //this will display the login form
    public function showLoginForm()
    {
        return view('login');
    }

    //this will validate users when they try to login
    public function authenticate()
    {

    }

    //this will log out users
    public function logout()
    {

    }

}
