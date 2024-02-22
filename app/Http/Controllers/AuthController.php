<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\ResetPassword;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * login view
     */
    public function showLoginForm(){
        return view('pages.auth.login');
    }
    /**
     * login attempt method.
     */
    public function loginAttempt(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $remember = $request->remember_me;
        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
        {
            throw ValidationException::withMessages([
                'email'=>'Invalid email or password'
            ]);
        }
        return redirect()->route('dashboard')->with('success', 'You are loged in');
    }


    /**
     * Registration view
     */
    public function showRegistrationForm(){
        return view('pages.auth.registration');
    }


    /**
     * Registration Attempt
     */
    public function registrationAttempt(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'user_name' => 'required|max:100|Unique:users,user_name',
            'email' => 'required|email|Unique:users,email',
            'password' => 'required|confirmed|min:6|max:100',
            'mobile' => 'max:18|unique:users,mobile',
        ]);
        try {
            $user = User::create([
                'name'=>$request->name,
                'user_name'=>$request->user_name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'mobile'=>$request->mobile,
            ]);
            Auth::login($user, $remember = true);
            return redirect()->route('dashboard');
        }catch (Exception $exception) {
            return redirect()->back()->with('failed', $exception->getMessage());
        }
    }


    /**
     * forget password Attempt
     */
    public function showForgetPasswordForm()
    {
        return view('pages.auth.forget_password');
    }


    /**
     * Write code on Method
     */
    public function forgetPasswordAttempt(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ],[
            'email.exists'=>'Email is not exist our system'
        ]);
        $token = Str::random(64);
        $before_token = DB::table('password_reset_tokens')->whereEmail($request->email)->first();
        if ($before_token)
            DB::table('password_reset_tokens')->whereEmail($request->email)->delete();
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        $user = User::whereEmail($request->email)->first();
        $user->notify(new ResetPassword($token));
        return back()->with('success', 'Please check you mail. We have e-mailed your password reset link!');
    }


    /**
     * Write code on Method
     */
    public function showResetPasswordForm($token) {
        $token_exit = DB::table('password_reset_tokens')->whereToken($token)->first();
        if (!$token_exit)
            return redirect()->route('auth.login')->with('error','Invalid token');
        return view('pages.auth.reset_password', ['token'=>$token, 'email'=>$token_exit->email]);
    }

    /**
     * Write code on Method
     */
    public function resetPasswordAttempt(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_reset_tokens')->whereToken($request->token)->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $updatePassword->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['token'=> $request->token])->delete();

        return redirect()->route('login')->with('success', 'Your password has been changed!');
    }

}
