<x-app-layout>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <div class="min-h-screen bg-[#050B18] text-white">

        <div class="max-w-md mx-auto px-5 py-6">

            <!-- TITLE -->
            <div class="mb-6">

                <h1 class="text-4xl font-extrabold">
                    Dalam Perjalanan
                </h1>

                <p class="text-gray-400 mt-2 text-sm">
                    Driver sedang menuju tujuan
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

            <!-- BUTTON -->
            <div class="flex gap-3 mt-5">

                <!-- MULAI -->
                <button id="startBtn"
                    class="flex-1 bg-green-500 hover:bg-green-600
                    transition-all duration-300
                    text-white font-bold py-4 rounded-2xl">

                    Mulai Perjalanan

                </button>

                <!-- SUDAH SAMPAI -->
                <button id="arriveBtn"
                    class="flex-1 bg-blue-500 hover:bg-blue-600
                    transition-all duration-300
                    text-white font-bold py-4 rounded-2xl">

                    Sudah Sampai

                </button>

            </div>

            <!-- STATUS -->
            <div id="statusBox"
                class="mt-4 bg-white/5 border border-white/10
                rounded-2xl p-4 text-center text-lg">

                Menunggu driver memulai perjalanan...

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
                        Estimasi Tiba
                    </p>

                    <h3 id="time" class="text-2xl font-bold mt-2">
                        {{ round($order->jarak_km * 3) }} Min
                    </h3>

                </div>

                <!-- JARAK -->
                <div class="bg-white/5 border border-white/10
                rounded-3xl p-4 text-center">

                    <p class="text-gray-400 text-sm">
                        Sisa Jarak
                    </p>

                    <h3 id="distance" class="text-2xl font-bold mt-2">
                        {{ $order->jarak_km }} KM
                    </h3>

                </div>

            </div>
            <!-- BUTTON SELESAIKAN -->
            <a href="{{ url('/driver/done/' . $order->id) }}"
                class="block mt-8 bg-red-500 hover:bg-red-600
    transition-all duration-300
    text-center text-white font-bold py-4 rounded-2xl">

                Selesaikan Pesanan

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

        let driverMarker;
        let coords = [];
        let index = 0;
        let interval;

        let distanceLeft = {{ $order->jarak_km }};
        let timeLeft = {{ round($order->jarak_km * 3) }};

        // ambil route
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

                // route line
                let routeLine = L.geoJSON(
                    route.geometry, {
                        style: {
                            color: '#00ff88',
                            weight: 5
                        }
                    }
                ).addTo(map);

                map.fitBounds(routeLine.getBounds());

                coords = route.geometry.coordinates;

                // marker driver
                driverMarker = L.marker([
                    coords[0][1],
                    coords[0][0]
                ]).addTo(map);

            })
            .catch(err => {

                console.log(err);

            });

        // BUTTON MULAI
        document.getElementById("startBtn")
            .addEventListener("click", function() {

                fetch(
                    '/driver/order/{{ $order->id }}/status', {

                        method: 'POST',

                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },

                        body: JSON.stringify({
                            status: 'ontrip'
                        })

                    }
                );

                document.getElementById("statusBox")
                    .innerText =
                    "Perjalanan dimulai...";

                this.disabled = true;

                this.classList.remove("bg-green-500");
                this.classList.add("bg-gray-500");

                interval = setInterval(() => {

                    if (index >= coords.length) {

                        clearInterval(interval);

                        document.getElementById("statusBox")
                            .innerText =
                            "Driver telah sampai di tujuan";

                        return;
                    }

                    let lat = coords[index][1];
                    let lng = coords[index][0];

                    driverMarker.setLatLng([lat, lng]);

                    // map ikut gerak
                    map.panTo([lat, lng]);

                    // update jarak
                    if (distanceLeft > 0) {

                        distanceLeft -= 0.1;

                        if (distanceLeft < 0) {
                            distanceLeft = 0;
                        }

                        document.getElementById("distance")
                            .innerText =
                            distanceLeft.toFixed(1) + " KM";
                    }

                    // update waktu
                    if (timeLeft > 0) {

                        timeLeft -= 1;

                        if (timeLeft < 0) {
                            timeLeft = 0;
                        }

                        document.getElementById("time")
                            .innerText =
                            timeLeft + " Min";
                    }

                    index++;

                }, 1000);

            });

        // BUTTON SAMPAI
        // BUTTON SAMPAI
        document.getElementById("arriveBtn")
            .addEventListener("click", function() {

                fetch(
                        '/driver/order/{{ $order->id }}/status', {

                            method: 'POST',

                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            },

                            body: JSON.stringify({
                                status: 'sampai_pickup'
                            })

                        }
                    )

                    .then(async res => {

                        let data = await res.json();

                        if (!res.ok) {

                            alert("Gagal update status");

                            console.log(data);

                            return;
                        }

                        alert("Berhasil update status");

                        clearInterval(interval);

                        document.getElementById("statusBox")
                            .innerText =
                            "Driver sudah sampai di lokasi anda";

                        document.getElementById("distance")
                            .innerText = "0 KM";

                        document.getElementById("time")
                            .innerText = "0 Min";

                    })

                    .catch(err => {

                        console.log(err);

                        alert("Terjadi error");

                    });

            });
    </script>

</x-app-layout>
