<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/login', function (Request $request) {
    return redirect()->route('user.home');
})->name('login.process');

Route::post('/register', function (Request $request) {
    return redirect()->route('user.home');
})->name('register.process');

Route::get('/user/home', fn() => view('user.home'))->name('user.home');

Route::get('/user/layanan', fn() => view('user.layanan'))->name('layanan');

Route::get('/user/pemesanan', fn() => view('user.pemesanan'))->name('pemesanan');

Route::get('/user/search', fn() => view('user.search'))->name('search');

Route::get('/user/profil', fn() => view('user.profil'))->name('profil');

Route::get('/user/aktivitas', fn() => view('user.aktivitas'))->name('aktivitas');

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::get('/admin/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');

Route::get('/admin/driver', fn() => view('admin.driver'))->name('admin.driver');

Route::get('/admin/user', fn() => view('admin.user'))->name('admin.user');

Route::get('/admin/pembayaran', fn() => view('admin.pembayaran'))->name('admin.pembayaran');

Route::get('/admin/rating_feedback', fn() => view('admin.rating_feedback'))->name('admin.rating_feedback');

Route::get('/admin/pengaturan', fn() => view('admin.pengaturan'))->name('admin.pengaturan');

Route::get('/admin/pesanan', fn() => view('admin.pesanan'))->name('admin.pesanan');
