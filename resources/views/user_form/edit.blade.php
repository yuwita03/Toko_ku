
<div class="container" style="max-width:500px;">
    <h3 class="mb-3">Edit Profil</h3>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required value="{{ old('nama', $user->nama) }}">
            @error('nama') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email', $user->email) }}">
            @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>No. HP</label>
            <input type="text" name="hp" class="form-control" value="{{ old('hp', $user->hp) }}">
            @error('hp') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>Foto Profil</label><br>
            @if($user->foto)
                <img src="{{ asset($user->foto) }}" width="60" class="mb-2 d-block">
            @endif
            <input type="file" name="foto" class="form-control">
            @error('foto') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>Password Baru <small>(kosongkan jika tidak ingin ganti)</small></label>
            <input type="password" name="password" class="form-control">
            @error('password') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>
        <button class="btn btn-primary w-100">Simpan Perubahan</button>
    </form>
