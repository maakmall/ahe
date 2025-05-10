<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function index(): \Illuminate\View\View
    {
        return view('auth.index');
    }

    public function login(Request $request): \Illuminate\Http\RedirectResponse
    {
        $credentials = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ],
            [
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Format email tidak valid',
                'password.required' => 'Password tidak boleh kosong',
            ]
        );

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password tidak valid',
        ])->onlyInput('email');
    }

    public function logout(Request $request): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
