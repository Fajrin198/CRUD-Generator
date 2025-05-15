<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect('/login')->with('success', 'Pendaftaran berhasil. Silakan login.');
    }
}
