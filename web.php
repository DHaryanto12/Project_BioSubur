<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// =======================================================
// RUTINISASI AUTENTIKASI BAWAAN LARAVEL UNTUK USER BIASA
// Menonaktifkan rute login default agar tidak bentrok dengan login admin
// Pertahankan register, reset, verify jika Anda ingin fitur ini untuk user biasa
// Jika tidak ingin fitur ini sama sekali, Anda bisa menghapus 'register', 'reset', 'verify'
// Atau hapus saja Auth::routes() dan definisikan route user biasa secara manual
// =======================================================
Auth::routes(['login' => false]); // HANYA SATU INI, dan nonaktifkan login!

// --- Route Umum / Publik ---
Route::get('/', [HomeController::class, 'index'])->name('home'); // Beranda utama aplikasi Anda

// Route PUBLIK untuk Produk
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Route PUBLIK untuk Gallery, Contact, About, dan News (hanya index)
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');


// =====================================================================
// Route KHUSUS & Terpisah untuk Admin Login
// =====================================================================
Route::get('/admin-login-panel', [AdminLoginController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin-login-panel', [AdminLoginController::class, 'login'])->name('admin.login');


// =====================================================================
// Route untuk Fungsionalitas User yang Terautentikasi (Contoh: Transaksi)
// Grup ini dilindungi oleh middleware 'auth' (untuk user biasa)
// =====================================================================
Route::middleware(['auth'])->group(function () {
    // Lebih baik gunakan 'transactions' untuk URL dan {transaction} untuk Route Model Binding
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/transactions/{transaction}', [TransactionController::class, 'show'])->name('transactions.show');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
});


// =====================================================================
// Route untuk Fungsionalitas Admin Lainnya (Setelah Login Admin)
// Group ini dilindungi oleh middleware 'auth:admin'
// =====================================================================
Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {

    // >>> PENAMBAHAN ROUTE UNTUK DASHBOARD ADMIN <<<
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); // Ganti dengan nama view dashboard admin Anda (misal: resources/views/admin/dashboard.blade.php)
    })->name('dashboard');

    // Route untuk Logout Admin (diakses setelah login admin)
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

    // Route ADMIN untuk Mengelola Produk
    Route::get('/products', [ProductController::class, 'indexAdmin'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    // Jika show untuk admin berbeda, gunakan method yang berbeda (misal showAdmin)
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');


    // Route ADMIN untuk Mengelola Gallery, Contact, About, dan News
    Route::get('/gallery', [GalleryController::class, 'indexAdmin'])->name('gallery.index');
    Route::get('/contact', [ContactController::class, 'indexAdmin'])->name('contact.index');
    Route::get('/about', [AboutController::class, 'indexAdmin'])->name('about.index');
    Route::get('/news', [NewsController::class, 'indexAdmin'])->name('news.index');
});
