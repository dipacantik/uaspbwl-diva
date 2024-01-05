@extends('dashboard.layouts.main')

@section('main-body')
{{-- <h1>Ini adalah halaman Dashboard!</h1> --}}

<div class="alert alert-success" role="alert">
    Selamat datang, {{ auth()->user()->nama }}!
</div>
<div class="overflow-x-scroll">
    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Kode</th>
                <th scope="col">Nama Golongan</th>
                <th scope="col">Action</th>
            </tr>
</div>
  
@endsection
