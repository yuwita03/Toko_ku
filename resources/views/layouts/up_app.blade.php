<!-- ...existing code... -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Toko Kocheng</a>
        <div class="ms-auto">
            @auth

            <div class="dropdown">
                <button class="btn btn-dark dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    @if(auth()->user()?->foto)
                        <img src="{{ filter_var(auth()->user()->foto, FILTER_VALIDATE_URL) ? auth()->user()->foto : asset(auth()->user()->foto) }}"
                            class="rounded-circle border border-white"
                            width="32"
                            height="32"
                            alt="Foto Profil">
                    @else
                        <i class="bi bi-person-circle text-white fs-4"></i>
                    @endif
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ route('userpanel') }}"><i class="bi bi-pencil-square me-2"></i>Dashboard</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('akun.edit') }}"><i class="bi bi-pencil-square me-2"></i>Edit Profil</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="bi bi-box-arrow-right me-2"></i>Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
            @endauth
        </div>
    </div>
</nav>
<!-- ...existing code... -->

<!-- Tambahkan Bootstrap Icons jika belum -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
