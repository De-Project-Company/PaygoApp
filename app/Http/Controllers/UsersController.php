<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //Logs user in by calling the login endpoint
    public function login(Request $request) {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $user = User::where("email", $request->email)->first();

        if(!empty($user)) {
            // if(Hash::check($request->password, $user->password)) {
            if($request->password === $user->password) {
                $token = $user->createToken("accessToken")->plainTextToken;

                return response()->json([
                    "status" => 200,
                    "message" => "Logged in!",
                    "token" => $token
                ]);
            }
            return response()->json([
                "status" => 400,
                "message" => "Password Incorrect"
            ]);
        }
        return response()->json([
            "status" => 400,
            "message" => "Invalid details"
        ]);
    }
}
