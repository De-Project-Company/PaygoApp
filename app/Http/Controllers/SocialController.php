<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function loginWithFacebook() 
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookRedirect()
    {
        try {
    
            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('facebook_id', $user->id)->first();
     
            if($isUser){

                Auth::login($isUser);
                return redirect('/dashboard');

            }else{

                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'password' => Hash::make($user->password)
                ]);
    
                Auth::login($createUser);
                return redirect('/dashboard');
            }
    
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

    public function loginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleRedirect()
    {
        try {

            $user = Socialite::driver('google')->user();
            $isUser = User::where('google_id', $user->id)->first();

            if($isUser){

                Auth::login($isUser);
                return redirect('/dashboard');

            }else{

                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => Hash::make($user->password)
                ]);

                Auth::login($createUser);
                return redirect('/dashboard');

            }
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

}
