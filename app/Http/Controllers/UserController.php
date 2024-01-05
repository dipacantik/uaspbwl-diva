<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.user.index', [
            "title" => "Data User",
            "nav_active" => "User",
            "dataUser" => User::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    
     // crate = menampilkan form tambah data
    public function create()
    {
        return view('dashboard.user.tambah', [
            "title" => "Tambah User Baru",
            "nav_active" => "User"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

    // store = proses input data request ke dalam database
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users|max:50',
            'password' => 'required|min:8|max:100',
            'nama' => 'required|max:100',
            'hp' => 'max:25',
            'pos' => 'max:5',
            'role' => 'required',
            'aktif' => 'required'
        ]);
        
        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        // menambahkan data ke dalam database
        User::create($validatedData);
        
        // pindah ke halaman user.index
        return redirect('/dashboard/user')->with('berhasil', '<strong>Data berhasil ditambahkan!</strong>');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    // edit = menampilkan form edit data
    public function edit(string $email)
    {
        // dd($email);
        return view('dashboard.user.edit', [
            "title" => "Edit User",
            "nav_active" => "User",
            "dataUser" => User::where('email', $email)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $email)
    {
        // membuat aturan validasi
        $rules = [
            'nama' => 'required|max:100',
            'hp' => 'max:25',
            'pos' => 'max:5',
            'role' => 'required',
            'aktif' => 'required'
        ];

        // ambil data berdasarkan email
        $dataUser = User::where('email', $email)->first();

        // jika email diubah maka akan divalidasi, jika email tidak diubah maka email tidak perlu divalidasi
        if ($request->email != $dataUser->email) {
            $rules['email'] = 'required|email|unique:users|max:50';
        }

        // jika password diubah maka akan divalidasi, jika password tidak diubah maka password tidak perlu divalidasi
        if ($request->password != $dataUser->password) {
            $rules['password'] = 'required|min:8|max:100';
        }

        // proses validasi
        $validatedData = $request->validate($rules);

        // proses enkripsi password
        if ($request->password != $dataUser->password) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }
        
        // menyimpan perubahan data ke dalam database
        User::where('email', $email)->first()->update($validatedData);
        
        // pindah ke halaman user.index
        return redirect('/dashboard/user')->with('berhasil', '<strong>Data berhasil diubah!</strong>');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $email)
    {
        // menghapus data user pada database
        User::where('email', $email)->delete();
        
        // pindah ke halaman user.index
        return redirect('/dashboard/user')->with('berhasil', '<strong>Data berhasil dihapus!</strong>');
    }
}
