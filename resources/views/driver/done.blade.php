<x-app-layout>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <div class="min-h-screen bg-[#050B18] text-white">

        <div class="max-w-md mx-auto px-5 py-6">

            <!-- TITLE -->
            <div class="mb-6">

                <h1 class="text-4xl font-extrabold">
                    Pesanan Selesai
                </h1>

                <p class="text-gray-400 mt-2 text-sm">
                    Driver telah sampai di tujuan
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

            <!-- STATUS -->
            <div id="statusBox"
                class="mt-5 bg-green-500/20 border border-green-500/30
                rounded-2xl p-4 text-center text-lg text-green-300">

                🎉 Perjalanan berhasil diselesaikan

            </div>

            <!-- LOKASI -->
            <div class="mt-8 space-y-6">

                <!-- PICKUP -->
                <div class="flex gap-4">

                    <div class="flex flex-col items-center">

                        <div class="w-5 h-5 rounded-full bg-green-400">
                        </div>

                        <div class="w-[3px] h-20 bg-white/30 mt-2">
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

                    <div class="w-5 h-5 rounded-full bg-red-500 mt-1">
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

            <!-- INFO -->
            <div class="grid grid-cols-2 gap-4 mt-8">

                <!-- ESTIMASI -->
                <div class="bg-white/5 border border-white/10
                rounded-3xl p-4 text-center">

                    <p class="text-gray-400 text-sm">
                        Waktu Tempuh
                    </p>

                    <h3 class="text-2xl font-bold mt-2">
                        {{ round($order->jarak_km * 3) }} Min
                    </h3>

                </div>

                <!-- JARAK -->
                <div class="bg-white/5 border border-white/10
                rounded-3xl p-4 text-center">

                    <p class="text-gray-400 text-sm">
                        Total Jarak
                    </p>

                    <h3 class="text-2xl font-bold mt-2">
                        {{ $order->jarak_km }} KM
                    </h3>

                </div>

            </div>

            <!-- PEMBAYARAN -->
            <div class="mt-8 bg-white/5 border border-white/10
            rounded-3xl p-5">

                <p class="text-gray-400 text-sm">
                    Total Pembayaran
                </p>

                <h2 class="text-4xl font-extrabold mt-2">
                    Rp{{ number_format($order->harga) }}
                </h2>

                <div class="mt-4 inline-block bg-white/10
                    px-4 py-2 rounded-xl text-sm">

                    Tunai

                </div>

            </div>

            <!-- BUTTON -->
            <!-- BUTTON -->
            <a href="{{ url('/driver/history') }}"
                class="block w-full mt-8 bg-green-500 hover:bg-green-800
                transition-all duration-300
                text-center text-white font-bold py-4 rounded-2xl">

                Selesai

            </a>
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

        setTimeout(() => {
            map.invalidateSize();
        }, 200);

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

        // route
        fetch(
                `https://router.project-osrm.org/route/v1/driving/` +
                `${pickup[1]},${pickup[0]};` +
                `${tujuan[1]},${tujuan[0]}` +
                `?overview=full&geometries=geojson`
            )
            .then(res => res.json())
            .then(data => {

                if (!data.routes.length) {
                    return;
                }

                let route = data.routes[0];

                let routeLine = L.geoJSON(
                    route.geometry, {
                        style: {
                            color: '#00ff88',
                            weight: 5
                        }
                    }
                ).addTo(map);

                map.fitBounds(routeLine.getBounds());

                // marker driver di tujuan
                let coords = route.geometry.coordinates;

                L.marker([
                    coords[coords.length - 1][1],
                    coords[coords.length - 1][0]
                ]).addTo(map);

            });

        // tombol selesai
        const finishBtn =
            document.getElementById("finishBtn");

        finishBtn.addEventListener("click", function() {

            finishBtn.innerText =
                "Menyelesaikan...";

            finishBtn.disabled = true;

            finishBtn.classList.remove(
                "bg-red-500",
                "hover:bg-red-600"
            );

            finishBtn.classList.add(
                "bg-gray-600"
            );

            setTimeout(() => {

                finishBtn.classList.remove(
                    "bg-gray-600"
                );

                finishBtn.classList.add(
                    "bg-green-600"
                );

                finishBtn.innerText =
                    "Pesanan Selesai ✅";

                setTimeout(() => {

                    window.location.href =
                        "/driver/rating";

                }, 1200);

            }, 1500);

        });
    </script>

</x-app-layout>
