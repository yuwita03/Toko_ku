// User Dropdown
function toggleUserDropdown() {
    const dropdown = document.getElementById("userDropdown");
    dropdown.classList.toggle("hidden");
}

// Klik luar area dropdown
document.addEventListener("click", function (e) {
    const dropdown = document.getElementById("userDropdown");
    const button = document.querySelector(
        'button[onclick="toggleUserDropdown()"]'
    );
    if (!button.contains(e.target) && !dropdown.contains(e.target)) {
        dropdown.classList.add("hidden");
    }
});

// Cart Dropdown
feather.replace();

function toggleDropdown() {
    const dropdown = document.getElementById("dropdownCart");
    dropdown.classList.toggle("hidden");
}

// Optional: Click outside to close dropdown
document.addEventListener("click", function (e) {
    const button = document.querySelector('button[onclick="toggleDropdown()"]');
    const dropdown = document.getElementById("dropdownCart");
    if (!button.contains(e.target) && !dropdown.contains(e.target)) {
        dropdown.classList.add("hidden");
    }
});
