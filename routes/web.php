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
