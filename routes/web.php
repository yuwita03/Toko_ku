<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserPanel;
use App\Http\Controllers\AdminUserController;

Route::redirect('/', '/dashboard');

// Login & Register
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

Route::get('/dashboard', [UserPanel::class, 'UserPanel'])->name('userpanel');

Route::middleware(['auth'])->group(function () {
    // Akun pengguna biasa
    Route::get('/akun/edit', [LoginController::class, 'edit'])->name('akun.edit');
    Route::post('/akun/update', [LoginController::class, 'update'])->name('akun.update');

    // Produk - admin & kasir
    Route::middleware(['role:0,1'])->prefix('admin')->name('admin.')->group(function () {
        Route::resource('products', ProductController::class);
        Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
        Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
    });

    // Transaksi - admin & kasir
    Route::middleware(['role:0,1'])->group(function () {
        Route::get('/admin/transaksi', [TransactionController::class, 'all'])->name('transactions.all');
    });

    // Keranjang & Checkout
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/transaksi', [TransactionController::class, 'index'])->name('transactions.index');
    Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');

    // Admin: Kelola semua user
    Route::middleware(['role:0'])->group(function () {
        Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
        Route::get('/admin/users/{id}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
        Route::post('/admin/users/{id}/edit', [AdminUserController::class, 'update'])->name('admin.users.update');
    });
});
