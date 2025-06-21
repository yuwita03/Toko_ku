<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserPanel;

// Route login & register (tanpa auth)
Route::redirect('/', '/dashboard');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
Route::post('/main', [RegisterController::class, 'register'])->name('register.post');
Route::get('/dashboard', [UserPanel::class, 'UserPanel'])->name('userpanel');
// Group semua route yang harus login
Route::middleware(['auth'])->group(function () {

    Route::get('/akun/edit', [LoginController::class, 'edit'])->name('akun.edit');
    Route::post('/akun/update', [LoginController::class, 'update'])->name('akun.update');


    // Produk
    Route::middleware(['role:0,1'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
        Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::resource('products', ProductController::class);
    });
    // hanya admin (0) dan kasir (1) yang bisa akses ini
    Route::middleware(['auth', 'role:0,1'])->group(function () {
        Route::get('/admin/transaksi', [TransactionController::class, 'all'])->name('transactions.all');
    });


    // Keranjang
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

    // Checkout & transaksi
    Route::get('/transaksi', [TransactionController::class, 'index'])->name('transactions.index');
    Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');


});
