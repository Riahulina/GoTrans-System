<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Landing & Public
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('landing');
});

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

Route::prefix('user')->group(function () {

    Route::get('/home', fn() => view('user.home'))->name('user.home');

    Route::get('/pemesanan', fn() => view('user.pemesanan'))->name('pemesanan');

    Route::get('/aktivitas', fn() => view('user.aktivitas'))->name('aktivitas');

    Route::get('/layanan', fn() => view('user.layanan'))->name('layanan');

    Route::get('/profil', fn() => view('user.profil'))->name('user.profil');
});

/*
|--------------------------------------------------------------------------
| Driver Routes
|--------------------------------------------------------------------------
*/

Route::prefix('driver')->group(function () {

    Route::get('/', fn() => view('driver'))->name('driver.home');

    Route::get('/offline', fn() => view('driver_offline'))->name('driver.offline');

    Route::get('/ontrip', fn() => view('driver_ontrip'))->name('driver.ontrip');

    Route::get('/done', fn() => view('driver_done'))->name('driver.done');

    Route::get('/rating', fn() => view('driver_rating'))->name('driver.rating');

    Route::get('/history', fn() => view('driver_history'))->name('driver.history');

    Route::get('/review-detail', fn() => view('driver_review_detail'));
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {

    Route::get('/', fn() => view('admin.dashboard'));

    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');

    Route::get('/driver', fn() => view('admin.driver'))->name('admin.driver');

    Route::get('/user', fn() => view('admin.user'))->name('admin.user');

    Route::get('/pembayaran', fn() => view('admin.pembayaran'))->name('admin.pembayaran');

    Route::get('/rating-feedback', fn() => view('admin.rating_feedback'))->name('admin.rating_feedback');

    Route::get('/pengaturan', fn() => view('admin.pengaturan'))->name('admin.pengaturan');

    Route::get('/pesanan', fn() => view('admin.pesanan'))->name('admin.pesanan');
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';