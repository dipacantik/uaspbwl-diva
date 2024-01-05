@extends('auth.layouts.main')

@section('main-body')

    {{-- Notifikasi Berhasil --}}
    @if (session()->has('berhasil'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {!! session('berhasil') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button >
        </div>
    @endif

    {{-- Notifikasi Gagal --}}
    @if (session()->has('gagal'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {!! session('gagal') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button >
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h1 class="h3 fw-normal text-center">Register Now</h1>
        </div>
        <div class="card-body">
            <form action="/register" method="post">
                @csrf

                <div class="form-floating">
                    <input type="email" name="email" id="email" placeholder="Input email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                    <label for="email">Email</label>
                </div>

                <div class="form-floating mt-1">
                    <input type="password" name="password" id="password" placeholder="Input password"  class="form-control @error('password') is-invalid @enderror" required>
                    <label for="password">Password</label>
                </div>

                <div class="form-floating mt-1">
                    <input type="text" name="nama" id="nama" placeholder="Input nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
                    <label for="nama">Nama Lengkap</label>
                </div>

                <div class="form-floating mt-1">
                    <textarea name="alamat" id="alamat" class="form-control @error('nama') is-invalid @enderror" placeholder="Input alamat">{{ old('alamat') }}</textarea>
                    <label for="alamat">Alamat</label>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-floating mt-1">
                            <input type="text" name="hp" id="hp" placeholder="Input no. hp" class="form-control @error('hp') is-invalid @enderror" value="{{ old('hp') }}">
                            <label for="hp">No. HP</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mt-1">
                            <input type="text" name="pos" id="pos" placeholder="Input pos" class="form-control @error('pos') is-invalid @enderror" value="{{ old('pos') }}">
                            <label for="pos">Kode Pos</label>
                        </div>
                    </div>
                </div>

                <button class="btn btn-success w-100 py-2 mt-3" type="submit">Register</button>
                <small class="d-block text-center mt-3">Sudah punya akun? <a href="/login">Login sekarang!</a></small>
            </form>
        </div>
    </div>

@endsection