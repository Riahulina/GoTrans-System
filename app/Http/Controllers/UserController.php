<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function pesan()
    {
        $kendaraans = Kendaraan::where('status', 'aktif')->get();

        return view('user.pemesanan', compact('kendaraans'));
    }

    public function aktivitas()
    {
        $orders = Order::with('driver')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('user.aktivitas', compact('orders'));
    }
}
