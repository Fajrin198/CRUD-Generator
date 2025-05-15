<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Cek role user
            if (Auth::user()->role === 'superAdmin') {
                return redirect()->intended('/index');
            }

            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }

    public function showLogin()
    {
        return view('login');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // keluar dari session
        $request->session()->invalidate(); // invalidate session
        $request->session()->regenerateToken(); // regenerasi CSRF token

        return redirect()->route('login')->with('success', 'Logout berhasil.');
    }
}
