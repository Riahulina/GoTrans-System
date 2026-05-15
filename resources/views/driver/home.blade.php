@extends('driver.layout')

@section('content')
    <div class="container py-5">

        <!-- HEADER -->
        <div class="driver-header text-white p-4 mb-4">
            <h2>Halo Driver 👋</h2>
            <p class="mb-0">Anda sedang online dan menunggu pesanan masuk</p>
        </div>

        <div class="row g-4">

            <!-- STATUS -->
            <div class="col-md-8">
                <div class="card shadow border-0 rounded-4 p-4">
                    <h4>Status Driver</h4>

                    <div class="status-online mt-3">
                        <span class="dot"></span>
                        Online - Siap menerima order
                    </div>

                    <div class="waiting-box mt-4">
                        <h5>Menunggu Pesanan...</h5>

                        <p class="text-muted">
                            Sistem akan otomatis menampilkan order baru saat ada customer memesan.
                        </p>

                        <div class="service-icons mt-4">

                            <div class="service-item">
                                <img src="https://cdn-icons-png.flaticon.com/512/3774/3774278.png" width="65">
                            </div>

                            <div class="service-item">
                                <img src="https://cdn-icons-png.flaticon.com/512/2972/2972185.png" width="65">
                            </div>

                            <div class="service-item">
                                <img src="https://cdn-icons-png.flaticon.com/512/3082/3082031.png" width="65">
                            </div>

                        </div>
                    </div>


                    {{-- ORDER BARU --}}
                    @if ($orders->count())
                        <div class="mt-4">

                            <h4 class="mb-3">
                                Order Baru
                            </h4>

                            @foreach ($orders as $order)
                                <div class="card shadow-sm border-0 rounded-4 mb-3">

                                    <div class="card-body">

                                        <h5 class="fw-bold">
                                            {{ $order->user->name }}
                                        </h5>

                                        <p class="mb-1">
                                            📍 {{ $order->alamat_asal }}
                                        </p>

                                        <p class="mb-2">
                                            🏁 {{ $order->alamat_tujuan }}
                                        </p>

                                        <div
                                            class="d-flex
                        justify-content-between
                        align-items-center">

                                            <span class="fw-bold text-success">

                                                Rp{{ number_format($order->harga) }}

                                            </span>

                                            <a href="{{ route('driver.order.detail', $order->id) }}"
                                                class="btn btn-dark rounded-3">

                                                Lihat Detail

                                            </a>

                                        </div>

                                    </div>

                                </div>
                            @endforeach

                        </div>
                    @else
                        <div class="alert alert-light mt-4 border rounded-4">
                            Belum ada order baru
                        </div>
                    @endif
                </div>
            </div>

            <!-- SIDEBAR -->
            <div class="col-md-4">


                <div class="card shadow border-0 rounded-4 p-4">
                    <h5>Menu Cepat</h5>

                    <a href="{{ route('driver.history') }}" class="btn btn-dark w-100 mb-2">
                        Riwayat Perjalanan
                    </a>

                    <a href="{{ route('driver.offline') }}" class="btn btn-outline-danger w-100">
                        Offline
                    </a>
                </div>
            </div>

        </div>
    </div>

    <style>
        body {
            background: #f5f7fb;
        }

        .driver-header {
            background: linear-gradient(135deg, #1b263b, #415a77);
            border-radius: 20px;
        }

        .status-online {
            background: #e8fff1;
            color: #198754;
            padding: 15px 20px;
            border-radius: 12px;
            font-weight: 600;
            display: inline-block;
        }

        .dot {
            width: 10px;
            height: 10px;
            background: #198754;
            border-radius: 50%;
            display: inline-block;
            margin-right: 8px;
            animation: pulse 1.5s infinite;
        }

        .waiting-box {
            background: #f8f9fa;
            border-radius: 16px;
            padding: 30px;
            text-align: center;
        }

        .service-icons {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 25px;
            margin-top: 25px;
        }

        .service-item {
            background: white;
            width: 95px;
            height: 95px;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.08);
            transition: 0.3s ease;
        }

        .service-item:hover {
            transform: translateY(-8px);
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.4);
                opacity: 0.6;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
@endsection
