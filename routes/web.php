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

Route::prefix('driver')->group(function () {
    Route::get('/ontrip', fn() => view('driver_ontrip'))->name('driver.ontrip');
});

Route::prefix('driver')->group(function () {

    // MODE OFFLINE
    Route::get('/offline', fn() => view('driver_offline'))->name('driver.offline');

    // PENUMPANG DITEMUKAN
    Route::get('/', fn() => view('driver'))->name('driver.home');

    // DALAM PERJALANAN
    Route::get('/ontrip', fn() => view('driver_ontrip'))->name('driver.ontrip');

    // SELESAI
    Route::get('/done', fn() => view('driver_done'))->name('driver.done');

    // RATING
    Route::get('/rating', fn() => view('driver_rating'))->name('driver.rating');

    // RIWAYAT
    Route::get('/history', fn() => view('driver_history'))->name('driver.history');
});

require __DIR__ . '/auth.php';
