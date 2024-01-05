@extends('dashboard.layouts.main')

@section('main-body')

{{-- Notifikasi Berhasil --}}
@if (session()->has('berhasil'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {!! session('berhasil') !!}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="mt-5 mb-3">
    <a href="/dashboard/user/create">
        <button class="btn btn-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="white-icon" width="30" height="30" fill="currentColor"
                class="bi bi-plus" viewBox="0 0 16 16">
                <path
                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg>
            Tambah Data
        </button>
    </a>
</div>

<div class="overflow-x-scroll">
    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Email</th>
                <th scope="col">Nama</th>
                <th scope="col">Role</th>
                <th scope="col">Aktif</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($dataUser as $row)
            <tr>
                <th scope="row">{{ $row->id }}</th>
                <td>{{ $row->email }}</td>
                <td>{{ $row->nama }}</td>
                <td>{{ ($row->role == 1) ? 'Admin' : 'User' }}</td>
                <td>{{ ($row->aktif == 1) ? 'Aktif' : 'Tidak Aktif'}}</td>
                <td>
                    <a href="/dashboard/user/{{ $row->email }}/edit" class="badge text-bg-warning">
                        <svg class="bi">
                            <use xlink:href="#pencil-square" />
                        </svg>
                    </a>
                    <form action="/dashboard/user/{{ $row->email }}" method="post" class="d-inline">
                        {{-- mengubah method POST -> method DELETE --}}
                        @method('delete')
                        @csrf

                        <button type="submit" class="badge text-bg-danger ms-2 border-0"
                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                            <svg class="bi">
                                <use xlink:href="#trash" />
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center pt-5">
    {{ $dataUser->links() }}
</div>

@endsection