<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

// Publik router
Route::get('/', [PageController::class, 'index'])->name('beranda');
Route::get('/pesanan', [PageController::class, 'pesanan'])->name('pesanan');
Route::get('/kupon', [PageController::class, 'promo'])->name('kupon');
Route::get('/lupa-password', [PageController::class, 'lupaPassword'])->name('resetpw');
Route::post('/lupa-password', [PageController::class, 'lupaPassword'])->name('post.resetPw');
Route::get('/new-password', [PageController::class, 'newPassword'])->name('newpw');
Route::post('/new-password', [PageController::class, 'newPassword'])->name('post.newpw');
Route::get('/hubungi-kami', [PageController::class, 'hubungiKami'])->name('cs');
Route::post('/hubungi-kami', [PageController::class, 'hubungiKami'])->name('post.cs');
Route::get('/tentang', [PageController::class, 'tentang'])->name('tentang');
Route::get('/produk/{page?}/{slug?}', [PageController::class, 'product'])->name('detail-product');
Route::get('/data-produk', [ProductController::class, 'product']);
Route::post('/pembelian', [PageController::class, 'buy'])->name('buy');

// User router
Route::middleware('guest')->group(function () {
    Route::post('/registrasi', [UserController::class, 'register'])->name('post.register');
    Route::get('/registrasi', [PageController::class, 'registrasi'])->name('register');
    Route::post('/login', [UserController::class, 'login'])->name('post.login');
    Route::get('/login', [PageController::class, 'login'])->name('login');
});

Route::get('/user/profil', [UserController::class, 'profil'])->name('profile');
Route::post('/user/update-profil', [UserController::class, 'updateProfil'])->name('update-profil');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/user/deposit', [UserController::class, 'deposit'])->name('deposit');
Route::get('/user/history', [UserController::class, 'history'])->name('history');
Route::get('/user/saldo', [UserController::class, 'saldo'])->name('saldo');
