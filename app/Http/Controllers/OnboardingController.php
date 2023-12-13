<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\User;

class OnboardingController extends Controller
{
    //This will validate and store new user
    public function store(Request $request)
    {
        $request->validate([
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            "phone_number" => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            "password" => 'required|confirmed|min:6'
        ]);

        $request['password'] = Hash::make($request->password);
        $user = User::create($request);

        event(new Registered($user));
    }

    //this will come after user signup and confirm that their email is verified
    public function verify_email()
    {

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
