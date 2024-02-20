<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * login view
     */
    public function loginView(){
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
    public function registrationView(){
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
}
