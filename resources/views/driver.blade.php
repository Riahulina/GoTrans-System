<x-app-layout>

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
        <div class="relative h-[320px] rounded-[32px] overflow-hidden bg-[#09152b] border border-white/10 shadow-2xl">

            <!-- efek grid -->
            <div class="absolute inset-0 opacity-20
                bg-[radial-gradient(circle,white_1px,transparent_1px)]
                bg-[size:22px_22px]">
            </div>

            <!-- garis jalan -->
            <svg class="absolute inset-0 w-full h-full" viewBox="0 0 400 300">

                <path
                    d="M20 70
                       H140
                       V170
                       H360"
                    stroke="white"
                    stroke-width="3"
                    stroke-dasharray="10 8"
                    fill="none"
                    opacity="0.9"
                />

            </svg>

            <!-- titik jemput -->
            <div class="absolute top-[58px] left-[128px]">

                <div class="relative">

                    <div class="absolute inset-0 bg-green-400 rounded-full blur-xl opacity-50 animate-pulse"></div>

                    <div class="w-5 h-5 rounded-full bg-green-400 border-4 border-white"></div>

                </div>

            </div>

            <!-- titik tujuan -->
            <div class="absolute bottom-[58px] right-[38px]">

                <div class="relative">

                    <div class="absolute inset-0 bg-red-400 rounded-full blur-xl opacity-50 animate-pulse"></div>

                    <div class="w-5 h-5 rounded-full bg-red-500 border-4 border-white"></div>

                </div>

            </div>

            <!-- tulisan map -->
            <div class="absolute inset-0 flex items-center justify-center">

                <div class="text-center">

                    <div class="text-5xl mb-2">🗺️</div>

                    <p class="text-2xl font-semibold text-white/90">
                        Live Map
                    </p>

                </div>

            </div>

        </div>

        <!-- LOCATION -->
        <div class="mt-8 space-y-6">

            <!-- penjemputan -->
            <div class="flex gap-4">

                <div class="flex flex-col items-center">

                    <div class="w-5 h-5 rounded-full bg-green-400 shadow-lg shadow-green-500/50"></div>

                    <div class="w-[3px] h-20 bg-white/30 border-l border-dashed border-white/50 mt-2"></div>

                </div>

                <div>
                    <p class="text-2xl font-bold">
                        Penjemputan
                    </p>

                    <p class="text-gray-300 text-lg mt-1">
                        Jl. Gatot Subroto No.12
                    </p>
                </div>

            </div>

            <!-- tujuan -->
            <div class="flex gap-4">

                <div class="w-5 h-5 rounded-full bg-red-500 shadow-lg shadow-red-500/50 mt-1"></div>

                <div>
                    <p class="text-2xl font-bold">
                        Tujuan
                    </p>

                    <p class="text-gray-300 text-lg mt-1">
                        Sun Plaza Medan
                    </p>
                </div>

            </div>

        </div>

        <!-- PASSENGER CARD -->
        <div class="mt-8 bg-white/5 border border-white/10 rounded-[28px] p-5 backdrop-blur-xl shadow-xl">

            <div class="flex items-center justify-between">

                <!-- kiri -->
                <div class="flex items-center gap-4">

                    <!-- avatar -->
                    <div class="relative">

                        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-pink-500 to-purple-600 flex items-center justify-center text-2xl font-bold shadow-lg">
                            F
                        </div>

                        <div class="absolute bottom-0 right-0 w-4 h-4 bg-green-400 border-2 border-[#050B18] rounded-full"></div>

                    </div>

                    <!-- nama -->
                    <div>

                        <h2 class="text-xl font-bold">
                            Fencia Wong
                        </h2>

                        <p class="text-yellow-300 mt-1">
                            ⭐ 4.9
                        </p>

                    </div>

                </div>

                <!-- tombol call -->
                <button class="w-14 h-14 rounded-2xl bg-green-500/20 border border-green-400/30 flex items-center justify-center text-2xl active:scale-95 transition">
                    📞
                </button>

            </div>

            <!-- catatan -->
            <div class="mt-5 bg-white/5 rounded-2xl p-4 border border-white/5">

                <p class="text-gray-400 text-sm mb-2">
                    Catatan Penumpang
                </p>

                <p class="text-white leading-relaxed">
                    Bang jemput di depan minimarket aja ya,
                    saya pakai jaket hitam.
                </p>

            </div>

        </div>

        <!-- INFO -->
        <div class="grid grid-cols-3 gap-4 mt-7">

            <!-- tarif -->
            <div class="bg-white/5 border border-white/10 rounded-3xl p-4 text-center backdrop-blur-md">

                <p class="text-gray-400 text-sm">
                    Tarif
                </p>

                <h3 class="text-2xl font-bold mt-2">
                    Rp25K
                </h3>

            </div>

            <!-- jarak -->
            <div class="bg-white/5 border border-white/10 rounded-3xl p-4 text-center backdrop-blur-md">

                <p class="text-gray-400 text-sm">
                    Jarak
                </p>

                <h3 class="text-2xl font-bold mt-2">
                    1.2 KM
                </h3>

            </div>

            <!-- waktu -->
            <div class="bg-white/5 border border-white/10 rounded-3xl p-4 text-center backdrop-blur-md">

                <p class="text-gray-400 text-sm">
                    Waktu
                </p>

                <h3 class="text-2xl font-bold mt-2">
                    12 Min
                </h3>

            </div>

        </div>

        <!-- BUTTON -->
        <div class="grid grid-cols-2 gap-4 mt-8 pb-10">

            <!-- tolak -->
            <button
                onclick="rejectOrder(this)"
                class="h-16 rounded-3xl bg-red-600 font-bold text-lg shadow-lg shadow-red-900/40 active:scale-95 transition">

                TOLAK

            </button>

            <!-- terima -->
            <button
                onclick="acceptOrder(this)"
                class="h-16 rounded-3xl bg-emerald-500 font-bold text-lg shadow-lg shadow-emerald-900/40 active:scale-95 transition">

                TERIMA

            </button>

        </div>

    </div>

</div>

<!-- SCRIPT -->
<script>

function acceptOrder(btn){

    btn.innerHTML = "Menerima...";
    btn.disabled = true;

    setTimeout(() => {

        window.location.href = "/driver/ontrip";

    }, 1200);

}

function rejectOrder(btn){

    btn.innerHTML = "Ditolak";
    btn.disabled = true;
    btn.classList.remove("bg-red-600");
    btn.classList.add("bg-gray-600");

}

</script>

</x-app-layout>