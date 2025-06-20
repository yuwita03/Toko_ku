    <!-- Navbar -->
    <header class="bg-black">
      <nav class="flex justify-between items-center mx-10 ">
        <!-- Logo -->
        <div class="z-10">
          <h1 class="text-white">
            <img src="../img/Napo.png" alt="" class="h-[60px]">
          </h1>
        </div>

        <!-- Navigation Links -->
       <div class="nav-links bg-black duration-500 md:absolute md:left-1/2 md:top-0 md:transform md:-translate-x-1/2 md:min-h-fit md:w-auto w-full flex items-center justify-center px-5 z-10">

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
            <li>

            </li>
          </ul>
        </div>


        <!-- Auth Section -->
        <div class="flex items-center gap-6 z-10">

        <!-- Cart Dropdown -->
        @include('user_panel.components.cart')

    <div class="relative inline-block text-left">
        <button onclick="toggleUserDropdown()" class="flex items-center space-x-2 hover:bg-gray-700 text-white px-4 py-2 rounded-lg focus:outline-none">
                @auth
                <i data-feather="user" class="w-5 h-5"></i>
                <span>Hi, {{ Auth::user()->name }}</span>
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <!-- Dropdown content -->
            <div id="userDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50">
                <ul class="text-sm text-gray-700">
                <li>
                    <a href="" class="block px-4 py-2 hover:bg-gray-100">Edit Profile</a>
                </li>
                <li>
                    <a href="" class="block px-4 py-2 hover:bg-gray-100">Riwayat Transaksi</a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100 text-red-500">Logout</button>
                    </form>
                </li>
                </ul>
            </div>
            </div>

        @endauth

        </div>
      </nav>
    </header>
<script>
  function toggleUserDropdown() {
    const dropdown = document.getElementById('userDropdown');
    dropdown.classList.toggle('hidden');
  }

  // Klik luar area dropdown
  document.addEventListener('click', function(e) {
    const dropdown = document.getElementById('userDropdown');
    const button = document.querySelector('button[onclick="toggleUserDropdown()"]');
    if (!button.contains(e.target) && !dropdown.contains(e.target)) {
      dropdown.classList.add('hidden');
    }
  });
</script>
