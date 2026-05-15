<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;
use App\Models\Order;

class RatingController extends Controller
{
    /**
     * TAMPILKAN LIST RATING (DRIVER)
     */
    public function index()
    {
        $ratings = Rating::with(['user', 'driver'])
            ->latest()
            ->get();

        $avgRating = Rating::avg('nilai');

        return view('driver.rating', compact('ratings', 'avgRating'));
    }

    /**
     * SIMPAN RATING DARI USER
     */
    public function store($id, Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:255',
        ]);

        $order = Order::findOrFail($id);

        // pastikan driver ada
        if (!$order->driver_id) {
            return back()->with('error', 'Driver belum tersedia untuk order ini');
        }

        Rating::create([
            'order_id' => $order->id,
            'driver_id' => $order->driver_id,
            'user_id'   => Auth::id(),
            'nilai'     => $request->rating,
            'komentar'  => $request->comment,
        ]);

        return redirect()->route('user.home')
            ->with('success', 'Rating berhasil dikirim');
    }

    /**
     * DETAIL 1 REVIEW (OPTIONAL TAPI RECOMMENDED)
     */
    public function show($id)
    {
        $rating = Rating::with(['user', 'driver'])
            ->findOrFail($id);

        return view('driver.review_detail', compact('rating'));
    }
}
