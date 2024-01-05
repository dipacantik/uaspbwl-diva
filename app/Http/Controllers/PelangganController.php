<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\User;
use App\Models\Golongan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.pelanggan.index', [
            "title" => "Pemesanan",
            "nav_active" => "Pemesanan",
            "dataPelanggan" => Pelanggan::with(['user', 'golongan'])->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pelanggan.tambah', [
            "title" => "Tambah Pemesanan",
            "nav_active" => "Pemesanan",
            "dataGolongan" => Golongan::orderBy('nama', 'ASC')->get(),
            "dataUser" => User::orderBy('email', 'ASC')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_gol' => 'required',
            'id_user' => 'required',
            'no' => 'required|unique:pelanggan|min:1|max:20',
            'nama' => 'required|max:50',
            'alamat' => 'required',
            'hp' => 'required|max:20',
            'aktif' => 'required'
        ]);
        

        // menambahkan data ke dalam database
        Pelanggan::create($validatedData);
        
        // pindah ke halaman index
        return redirect('/dashboard/pelanggan')->with('berhasil', '<strong>Data berhasil ditambahkan!</strong>');
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
    public function edit(string $no)
    {
        return view('dashboard.pelanggan.edit', [
            "title" => "Edit Pemesanan",
            "nav_active" => "Pemesanan",
            "dataGolongan" => Golongan::orderBy('nama', 'ASC')->get(),
            "dataUser" => User::orderBy('email', 'ASC')->get(),
            "dataPelanggan" => Pelanggan::where('no', $no)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $no)
    {
        // membuat aturan validasi
        $rules = [
            'id_gol' => 'required',
            'id_user' => 'required',
            'nama' => 'required|max:50',
            'alamat' => 'required',
            'hp' => 'required|max:20',
            'aktif' => 'required'
        ];

        // ambil data berdasarkan no
        $dataPelanggan = Pelanggan::where('no', $no)->first();

        // jika no diubah maka akan divalidasi, jika no tidak diubah maka no tidak perlu divalidasi
        if ($request->no != $dataPelanggan->no) {
            $rules['no'] = 'required|unique:pelanggan|min:1|max:20';
        }

        // proses validasi
        $validatedData = $request->validate($rules);
        
        // menyimpan perubahan data ke dalam database
        Pelanggan::where('no', $no)->first()->update($validatedData);
        
        // pindah ke halaman index
        return redirect('/dashboard/pelanggan')->with('berhasil', '<strong>Data berhasil diubah!</strong>');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $no)
    {
        // menghapus data pada database
        Pelanggan::where('no', $no)->delete();
        
        // pindah ke halaman index
        return redirect('/dashboard/pelanggan')->with('berhasil', '<strong>Data berhasil dihapus!</strong>');
    }
}
