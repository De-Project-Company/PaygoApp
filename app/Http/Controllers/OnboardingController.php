<?php

namespace App\Http\Controllers;

use App\Custom\Services\EmailVerificationService;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\ResendEmailVerificationRequest;
use App\Http\Requests\VerifyEmailRequest;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\log;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Validator;


class OnboardingController extends Controller
{

    public function __construct(private EmailVerificationService $service)
    {
        //
    }

    /**
     * 
     * Register Method
     * 
     */
    public function register(RegistrationRequest $request)
    {
        $request['password'] = Hash::make($request->password);
        $user = User::create($request->validated());

        if($user)
        {
            $this->service->sendVerificationLink($user);
            $token = auth()->login($user);
            return $this->responseWithToken($token, $user);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'An error occurred while trying to create user'
            ], 500);
        }
    }

    /**
     * 
     * Returns JWT access token
     * 
     */
    public function responseWithToken($token, $user)
    {
        return response()->json([
            'status' => 'success',
            'user' => $user,
            'access_token' => $token,
            'type' => 'bearer'
        ]);
    }

    /**
     * 
     * Login Method
     * 
     */
    public function login(LoginRequest $request)
    {
        $token = auth()->attempt($request->validated());
        $user = auth()->user();

        if($token)
        {
            if($user->email_verified_at != NULL)
            {
                return $this->responseWithToken($token, auth()->user());
            }
            return response()->json([
                'status' => 'failed',
                'message' => 'Kindly Verify Your Email'
            ], 401);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Invalid Credentials'
            ], 401);
        }
    }

    /**
     * 
     * Resend Email Verification Link
     * 
     */
    public function resendEmailVerificationLink(ResendEmailVerificationRequest $request)
    {
        return $this->service->resendVerificationLink($request->email);
    }

    /**
     * 
     * Verify User Email
     * 
     */
    public function verifyUserEmail(VerifyEmailRequest $request)
    {
        return $this->service->verifyEmail($request->email, $request->token);
    }

    /**
     * 
     * Log Out Method
     * 
     */
    public function logout()
    {
        auth()->logout();
        return response()->json([
            'status' => 'success',
            'message' => 'User logged out successfully!'
        ]);
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
            'company_email' => 'nullable|email',
        ]);

        /** @var \App\Models\User $user **/
        $user->update($formFields);

        return back()->with('success', 'Business Info Updated Successfully!');
    }
}