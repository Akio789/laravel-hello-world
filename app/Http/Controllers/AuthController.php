<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\User;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function doRegister(Request $request)
    {
        $arr = $request->input();
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|confirmed'
        ])->validate();

        $arr['password'] = Hash::make($arr['password']);

        $user = User::create($arr);
        Auth::login($user);

        return redirect()->route('coins.index');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('coins.index');
        }
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('coins.index');
    }
}
