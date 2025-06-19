<?php
// app/Http/Controllers/Admin/Auth/LoginController.php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers; // <<< PASTIKAN INI ADA untuk method-method AuthenticatesUsers (seperti guard())

class LoginController extends Controller
{
    // Ini adalah trait yang menyediakan method login, logout, dsb.
    // Pastikan Anda telah mengadaptasi method-method ini jika Anda menulisnya sendiri.
    // Jika Anda menulis ulang method 'login' dan 'logout' seperti yang Anda berikan,
    // maka AuthenticatesUsers bisa tidak wajib, tapi umumnya dipakai.
    // use AuthenticatesUsers;

    // Menampilkan form login admin
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    // Memproses permintaan login admin
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Coba otentikasi menggunakan guard 'admin'
        // 'remember' harus boolean, jadi pastikan $request->boolean('remember')
        if (Auth::guard('admin')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            // >>> PERUBAHAN DI SINI <<<
            // Arahkan ke dashboard admin
            // Gunakan route('admin.dashboard') untuk mengarah ke named route 'admin.dashboard'
            return redirect()->intended(route('admin.dashboard'));
        }

        // Jika otentikasi gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // Melakukan logout admin
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout(); // Melakukan logout dari guard 'admin'

        $request->session()->invalidate(); // Menghapus semua data sesi
        $request->session()->regenerateToken(); // Meregenerasi token CSRF

        return redirect()->route('admin.login.form'); // Redirect kembali ke halaman login admin
    }
}