@extends('dashboard.layouts.main')

@section('main-body')

<form action="/dashboard/user" method="post" class="mt-4">
    {{-- @csrf = mengirim token agar lolos validasi request --}}
    @csrf

    <div class="col-lg-8">
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" aria-describedby="validationEmail" value="{{ old('email') }}" required autofocus>

                    @error('email')
                        <div class="invalid-feedback" id="validationEmail">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control  @error('password') is-invalid @enderror" aria-describedby="validationPassword" required>

                    @error('password')
                        <div class="invalid-feedback" id="validationPassword">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" aria-describedby="validationNama" value="{{ old('nama') }}" required>
            
            @error('nama')
                <div class="invalid-feedback" id="validationNama">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control">{{ old('alamat') }}</textarea>
        </div>
        <div class="row mt-5">
            <div class="col">
                <div class="mb-3">
                    <label for="hp" class="form-label">No. HP</label>
                    <input type="text" name="hp" id="hp" class="form-control @error('hp') is-invalid @enderror" aria-describedby="validationHp" value="{{ old('hp') }}">

                    @error('hp')
                        <div class="invalid-feedback" id="validationHp">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="pos" class="form-label">Kode Pos</label>
                    <input type="text" name="pos" id="pos" class="form-control @error('pos') is-invalid @enderror" aria-describedby="validationPos" value="{{ old('pos') }}">

                    @error('pos')
                        <div class="invalid-feedback" id="validationPos">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" id="role" class="form-select">
                        <option value="2" @if (old('role') == 2) {{ 'selected' }} @endif>User</option>
                        <option value="1" @if (old('role') == 1) {{ 'selected' }} @endif>Admin</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="aktif" class="form-label">Aktif</label>
                    <select name="aktif" id="aktif" class="form-select">
                        <option value="1" @if (old('aktif') == 1) {{ 'selected' }} @endif>Aktif</option>
                        <option value="0" @if (old('aktif') == 0) {{ 'selected' }} @endif>Tidak Aktif</option>
                    </select>
                </div>
            </div>
        </div>
        

        <div class="row mt-5">
            <div class="col d-flex justify-content-center">
                <button type="reset" class="btn btn-secondary me-2">Reset</button>
                <button type="submit" class="btn btn-success me-2">Simpan</button>
                <a class="btn btn-danger" href="/dashboard/user">Batal</a>
            </div>
        </div>
    </div>
</form>

@endsection
