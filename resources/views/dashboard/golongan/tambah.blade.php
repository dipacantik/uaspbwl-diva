@extends('dashboard.layouts.main')

@section('main-body')

<form action="/dashboard/golongan" method="post" class="mt-4">
    {{-- @csrf = mengirim token agar lolos validasi request --}}
    @csrf

    <div class="col-lg-8">
        <div class="mb-3 col-md-3">
            <label for="kode" class="form-label">Status</label>
            <input type="text" name="kode" id="kode" class="form-control @error('kode') is-invalid @enderror" aria-describedby="validationKode" value="{{ old('kode') }}" required>
            
            @error('kode')
                <div class="invalid-feedback" id="validationKode">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" aria-describedby="validationNama" value="{{ old('nama') }}" required>
            
            @error('nama')
                <div class="invalid-feedback" id="validationNama">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="row mt-5">
            <div class="col d-flex justify-content-center">
                <button type="reset" class="btn btn-secondary me-2">Reset</button>
                <button type="submit" class="btn btn-success me-2">Simpan</button>
                <a class="btn btn-danger" href="/dashboard/golongan">Batal</a>
            </div>
        </div>
    </div>
</form>

@endsection
