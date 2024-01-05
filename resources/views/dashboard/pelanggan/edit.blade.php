@extends('dashboard.layouts.main')

@section('main-body')
{{-- @dd($dataUser) --}}

<form action="/dashboard/pelanggan/{{ $dataPelanggan->no }}" method="post" class="mt-4">
    {{-- mengubah method POST -> method PUT --}}
    @method('put')
    {{-- @csrf = mengirim token agar lolos validasi request --}}
    @csrf

    <div class="col-lg-8">
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="id_gol" class="form-label">Golongan</label>
                    <select name="id_gol" id="id_gol" class="form-select">
                        @foreach ($dataGolongan as $rowGolongan)
                            @if (old('id_gol', $dataPelanggan->id_gol) == $rowGolongan->id)
                                <option value="{{ $rowGolongan->id }}" selected>{{ $rowGolongan->nama }}</option>
                            @else
                                <option value="{{ $rowGolongan->id }}">{{ $rowGolongan->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="id_user" class="form-label">User</label>
                    <select name="id_user" id="id_user" class="form-select">
                        @foreach ($dataUser as $rowUser)
                            @if (old('id_user', $dataPelanggan->id_user) == $rowUser->id)
                                <option value="{{ $rowUser->id }}" selected>{{ $rowUser->email }}</option>
                            @else
                                <option value="{{ $rowUser->id }}">{{ $rowUser->email }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="mb-3 col-md-4">
                <label for="no" class="form-label">No Pelanggan</label>
                <input type="number" min="1" name="no" id="no" class="form-control @error('no') is-invalid @enderror" aria-describedby="validationNo" value="{{ old('no', $dataPelanggan->no) }}" required>
                
                @error('no')
                    <div class="invalid-feedback" id="validationNo">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" aria-describedby="validationNama" value="{{ old('nama', $dataPelanggan->nama) }}" required>
            
            @error('nama')
                <div class="invalid-feedback" id="validationNama">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" required>{{ old('alamat', $dataPelanggan->alamat) }}</textarea>
        </div>
        <div class="row mt-5">
            <div class="col">
                <div class="mb-3">
                    <label for="hp" class="form-label">No. HP</label>
                    <input type="text" name="hp" id="hp" class="form-control @error('hp') is-invalid @enderror" aria-describedby="validationHp" value="{{ old('hp', $dataPelanggan->hp) }}" required>

                    @error('hp')
                        <div class="invalid-feedback" id="validationHp">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="ktp" class="form-label">No KTP</label>
                    <input type="text" name="ktp" id="ktp" class="form-control @error('ktp') is-invalid @enderror" aria-describedby="validationKtp" value="{{ old('ktp', $dataPelanggan->ktp) }}" required>

                    @error('ktp')
                        <div class="invalid-feedback" id="validationKtp">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="seri" class="form-label">No Seri</label>
                    <input type="number" min="0" name="seri" id="seri" class="form-control @error('seri') is-invalid @enderror" aria-describedby="validationSeri" value="{{ old('seri', $dataPelanggan->seri) }}" required>

                    @error('seri')
                        <div class="invalid-feedback" id="validationSeri">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="meteran" class="form-label">Meteran</label>
                    <input type="number" min="0" name="meteran" id="meteran" class="form-control @error('meteran') is-invalid @enderror" aria-describedby="validationMeteran" value="{{ old('meteran', $dataPelanggan->meteran) }}" required>

                    @error('meteran')
                        <div class="invalid-feedback" id="validationMeteran">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="aktif" class="form-label">Aktif</label>
                    <select name="aktif" id="aktif" class="form-select" required>
                        <option value="Y" @if (old('aktif', $dataPelanggan->aktif) == 'Y') {{ 'selected' }} @endif>Aktif</option>
                        <option value="N" @if (old('aktif', $dataPelanggan->aktif) == 'N') {{ 'selected' }} @endif>Tidak Aktif</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col d-flex justify-content-center">
                <button type="reset" class="btn btn-secondary me-2">Reset</button>
                <button type="submit" class="btn btn-success me-2">Simpan</button>
                <a class="btn btn-danger" href="/dashboard/pelanggan">Batal</a>
            </div>
        </div>
    </div>
</form>

@endsection
