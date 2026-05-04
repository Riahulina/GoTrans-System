<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/user/home', function () {
    return view('user.home');
})->name('user.home');

Route::get('/pemesanan', function () {
    return view('user.pemesanan');
})->name('pemesanan');
Route::get('/aktivitas', function () {
    return view('user.aktivitas');
})->name('aktivitas');

Route::get('/layanan', function () {
    return view('user.layanan');
})->name('layanan');

Route::get('/user/profil', function () {
    return view('user.profil');
})->name('user.profil');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
