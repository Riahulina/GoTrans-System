<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Order;


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| PUBLIC / LANDING
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => view('landing'))->name('home');


/*
|--------------------------------------------------------------------------
| AUTH CUSTOM
|--------------------------------------------------------------------------
*/

Route::get('/login', fn() => view('auth.login'))
    ->name('login');

Route::post('/login', function (Request $request) {

    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    // LOGIN
    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();

        // USER
        if (Auth::user()->role === 'user') {

            return redirect()->route('user.home');
        }

        // DRIVER
        if (Auth::user()->role === 'driver') {

            return redirect()->route('driver.home');
        }

        // ADMIN
        if (Auth::user()->role === 'admin') {

            return redirect()->route('admin.dashboard');
        }
    }

    return back()->withErrors([
        'email' => 'Email atau password salah',
    ]);
})->name('login.process');


Route::get('/register', fn() => view('auth.register'))
    ->name('register');

Route::post('/register', function (Request $request) {

    return redirect()->route('user.home');
})->name('register.process');


/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| USER ROUTES
|--------------------------------------------------------------------------
*/

Route::prefix('user')
    ->middleware(['auth', 'role:user'])
    ->group(function () {

        Route::get('/home', fn() => view('user.home'))
            ->name('user.home');

        Route::get('/layanan', fn() => view('user.layanan'))
            ->name('user.layanan');



        Route::get('/aktivitas', [UserController::class, 'aktivitas'])
            ->middleware(['auth', 'role:user'])
            ->name('user.aktivitas');

        Route::get('/pemesanan', [UserController::class, 'pesan'])
            ->name('user.pemesanan');

        Route::get('/search', fn() => view('user.search'))
            ->name('user.search');

        Route::get('/profil', fn() => view('user.profil'))
            ->name('user.profil');
    });


/*
|--------------------------------------------------------------------------
| DRIVER ROUTES
|--------------------------------------------------------------------------
*/

Route::prefix('driver')
    ->middleware(['auth', 'role:driver'])
    ->name('driver.')
    ->group(function () {

        Route::get(
            '/',
            [OrderController::class, 'driverHome']
        )->name('home');

        Route::get(
            '/order/{id}',
            [OrderController::class, 'detailOrder']
        )->name('order.detail');

        Route::get(
            '/offline',
            [OrderController::class, 'offline']
        )->name('offline');

        Route::get('/ontrip/{id}', function ($id) {

            $order = Order::with('user')->findOrFail($id);

            return view('driver.ontrip', compact('order'));
        })->name('ontrip');


        Route::get(
            '/history',
            [OrderController::class, 'history']
        )->name('history');

        Route::get(
            '/rating',
            fn() => view('driver.rating')
        )->name('rating');
    });

Route::get(
    '/driver/done/{id}',
    [OrderController::class, 'done']
);



/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {

        Route::get(
            '/',
            fn() => view('admin.dashboard')
        )->name('admin.dashboard');

        Route::get(
            '/dashboard',
            fn() => view('admin.dashboard')
        )->name('admin.dashboard');

        Route::get(
            '/driver',
            fn() => view('admin.driver')
        )->name('admin.driver');

        Route::get(
            '/user',
            fn() => view('admin.user')
        )->name('admin.user');

        Route::get(
            '/pembayaran',
            fn() => view('admin.pembayaran')
        )->name('admin.pembayaran');

        Route::get(
            '/rating-feedback',
            fn() => view('admin.rating_feedback')
        )->name('admin.rating_feedback');

        Route::get(
            '/pengaturan',
            fn() => view('admin.pengaturan')
        )->name('admin.pengaturan');

        Route::get(
            '/pesanan',
            fn() => view('admin.pesanan')
        )->name('admin.pesanan');
    });


/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');

    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| ORDER
|--------------------------------------------------------------------------
*/

Route::post(
    '/order',
    [OrderController::class, 'store']
)->middleware('auth')->name('orders.store');

Route::get(
    '/driver/orders',
    [OrderController::class, 'driverOrders']
)->middleware('auth');

Route::post(
    '/driver/order/{id}/accept',
    [OrderController::class, 'acceptOrder']
);

Route::post(
    '/driver/order/{id}/status',
    [OrderController::class, 'updateStatus']
)->name('driver.updateStatus');

Route::get(
    '/user/order/{id}',
    [OrderController::class, 'detailUserOrder']
)->name('orders.detail');



Route::get('/driver/profile', fn() => view('driver.profile'))
    ->name('driver.profile');


use App\Http\Controllers\RatingController;

Route::get('/driver/rating', [RatingController::class, 'index'])
    ->middleware(['auth', 'role:driver'])
    ->name('driver.rating');


// HALAMAN FORM RATING
Route::get('/user/rating/{id}', [RatingController::class, 'create'])
    ->middleware(['auth', 'role:user'])
    ->name('user.rating');


// SIMPAN RATING
Route::post('/user/rating/{id}', [RatingController::class, 'store'])
    ->middleware(['auth', 'role:user'])
    ->name('user.rating.store');


Route::get('/driver/review/{id}', [RatingController::class, 'show'])
    ->middleware(['auth', 'role:driver'])
    ->name('driver.review.detail');
/*
|--------------------------------------------------------------------------
| REMOVE BREEZE AUTH
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
