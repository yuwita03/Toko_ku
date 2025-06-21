# Laravel Livewire E-Commerce App

Aplikasi E-Commerce sederhana berbasis Laravel 10 dan Livewire.

## Fitur

* Autentikasi pengguna (Login & Register)
* Pengelolaan produk (admin)
* Keranjang belanja menggunakan Livewire
* Proses checkout dan riwayat transaksi

## Requirements

* PHP >= 8.1
* Composer
* Node.js & NPM
* MySQL/MariaDB
* Laravel 10
* Livewire

## Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/username/nama-project.git
cd nama-project
```

### 2. Install Dependency PHP

```bash
composer install
```

### 3. Install Dependency Frontend

```bash
npm install
npm run dev
```

### 4. Copy File .env

```bash
cp .env.example .env
```

### 5. Generate Key

```bash
php artisan key:generate
```

### 6. Setup Database

Edit file `.env` dan ubah konfigurasi database:

```env
DB_DATABASE=namadb
DB_USERNAME=root
DB_PASSWORD=
```

### 7. Migrasi dan Seed

```bash
php artisan migrate --seed
```

### 8. Jalankan Server

```bash
php artisan serve
```

## Akun Demo (Opsional)

**Admin**
Email: [admin@example.com](mailto:admin@example.com)
Password: password

**User**
Email: [user@example.com](mailto:user@example.com)
Password: password

## Lisensi

MIT License
