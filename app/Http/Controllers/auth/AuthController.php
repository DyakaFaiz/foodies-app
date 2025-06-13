<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        $data = [
            'title' => 'Login',
        ];

        return view('auth.login', $data);
    }

    public function loginPost(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $credentials['email'])->first();

        // Jika user ada dan password sesuai
        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Login user pakai guard default
            Auth::login($user);

            // Redirect ke halaman setelah login (ganti sesuai kebutuhan)
            return redirect()->intended('/admin')->with('success', 'Selamat datang! ' .  Auth::user()->name);
        }

        // Jika gagal, kembalikan dengan error
        return back()->with('error', 'Email atau password salah.')->withInput(['email' => $credentials['email']]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Berhasil logout.');
    }

}
