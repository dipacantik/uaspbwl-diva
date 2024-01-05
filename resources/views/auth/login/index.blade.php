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
            <h1 class="h3 fw-normal text-center">Please Login</h1>
        </div>
        <div class="card-body">
            <form action="/login" method="post">
                @csrf

                <div class="form-floating">
                    <input type="email" name="email" id="email" placeholder="Input email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                    <label for="email">Email</label>
                </div>

                <div class="form-floating mt-1">
                    <input type="password" name="password" id="password" placeholder="Input password"  class="form-control @error('password') is-invalid @enderror" required>
                    <label for="password">Password</label>
                </div>

                <button class="btn btn-success w-100 py-2 mt-3" type="submit">Login</button>
                <small class="d-block text-center mt-3">Belum registrasi? <a href="/register">Registrasi sekarang!</a></small>
            </form>
        </div>
    </div>

@endsection