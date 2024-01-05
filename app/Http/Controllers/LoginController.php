<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login.index', [
            "title" => "Login"
        ]);
    }

    public function authenticate(Request $request) {
        // validasi hasil request user
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // jika email dan password benar
        if (Auth::attempt($credentials)) {
            // data user dimasukkan ke variable session
            $request->session()->regenerate();

            // pindah ke halaman dashboard
            return redirect()->intended('/dashboard')->with('berhasilLogin', "<script>alert('login berhasil')</script>");
        }

        // jika email/password salah
        return back()->with('gagal', '<strong>Username atau Password salah!</strong>');
    }

    public function logout(Request $request) {
        // proses logout
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // pindah ke halaman login
        return redirect('/login');
    }
}
