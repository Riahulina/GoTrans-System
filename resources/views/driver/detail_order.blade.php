<x-app-layout>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <div class="min-h-screen bg-[#050B18] text-white">

        <!-- CONTENT -->
        <div class="max-w-md mx-auto px-5 py-6">

            <!-- TITLE -->
            <div class="mb-6">

                <h1 class="text-4xl font-extrabold tracking-wide">
                    Pesanan Baru
                </h1>

                <p class="text-gray-400 mt-2 text-sm">
                    Driver terdekat menemukan penumpang
                </p>

            </div>

            <!-- MAP -->
            <div id="map"
                style="
                    height:320px;
                    width:100%;
                    border-radius:32px;
                    overflow:hidden;
                "
                class="border border-white/10 shadow-2xl">
            </div>

            <!-- LOCATION -->
            <div class="mt-8 space-y-6">

                <!-- PENJEMPUTAN -->
                <div class="flex gap-4">

                    <div class="flex flex-col items-center">

                        <div
                            class="w-5 h-5 rounded-full
                            bg-green-400
                            shadow-lg shadow-green-500/50">
                        </div>

                        <div
                            class="w-[3px] h-20
                            bg-white/30
                            border-l border-dashed
                            border-white/50 mt-2">
                        </div>

                    </div>

                    <div>

                        <p class="text-2xl font-bold">
                            Penjemputan
                        </p>

                        <p class="text-gray-300 text-lg mt-1">
                            {{ $order->alamat_asal }}
                        </p>

                    </div>

                </div>

                <!-- TUJUAN -->
                <div class="flex gap-4">

                    <div
                        class="w-5 h-5 rounded-full
                        bg-red-500
                        shadow-lg shadow-red-500/50 mt-1">
                    </div>

                    <div>

                        <p class="text-2xl font-bold">
                            Tujuan
                        </p>

                        <p class="text-gray-300 text-lg mt-1">
                            {{ $order->alamat_tujuan }}
                        </p>

                    </div>

                </div>

            </div>

            <!-- PASSENGER CARD -->
            <div
                class="mt-8 bg-white/5
                border border-white/10
                rounded-[28px]
                p-5 backdrop-blur-xl shadow-xl">

                <div class="flex items-center justify-between">

                    <!-- KIRI -->
                    <div class="flex items-center gap-4">

                        <!-- AVATAR -->
                        <div class="relative">

                            <div
                                class="w-16 h-16 rounded-full
                                bg-gradient-to-br
                                from-pink-500 to-purple-600
                                flex items-center justify-center
                                text-2xl font-bold shadow-lg">

                                {{ strtoupper(substr($order->user->name, 0, 1)) }}

                            </div>

                            <div
                                class="absolute bottom-0 right-0
                                w-4 h-4 bg-green-400
                                border-2 border-[#050B18]
                                rounded-full">
                            </div>

                        </div>

                        <!-- NAMA -->
                        <div>

                            <h2 class="text-xl font-bold">
                                {{ $order->user->name }}
                            </h2>

                            <p class="text-yellow-300 mt-1">
                                ⭐ 4.9
                            </p>

                        </div>

                    </div>

                    <!-- BUTTON CALL -->
                    <button
                        class="w-14 h-14 rounded-2xl
                        bg-green-500/20
                        border border-green-400/30
                        flex items-center justify-center
                        text-2xl active:scale-95 transition">

                        📞

                    </button>

                </div>

                <!-- CATATAN -->
                <div
                    class="mt-5 bg-white/5
                    rounded-2xl p-4
                    border border-white/5">

                    <p class="text-gray-400 text-sm mb-2">
                        Catatan Penumpang
                    </p>

                    <p class="text-white leading-relaxed">
                        Tidak ada catatan
                    </p>

                </div>

            </div>

            <!-- INFO -->
            <div class="grid grid-cols-3 gap-4 mt-7">

                <!-- TARIF -->
                <div
                    class="bg-white/5
                    border border-white/10
                    rounded-3xl p-4
                    text-center backdrop-blur-md">

                    <p class="text-gray-400 text-sm">
                        Tarif
                    </p>

                    <h3 class="text-2xl font-bold mt-2">
                        Rp{{ number_format($order->harga) }}
                    </h3>

                </div>

                <!-- JARAK -->
                <div
                    class="bg-white/5
                    border border-white/10
                    rounded-3xl p-4
                    text-center backdrop-blur-md">

                    <p class="text-gray-400 text-sm">
                        Jarak
                    </p>

                    <h3 class="text-2xl font-bold mt-2">
                        {{ $order->jarak_km }} KM
                    </h3>

                </div>

                <!-- WAKTU -->
                <div
                    class="bg-white/5
                    border border-white/10
                    rounded-3xl p-4
                    text-center backdrop-blur-md">

                    <p class="text-gray-400 text-sm">
                        Waktu
                    </p>

                    <h3 class="text-2xl font-bold mt-2">
                        {{ round($order->jarak_km * 3) }} Min
                    </h3>

                </div>

            </div>

            <!-- BUTTON -->
            <div class="grid grid-cols-2 gap-4 mt-8 pb-10">

                <!-- TOLAK -->
                <form method="POST" action="/driver/order/{{ $order->id }}/cancelled">

                    @csrf

                    <button
                        class="h-16 w-full rounded-3xl
                        bg-red-600 font-bold text-lg
                        shadow-lg shadow-red-900/40
                        active:scale-95 transition">

                        TOLAK

                    </button>

                </form>

                <!-- TERIMA -->
                <form method="POST" action="/driver/order/{{ $order->id }}/accept">

                    @csrf

                    <button
                        class="h-16 w-full rounded-3xl
                        bg-emerald-500 font-bold text-lg
                        shadow-lg shadow-emerald-900/40
                        active:scale-95 transition">

                        TERIMA

                    </button>

                </form>

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

        // MAP
        let map = L.map('map');

        setTimeout(() => {
            map.invalidateSize();
        }, 200);

        // TILE
        L.tileLayer(
            'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap'
            }
        ).addTo(map);

        // MARKER PICKUP
        L.marker(pickup)
            .addTo(map)
            .bindPopup('Pickup');

        // MARKER TUJUAN
        L.marker(tujuan)
            .addTo(map)
            .bindPopup('Tujuan');

        // ROUTE
        fetch(
                `https://router.project-osrm.org/route/v1/driving/` +
                `${pickup[1]},${pickup[0]};` +
                `${tujuan[1]},${tujuan[0]}` +
                `?overview=full&geometries=geojson`
            )
            .then(res => res.json())
            .then(data => {

                console.log(data);

                if (!data.routes || !data.routes.length) {

                    alert('Route tidak ditemukan');

                    map.setView(pickup, 13);

                    return;
                }

                let route = data.routes[0];

                // GARIS ROUTE
                let routeLine = L.geoJSON(
                    route.geometry, {
                        style: {
                            color: '#00ff88',
                            weight: 5
                        }
                    }
                ).addTo(map);

                // AUTO ZOOM
                map.fitBounds(routeLine.getBounds());

            })
            .catch(err => {

                console.log(err);

                map.setView(pickup, 13);

            });
    </script>

</x-app-layout>
