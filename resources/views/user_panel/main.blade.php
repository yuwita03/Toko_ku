<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com/3.3.0"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<!-- Tambahkan di <head> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="app.css" />
    <!-- TW Elements -->
     @livewireStyles
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/css/tw-elements.min.css" />
  </head>

  <body class="bg-black">
    <!-- Hamburger Menu Icon -->

    <!-- Navbar -->

<main class=" flex-col min-h-screen">
  @include('user_panel.nav')
  @include('user_panel.hero')
  @include('user_panel.display')
</main>
@include('user_panel.footer')







@livewireScripts


    <!-- TW Elements Script -->
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/js/tw-elements.umd.min.js"></script>

  </body>
</html>

<!-- Dropdown Cart Script -->
<script>
  feather.replace();

  function toggleDropdown() {
    const dropdown = document.getElementById('dropdownCart');
    dropdown.classList.toggle('hidden');
  }

  // Optional: Click outside to close dropdown
  document.addEventListener('click', function (e) {
    const button = document.querySelector('button[onclick="toggleDropdown()"]');
    const dropdown = document.getElementById('dropdownCart');
    if (!button.contains(e.target) && !dropdown.contains(e.target)) {
      dropdown.classList.add('hidden');
    }
  });
</script>

