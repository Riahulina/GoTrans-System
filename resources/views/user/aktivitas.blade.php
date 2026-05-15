@extends('user.layout')

@section('content')
    <div class="container py-4">

        <!-- HEADER -->
        <div class="mb-4 fade-up text-center">
            <h4 class="fw-bold">🚗 Aktivitas Perjalanan</h4>
            <p class="text-muted">Riwayat perjalanan yang telah kamu lakukan</p>
        </div>

        <div class="row g-4 justify-content-center">

            @forelse($orders as $order)
                <div class="col-md-6 fade-up">
                    <div class="service-card p-4 position-relative">

                        <!-- STATUS -->
                        @if ($order->status == 'selesai')
                            <span class="badge-custom bg-success">Selesai</span>
                        @elseif($order->status == 'cancel')
                            <span class="badge-custom bg-danger">Dibatalkan</span>
                        @else
                            <span class="badge-custom bg-warning text-dark">Proses</span>
                        @endif

                        <!-- CONTENT -->
                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <h5 class="fw-bold mb-1">
                                    {{ $order->pickup_location ?? '-' }} → {{ $order->destination ?? '-' }}
                                </h5>

                                <p class="text-muted small mb-2">
                                    {{ $order->created_at->format('d M Y') }}
                                </p>

                                <div class="price">
                                    Jarak: {{ $order->distance ?? '-' }} KM • Durasi: {{ $order->duration ?? '-' }} menit
                                </div>

                            </div>

                            <div class="icon-box">
                                🚗
                            </div>

                        </div>

                        <!-- FOOTER -->
                        <div class="mt-3 d-flex justify-content-between align-items-center">

                            <b class="text-primary">
                                Rp {{ number_format($order->price ?? 0, 0, ',', '.') }}
                            </b>

                            <a href="{{ route('orders.detail', $order->id) }}" class="btn btn-main btn-sm">
                                Detail
                            </a>

                        </div>

                    </div>
                </div>

            @empty

                <div class="text-center text-muted">
                    Belum ada aktivitas perjalanan
                </div>
            @endforelse

        </div>
    </div>

    <style>
        .service-card {
            border-radius: 20px;
            transition: 0.4s;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            background: white;
        }

        .service-card:hover {
            transform: translateY(-8px);
        }

        .icon-box {
            font-size: 30px;
            background: #e9ecef;
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-main {
            background: #1b263b;
            color: white;
            border-radius: 10px;
            border: none;
        }

        .btn-main:hover {
            background: #415a77;
            color: white;
        }

        .badge-custom {
            position: absolute;
            top: 15px;
            right: 15px;
            color: white;
            font-size: 12px;
            padding: 5px 10px;
            border-radius: 20px;
        }

        .price {
            font-size: 13px;
        }

        .fade-up {
            opacity: 0;
            transform: translateY(30px);
            transition: 0.6s;
        }

        .fade-up.show {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.fade-up');

            function showOnScroll() {
                elements.forEach((el, i) => {
                    const pos = el.getBoundingClientRect().top;
                    const screen = window.innerHeight;

                    if (pos < screen - 100) {
                        setTimeout(() => {
                            el.classList.add('show');
                        }, i * 100);
                    }
                });
            }

            showOnScroll();
            window.addEventListener('scroll', showOnScroll);
        });
    </script>
@endsection
