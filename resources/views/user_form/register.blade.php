<!-- filepath: resources/views/register.blade.php -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container" style="max-width:400px;">
    <h3 class="mb-3">Register</h3>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required value="{{ old('nama') }}">
            @error('nama') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
            @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>No. HP</label>
            <input type="text" name="hp" class="form-control" value="{{ old('hp') }}">
            @error('hp') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" rows="2">{{ old('alamat') }}</textarea>
            @error('alamat') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>Foto Profil</label>
            <input type="file" name="foto" class="form-control">
            @error('foto') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
            @error('password') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control" required>
                <option value="">-- Pilih Role --</option>
                <option value="0" {{ old('role')=='1' ? 'selected' : '' }}>Admin</option>
                <option value="1" {{ old('role')=='0' ? 'selected' : '' }}>Super Admin</option>
                <option value="2" {{ old('role')=='2' ? 'selected' : '' }}>Customer</option>
            </select>
            @error('role') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        <button  type="submit" class="btn btn-success w-100" onclick="this.disabled=true; this.form.submit();">Register</button>

    <div class="mt-2 text-center">
        <a href="{{ route('login') }}">Sudah punya akun? Login</a>
    </div>


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const form = document.querySelector('form');
    form.addEventListener('submit', function () {
        form.querySelector('button[type="submit"]').disabled = true;
    });
</script>
