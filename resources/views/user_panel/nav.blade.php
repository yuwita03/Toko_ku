<!-- Navbar -->
{{--<header class="bg-black">
    <nav class="flex justify-between items-center mx-10 relative">
        <!-- Logo -->
        <div class="">
            <h1 class="text-white">
                <img src="https://th.bing.com/th/id/R.c36aa99f504a41fefa684b3a6b716c77?rik=F06ZbfQgwoL0FA&riu=http%3a%2f%2fsweetclipart.com%2fmultisite%2fsweetclipart%2ffiles%2fcat_black_white_line_art.png&ehk=BEwSksrClDEML3luKyITunhMmH9kVHTbyB1iJeWVrEc%3d&risl=&pid=ImgRaw&r=0h" alt="" class="h-[60px]">
            </h1>
        </div>

        <!-- Navigation Links -->
        <div class="nav-links duration-500 absolute md:left-1/2 md:top-0 md:transform md:-translate-x-1/2 md:min-h-fit md:w-auto w-full items-center justify-center px-5 z-10">
            <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8 m-4">
                <li>
                    <a href="#home" class="text-md font-bold text-white hover:text-orange-600 relative group">
                        Home
                        <span class="absolute bottom-0 left-0 w-full h-[0.1rem] bg-orange-600 scale-x-0 origin-center transition-transform duration-200 ease-linear group-hover:scale-x-100"></span>
                    </a>
                </li>
                <li>
                    <a href="#about" class="text-sm font-bold text-white hover:text-orange-600 relative group">
                        About Us
                        <span class="absolute bottom-0 left-0 w-full h-[0.1rem] bg-orange-600 scale-x-0 origin-center transition-transform duration-200 ease-linear group-hover:scale-x-100"></span>
                    </a>
                </li>
                <li>
                    <a href="#menu" class="text-sm font-bold text-white hover:text-orange-600 relative group">
                        Our Menu
                        <span class="absolute bottom-0 left-0 w-full h-[0.1rem] bg-orange-600 scale-x-0 origin-center transition-transform duration-200 ease-linear group-hover:scale-x-100"></span>
                    </a>
                </li>
                <li>
                    <a href="#footer" class="text-sm font-bold text-white hover:text-orange-600 relative group">
                        Contact
                        <span class="absolute bottom-0 left-0 w-full h-[0.1rem] bg-orange-600 scale-x-0 origin-center transition-transform duration-200 ease-linear group-hover:scale-x-100"></span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Auth Section -->
        <div class="flex items-center gap-6 z-10">
            <!-- Cart Dropdown -->
            @livewire('cart-button-dropdown')

            <!-- User Dropdown -->
            <div class="relative inline-block text-left">
                @auth
                    <!-- Button: User Info -->
                    <button onclick="toggleUserDropdown()" class="flex items-center space-x-2 hover:bg-gray-700 text-white px-4 py-2 rounded-lg focus:outline-none">
                        @if($fotoUrl)
                            <img src="{{ $fotoUrl }}" class="w-8 h-8 rounded-full border border-white object-cover" alt="Foto Profil">
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8 7a7 7 0 0 0 4.546-1.636c-.198-.977-.986-1.751-2.125-2.098C9.69 10.64 8.86 10.5 8 10.5s-1.69.14-2.421.766c-1.14.347-1.927 1.12-2.125 2.098A7 7 0 0 0 8 15z"/>
                            </svg>
                            <i class="bi bi-person-circle text-white fs-4"></i>
                        @endif
                        <span>Hi, {{ Auth::user()->nama }}</span>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown Content -->
                    <div id="userDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50">
                        <ul class="text-sm text-gray-700">
                            <li>
                                <a href="{{ route('akun.edit') }}" class="block px-4 py-2 hover:bg-gray-100">Edit Profile</a>
                            </li>
                            <li>
                                <a href="{{ route('transactions.index') }}" class="block px-4 py-2 hover:bg-gray-100">Riwayat Transaksi</a>
                            </li>
                            <li>
                                @php $role = (int) Auth::user()->role; @endphp
                                @if(in_array($role, [0, 1]))
                                    <a href="{{ route('admin.products.index') }}" class="block px-4 py-2 hover:bg-gray-100">Kelola Produk</a>
                                @endif
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100 text-red-500">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <!-- Login Button -->
                    <a href="{{ route('login') }}" class="bg-orange-500 px-4 py-2 rounded text-white hover:bg-orange-600">Login</a>
                @endauth
            </div>
        </div>
    </nav>
</header> --}}

