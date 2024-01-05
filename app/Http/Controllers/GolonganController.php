<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Golongan;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.golongan.index', [
            "title" => "Riwayat Pemesanan",
            "nav_active" => "Pemesanan",
            "dataGolongan" => Golongan::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.golongan.tambah', [
            "title" => "Tambah Riwayat Pemesanan",
            "nav_active" => "Pemesanan"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'kode' => 'required|unique:golongan|min:5|max:10',
            'nama' => 'required|max:100'
        ]);

        // menambahkan data ke dalam database
        Golongan::create($validatedData);
        
        // pindah ke halaman index
        return redirect('/dashboard/golongan')->with('berhasil', '<strong>Data berhasil ditambahkan!</strong>');

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
    public function edit(string $kode)
    {
        return view('dashboard.golongan.edit', [
            "title" => "Edit Riwayat Pemesanan",
            "nav_active" => "Pemesanan",
            "dataGolongan" => Golongan::where('kode', $kode)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $kode)
    {
        // membuat aturan validasi
        $rules = [
            'nama' => 'required|max:100'
        ];

        // ambil data berdasarkan kode
        $dataGolongan = Golongan::where('kode', $kode)->first();

        // jika kode diubah maka akan divalidasi, jika kode tidak diubah maka kode tidak perlu divalidasi
        if ($request->kode != $dataGolongan->kode) {
            $rules['kode'] = 'required|unique:golongan|min:5|max:10';
        }

        // proses validasi
        $validatedData = $request->validate($rules);
        
        // menyimpan perubahan data ke dalam database
        Golongan::where('kode', $kode)->first()->update($validatedData);
        
        // pindah ke halaman index
        return redirect('/dashboard/golongan')->with('berhasil', '<strong>Data berhasil diubah!</strong>');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $kode)
    {
        // menghapus sebuah data pada database
        Golongan::where('kode', $kode)->delete();
        
        // pindah ke halaman index
        return redirect('/dashboard/golongan')->with('berhasil', '<strong>Data berhasil dihapus!</strong>');
    }
}
