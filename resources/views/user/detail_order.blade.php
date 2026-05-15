@extends('user.layout')

@section('content')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <div class="container py-4">

        <div class="row">

            <!-- MAP -->
            <div class="col-md-7 mb-4">

                <div id="map"
                    style="
                    height:75vh;
                    border-radius:24px;
                    overflow:hidden;
                "
                    class="shadow">
                </div>

            </div>

            <!-- PANEL -->
            <div class="col-md-5">

                <!-- STATUS -->
                <div class="card border-0 shadow rounded-4 p-4 mb-4">

                    <h4 class="fw-bold mb-3">
                        Status Pesanan
                    </h4>

                    @if ($order->status == 'pending')
                        <div class="alert alert-warning rounded-4">
                            🔍 Sedang mencari driver
                        </div>
                    @elseif($order->status == 'accepted')
                        <div class="alert alert-info rounded-4">
                            🚗 Driver menuju lokasi anda
                        </div>
                    @elseif($order->status == 'menuju_pickup')
                        <div class="alert alert-primary rounded-4">
                            📍 Driver sedang menuju pickup
                        </div>
                    @elseif($order->status == 'sampai_pickup')
                        <div class="alert alert-success rounded-4">
                            ✅ Driver sudah sampai di lokasi anda
                        </div>
                    @elseif($order->status == 'ontrip')
                        <div class="alert alert-dark rounded-4">
                            🛣️ Dalam perjalanan
                        </div>
                    @elseif($order->status == 'completed')
                        <div class="alert alert-success rounded-4">
                            🎉 Perjalanan selesai
                        </div>
                    @endif

                </div>

                <!-- DRIVER -->
                <div class="card border-0 shadow rounded-4 p-4 mb-4">

                    <h4 class="fw-bold mb-4">
                        Informasi Driver
                    </h4>

                    @if ($order->driver)
                        <div class="d-flex align-items-center gap-3">

                            <!-- FOTO / INISIAL -->
                            <div class="rounded-circle bg-dark text-white
                            d-flex align-items-center justify-content-center fw-bold"
                                style="width:75px;height:75px;font-size:30px;">

                                {{ strtoupper(substr($order->driver->user->nama, 0, 1)) }}

                            </div>

                            <!-- INFO -->
                            <div>

                                <h5 class="fw-bold mb-1">
                                    {{ $order->driver->user->nama }}
                                </h5>

                                <p class="mb-1 text-muted">
                                    Driver
                                </p>

                                <p class="mb-1">
                                    📞 {{ $order->driver->user->phone ?? '08123456789' }}
                                </p>

                                <p class="text-warning mb-0">
                                    ⭐ 4.9
                                </p>

                            </div>

                        </div>
                    @else
                        <div class="text-muted">
                            Belum ada driver menerima pesanan
                        </div>
                    @endif

                </div>

                <!-- DETAIL -->
                <div class="card border-0 shadow rounded-4 p-4">

                    <h4 class="fw-bold mb-3">
                        Detail Perjalanan
                    </h4>

                    <p>
                        📍 Pickup:
                        <br>
                        {{ $order->alamat_asal }}
                    </p>

                    <p>
                        🏁 Tujuan:
                        <br>
                        {{ $order->alamat_tujuan }}
                    </p>

                    <p>
                        📏 Jarak:
                        {{ $order->jarak_km }} KM
                    </p>

                    <p>
                        💰 Total:
                        Rp{{ number_format($order->harga) }}
                    </p>

                </div>

                @if ($order->status == 'completed')
                    <a href="{{ route('user.rating', $order->id) }}" class="btn btn-warning w-100 mt-3 rounded-4 fw-bold">
                        ⭐ Rate Driver
                    </a>
                @endif

            </div>

        </div>

    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        let pickup = [
            {{ $order->pickup_lat }},
            {{ $order->pickup_lng }}
        ];

        let tujuan = [
            {{ $order->tujuan_lat }},
            {{ $order->tujuan_lng }}
        ];

        let map = L.map('map');

        L.tileLayer(
            'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap'
            }
        ).addTo(map);

        // marker pickup
        L.marker(pickup)
            .addTo(map)
            .bindPopup('Pickup');

        // marker tujuan
        L.marker(tujuan)
            .addTo(map)
            .bindPopup('Tujuan');

        fetch(
                `https://router.project-osrm.org/route/v1/driving/` +
                `${pickup[1]},${pickup[0]};` +
                `${tujuan[1]},${tujuan[0]}` +
                `?overview=full&geometries=geojson`
            )
            .then(res => res.json())
            .then(data => {

                if (!data.routes.length) {
                    alert('Route tidak ditemukan');
                    return;
                }

                let route = data.routes[0];

                let routeLine = L.geoJSON(
                    route.geometry, {
                        style: {
                            color: '#000',
                            weight: 5
                        }
                    }
                ).addTo(map);

                map.fitBounds(
                    routeLine.getBounds()
                );

            })
            .catch(err => {

                console.log(err);

            });

        setInterval(() => {

            location.reload();

        }, 5000);
    </script>
@endsection
