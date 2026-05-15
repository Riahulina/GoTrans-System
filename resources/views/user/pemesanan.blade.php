@extends('user.layout')

@section('content')
    <div class="container-fluid p-0">

        <div class="row g-0" style="height:100vh;">

            <!-- MAP -->
            <div class="col-md-7">

                <div id="map" style="height:100vh;"></div>

            </div>

            <!-- PANEL -->
            <div class="col-md-5 p-4 bg-light overflow-auto">

                <h3 class="fw-bold mb-4">
                    🚗 Pesan Transportasi
                </h3>

                <!-- FORM -->
                <div class="card border-0 shadow rounded-4 p-4">

                    <!-- PICKUP -->
                    <div class="mb-3">

                        <label class="fw-semibold">
                            📍 Pickup
                        </label>

                        <input type="text" id="pickup" class="form-control" readonly
                            placeholder="Klik map untuk pilih pickup">

                    </div>

                    <!-- TUJUAN -->
                    <div class="mb-3">

                        <label class="fw-semibold">
                            🏁 Tujuan
                        </label>

                        <input type="text" id="destination" class="form-control" readonly
                            placeholder="Klik map untuk pilih tujuan">

                    </div>

                    <!-- KENDARAAN -->
                    <div class="mb-4">

                        <label class="fw-semibold">
                            🚘 Kendaraan
                        </label>

                        <select id="vehicle" class="form-select">

                            @foreach ($kendaraans as $kendaraan)
                                <option value="{{ $kendaraan->id }}" data-tarif="{{ $kendaraan->tarif_per_km }}">

                                    {{ $kendaraan->nama_kendaraan }}
                                    -
                                    Rp{{ number_format($kendaraan->tarif_per_km) }}/km

                                </option>
                            @endforeach

                        </select>

                    </div>

                    <button onclick="cariRute()" class="btn btn-dark w-100 rounded-3 py-3">

                        Cari Rute

                    </button>

                </div>

                <!-- RINGKASAN -->
                <div class="card border-0 shadow rounded-4 p-4 mt-4">

                    <h5 class="fw-bold mb-3">
                        Ringkasan Perjalanan
                    </h5>

                    <div class="mb-2">
                        🚘 Jarak:
                        <span id="jarak">-</span>
                    </div>

                    <div class="mb-2">
                        ⏱️ Estimasi:
                        <span id="durasi">-</span>
                    </div>

                    <div class="mb-4">
                        💰 Total:
                        <span id="harga">-</span>
                    </div>

                    <button onclick="pesan()" class="btn btn-success w-100 rounded-3 py-3">

                        Pesan Sekarang

                    </button>

                </div>

            </div>

        </div>

    </div>
@endsection


@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
@endpush


@push('scripts')
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        let map = L.map('map').setView(
            [3.5952, 98.6722],
            13
        );

        L.tileLayer(
            'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap'
            }
        ).addTo(map);

        let pickup = null;
        let destination = null;

        let pickupMarker = null;
        let destinationMarker = null;
        let routeLine = null;

        let totalHarga = 0;
        let totalKm = 0;

        const biayaDasar = 5000;

        // pilih lokasi
        map.on('click', function(e) {

            let lat = e.latlng.lat.toFixed(4);
            let lng = e.latlng.lng.toFixed(4);

            // pickup
            if (!pickup) {

                pickup = {
                    lat: e.latlng.lat,
                    lng: e.latlng.lng
                };

                document.getElementById('pickup').value =
                    `(${lat}, ${lng})`;

                pickupMarker = L.marker([
                    pickup.lat,
                    pickup.lng
                ]).addTo(map);

                return;
            }

            // tujuan
            if (!destination) {

                destination = {
                    lat: e.latlng.lat,
                    lng: e.latlng.lng
                };

                document.getElementById('destination').value =
                    `(${lat}, ${lng})`;

                destinationMarker = L.marker([
                    destination.lat,
                    destination.lng
                ]).addTo(map);

            }

        });

        // cari route
        async function cariRute() {

            if (!pickup || !destination) {

                alert('Lengkapi lokasi');

                return;
            }

            let url =
                `https://router.project-osrm.org/route/v1/driving/` +
                `${pickup.lng},${pickup.lat};` +
                `${destination.lng},${destination.lat}` +
                `?overview=full&geometries=geojson`;

            let res = await fetch(url);

            let data = await res.json();

            let route = data.routes[0];

            if (routeLine)
                map.removeLayer(routeLine);

            routeLine = L.geoJSON(
                route.geometry, {
                    style: {
                        color: '#000',
                        weight: 5
                    }
                }
            ).addTo(map);

            map.fitBounds(routeLine.getBounds());

            totalKm = (
                route.distance / 1000
            ).toFixed(1);

            let menit =
                Math.ceil(route.duration / 60);

            let vehicle =
                document.getElementById('vehicle');

            let tarif =
                vehicle.options[
                    vehicle.selectedIndex
                ].dataset.tarif;

            totalHarga =
                biayaDasar + (totalKm * tarif);

            document.getElementById('jarak')
                .innerText =
                totalKm + ' KM';

            document.getElementById('durasi')
                .innerText =
                menit + ' Menit';

            document.getElementById('harga')
                .innerText =
                'Rp ' +
                Math.round(totalHarga)
                .toLocaleString('id-ID');
        }


        // pesan
        async function pesan() {

            if (!pickup || !destination) {

                alert('Lengkapi data');

                return;
            }

            let vehicle =
                document.getElementById('vehicle');

            let kendaraanId = vehicle.value;

            try {

                let response = await fetch(
                    "{{ route('orders.store') }}", {
                        method: 'POST',

                        headers: {
                            'Content-Type': 'application/json',

                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },

                        body: JSON.stringify({

                            kendaraan_id: kendaraanId,

                            alamat_asal: document.getElementById('pickup').value,

                            alamat_tujuan: document.getElementById('destination').value,

                            pickup_lat: pickup.lat,
                            pickup_lng: pickup.lng,

                            tujuan_lat: destination.lat,
                            tujuan_lng: destination.lng,

                            jarak_km: totalKm,
                            harga: totalHarga
                        })
                    }
                );

                let result =
                    await response.json();

                window.location.href =
                    `/user/order/${result.order_id}`;

            } catch (error) {

                console.log(error);

                alert('Gagal membuat pesanan');
            }

        }
    </script>
@endpush
