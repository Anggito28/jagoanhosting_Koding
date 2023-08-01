<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (session('success')) {
                Alert::success(session('success'));
            }

            if (session('error')) {
                Alert::error(session('error'));
            }

            return $next($request);
        });
    }
    //view auth
    public function viewAuth()
    {
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }
        return view('sign-in');
    }

    //login
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->intended('dashboard')->with('success', 'Berhasil Login!');
        }

        return redirect()->back()->with('error', 'Username atau Password Salah!');
    }

    //logout
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login.view')->with('success', 'Berhasil Logout!');
    }
}
