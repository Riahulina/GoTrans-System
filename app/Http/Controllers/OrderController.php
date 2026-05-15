<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // =========================
    // USER BUAT ORDER
    // =========================
    public function store(Request $request)
    {
        $driver = Driver::where('status', 'online')
            ->where('is_active', true)
            ->first();

        $order = Order::create([

            'user_id' => Auth::id(),

            'driver_id' => $driver
                ? $driver->id
                : null,

            'kendaraan_id' => $request->kendaraan_id,

            'alamat_asal' => $request->alamat_asal,
            'alamat_tujuan' => $request->alamat_tujuan,

            'pickup_lat' => $request->pickup_lat,
            'pickup_lng' => $request->pickup_lng,

            'tujuan_lat' => $request->tujuan_lat,
            'tujuan_lng' => $request->tujuan_lng,

            'jarak_km' => $request->jarak_km,
            'harga' => $request->harga,

            'status' => $driver
                ? 'accepted'
                : 'pending',
        ]);

        return response()->json([
            'success' => true,
            'order_id' => $order->id
        ]);
    }


    // =========================
    // HOME DRIVER
    // =========================
    public function driverHome()
    {
        $orders = Order::with(
            'user',
            'kendaraan'
        )
            ->where('status', 'pending')
            ->latest()
            ->get();

        return view(
            'driver.home',
            compact('orders')
        );
    }


    // =========================
    // DETAIL ORDER DRIVER
    // =========================
    public function detailOrder($id)
    {
        $order = Order::with(
            'user',
            'kendaraan'
        )
            ->findOrFail($id);

        return view(
            'driver.detail_order',
            compact('order')
        );
    }


    // =========================
    // DETAIL ORDER USER
    // =========================
    public function detailUserOrder($id)
    {
        $order = Order::with([
            'driver.user',
            'kendaraan'
        ])->findOrFail($id);

        return view(
            'user.detail_order',
            compact('order')
        );
    }


    // =========================
    // LIST ORDER DRIVER
    // =========================
    public function driverOrders()
    {
        $driver = Auth::user()->driver;

        $orders = Order::where(
            'driver_id',
            $driver->id
        )
            ->latest()
            ->get();

        return view(
            'driver.orders',
            compact('orders')
        );
    }


    // =========================
    // ACCEPT ORDER
    // =========================
    public function acceptOrder(int $id)
    {
        $order = Order::findOrFail($id);

        $driver = Auth::user()->driver;

        $order->update([
            'driver_id' => $driver->id,
            'status' => 'accepted'
        ]);

        $driver->update([
            'status' => 'busy'
        ]);

        return redirect()->route(
            'driver.ontrip',
            $order->id
        );
    }


    // =========================
    // UPDATE STATUS ORDER
    // =========================
    public function updateStatus(
        Request $request,
        int $id
    ) {

        try {

            $order = Order::findOrFail($id);

            $order->update([
                'status' => $request->status
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Status berhasil diupdate'
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
        return back();
    }

    public function done($id)
    {
        $order = Order::findOrFail($id);

        $order->update([
            'status' => 'completed'
        ]);

        return view(
            'driver.done',
            compact('order')
        );
    }

    public function history()
    {
        $driver = Auth::user()->driver;

        $orders = Order::with('user')
            ->where('driver_id', $driver->id)
            ->where('status', 'completed')
            ->latest()
            ->get();

        return view(
            'driver.history',
            compact('orders')
        );
    }
    public function offline()
    {
        $driver = Auth::user()->driver;

        $orders = Order::where('driver_id', $driver->id)
            ->where('status', 'completed')
            ->get();

        $totalOrders = $orders->count();

        $totalIncome = $orders->sum('harga');

        return view(
            'driver.offline',
            compact(
                'totalOrders',
                'totalIncome'
            )
        );
    }
}
