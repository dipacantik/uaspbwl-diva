<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register.index', [
            "title" => "Register"
        ]);
    }

    public Function store(Request $request) {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users|max:50',
            'password' => 'required|min:8|max:100',
            'nama' => 'required|max:100',
            'alamat' => '',
            'hp' => 'max:25',
            'pos' => 'max:5'
        ]);
        
        $validatedData['password'] = Hash::make($validatedData['password']);
        
        User::create($validatedData);
        
        return redirect('/login')->with('berhasil', "<strong>Registrasi berhasil, login sekarang!</strong>");
    }
}
