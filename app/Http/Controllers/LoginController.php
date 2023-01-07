<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|email:dns|max:255',
            'password' => 'required'
        ]);

        if(Auth::attempt($validateData)) {
            $request->session()->regenerate();

            return redirect(route('index'));
        }

      return back()->with('loginError', 'Login failed ! check email dan password');


    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect(route('login'))->with('logout', 'Horeee logout success!!');

    }
}
