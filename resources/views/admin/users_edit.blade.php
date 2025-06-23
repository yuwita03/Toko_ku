@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Daftar Pengguna</h4>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <table id="zero_config" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>HP</th>
                <th>Role</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->hp }}</td>
                <td>
                    <span class="badge bg-info text-dark">
                        {{ $user->role == 0 ? 'SuperAdmin' : ($user->role == 1 ? 'Admin' : ($user->role == 2 ? 'User' : 'Tidak Diketahui')) }}

                    </span>
                </td>
                <td>
                    @if($user->status == 1)
                        <span class="badge bg-success">Aktif</span>
                    @else
                        <span class="badge bg-secondary">Tidak Aktif</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin hapus produk?')">
                        @csrf
                        <button class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
