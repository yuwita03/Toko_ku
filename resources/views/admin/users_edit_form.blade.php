@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Edit Akun</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $user->nama) }}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="hp" class="form-label">Nomor HP</label>
            <input type="text" name="hp" value="{{ old('hp', $user->hp) }}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea id="alamat" name="alamat" class="form-control" rows="2">{{ old('alamat', $user->alamat) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password Baru (opsional)</label>
            <input type="password" name="password" class="form-control">
        </div>


        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto Profil</label>
            <input type="file" name="foto" class="form-control" onchange="previewFoto()">
            <small class="form-text text-muted">Format: jpg, jpeg, png. Maksimal 2MB.</small>
        </div>

        <div class="mb-3">
            <label for="foto_url" class="form-label">Atau Gunakan URL Foto</label>
            <input type="url" name="foto_url" class="form-control" placeholder="https://example.com/foto.jpg" onchange="previewFotoURL()">
        </div>

        <div class="mb-3">
            <img id="preview"
                src="{{ $user->foto ? (filter_var($user->foto, FILTER_VALIDATE_URL) ? $user->foto : asset($user->foto)) : 'https://via.placeholder.com/100' }}"
                class="rounded-circle mt-3"
                width="100"
                height="100"
                alt="Foto Profil">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a class="btn btn-secondary" href="{{ route('admin.users.index') }}">Kembali</a>
    </form>
</div>
@endsection