<!-- Navbar -->
<header class="bg-black">
    <nav class="relative flex justify-between items-center mx-4 md:mx-10 py-4">
        <!-- Logo -->
        <div class="z-10">
            <h1 class="text-white  z-20">
                <img src="https://th.bing.com/th/id/R.c36aa99f504a41fefa684b3a6b716c77?rik=F06ZbfQgwoL0FA&riu=http%3a%2f%2fsweetclipart.com%2fmultisite%2fsweetclipart%2ffiles%2fcat_black_white_line_art.png&ehk=BEwSksrClDEML3luKyITunhMmH9kVHTbyB1iJeWVrEc%3d&risl=&pid=ImgRaw&r=0h" alt="" class="h-[60px]">
            </h1>
        </div>

        <!-- Hamburger Button (Mobile Only) -->
        <button id="hamburgerBtn" class="text-white md:hidden z-20" onclick="toggleMenu()">
            <!-- Icon Hamburger -->
            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        <!-- Navigation Links -->
        <div id="mobileMenu" class="nav-links hidden md:flex flex-col md:flex-row absolute md:static top-full left-0 w-full md:w-auto bg-black md:bg-transparent items-center justify-center px-5 z-10">
            <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-6 py-4 md:py-0 w-full md:w-auto">
                <li><a href="#home" class="text-md font-bold text-white hover:text-orange-600 relative group">Home
                    <span class="absolute bottom-0 left-0 w-full h-[0.1rem] bg-orange-600 scale-x-0 origin-center transition-transform duration-200 ease-linear group-hover:scale-x-100"></span>
                </a></li>
                <li><a href="#about" class="text-sm font-bold text-white hover:text-orange-600 relative group">About Us
                    <span class="absolute bottom-0 left-0 w-full h-[0.1rem] bg-orange-600 scale-x-0 origin-center transition-transform duration-200 ease-linear group-hover:scale-x-100"></span>
                </a></li>
                <li><a href="#menu" class="text-sm font-bold text-white hover:text-orange-600 relative group">Our Menu
                    <span class="absolute bottom-0 left-0 w-full h-[0.1rem] bg-orange-600 scale-x-0 origin-center transition-transform duration-200 ease-linear group-hover:scale-x-100"></span>
                </a></li>
                <li><a href="#footer" class="text-sm font-bold text-white hover:text-orange-600 relative group">Contact
                    <span class="absolute bottom-0 left-0 w-full h-[0.1rem] bg-orange-600 scale-x-0 origin-center transition-transform duration-200 ease-linear group-hover:scale-x-100"></span>
                </a></li>
            </ul>
        </div>

        <!-- Auth Section -->
        <div class="flex items-center gap-6 z-10">
            @livewire('cart-button-dropdown')

            <!-- User Dropdown -->
            <div class="relative inline-block text-left">
                @auth
                    <button onclick="toggleUserDropdown()" class="flex items-center space-x-2 hover:bg-gray-700 text-white px-4 py-2 rounded-lg focus:outline-none">
                        @if($fotoUrl)
                            <img src="{{ $fotoUrl }}" class="w-8 h-8 rounded-full border border-white object-cover" alt="Foto Profil">
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8 7a7 7 0 0 0 4.546-1.636c-.198-.977-.986-1.751-2.125-2.098C9.69 10.64 8.86 10.5 8 10.5s-1.69.14-2.421.766c-1.14.347-1.927 1.12-2.125 2.098A7 7 0 0 0 8 15z"/>
                            </svg>
                        @endif
                        <span>Hi, {{ Auth::user()->nama }}</span>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown content -->
                    <div id="userDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50">
                        <ul class="text-sm text-gray-700">
                            <li><a href="{{ route('akun.edit') }}" class="block px-4 py-2 hover:bg-gray-100">Edit Profile</a></li>
                            <li><a href="{{ route('transactions.index')}}" class="block px-4 py-2 hover:bg-gray-100">Riwayat Transaksi</a></li>
                            <li>
                                @php $role = (int) Auth::user()->role; @endphp
                                @if(in_array($role, [0, 1]))
                                    <a href="{{ route('admin.products.index') }}" class="block px-4 py-2 hover:bg-gray-100">Kelola Produk</a>
                                @endif
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100 text-red-500">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="bg-orange-500 px-4 py-2 rounded text-white hover:bg-orange-600">Login</a>
                @endauth
            </div>
        </div>
    </nav>
</header>

<!-- Script -->
<script>
    function toggleUserDropdown() {
        const dropdown = document.getElementById('userDropdown');
        dropdown.classList.toggle('hidden');
    }

    document.addEventListener('click', function(e) {
        const dropdown = document.getElementById('userDropdown');
        const button = document.querySelector('button[onclick="toggleUserDropdown()"]');
        if (!button.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.add('hidden');
        }
    });

    // Toggle Hamburger Menu
    function toggleMenu() {
        const menu = document.getElementById('mobileMenu');
        menu.classList.toggle('hidden');
    }
</script>


<!-- Bootstrap Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- User Dropdown Script -->
<script>
    function toggleUserDropdown() {
        const dropdown = document.getElementById('userDropdown');
        dropdown.classList.toggle('hidden');
    }

    document.addEventListener('click', function(e) {
        const dropdown = document.getElementById('userDropdown');
        const button = document.querySelector('button[onclick="toggleUserDropdown()"]');
        if (!button.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>
