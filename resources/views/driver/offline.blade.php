<x-app-layout>

    <div class="min-h-screen bg-[#050B18] text-white">

        <div class="max-w-md mx-auto px-5 py-6">

            <!-- TITLE -->
            <div class="mb-8">

                <h1 class="text-3xl font-bold">
                    Mode Offline
                </h1>

                <p class="text-gray-400 mt-2 text-sm">
                    Driver sedang tidak menerima pesanan
                </p>

            </div>

            <!-- STATUS CARD -->
            <div class="bg-white/5 border border-white/10 rounded-3xl p-6 shadow-xl">

                <div class="text-center">

                    <p class="text-xl font-semibold mb-6">
                        Status Driver
                    </p>

                    <!-- SWITCH -->
                    <div class="flex justify-center">

                        <button id="offlineBtn" onclick="goOnline()"
                            class="relative w-52 h-20 rounded-full
                            bg-white text-[#050B18]
                            font-bold text-2xl
                            active:scale-95
                            transition-all duration-300
                            overflow-hidden">

                            <div
                                class="absolute inset-0
                                bg-gradient-to-r
                                from-gray-100 to-white opacity-90">
                            </div>

                            <span id="btnText" class="relative z-10">
                                OFFLINE
                            </span>

                        </button>

                    </div>

                </div>

            </div>

            <!-- RINGKASAN -->
            <div class="mt-10">

                <h2 class="text-2xl font-semibold mb-5">
                    Ringkasan Hari Ini
                </h2>

                <!-- GRID -->
                <div class="grid grid-cols-2 gap-4">

                    <!-- TOTAL ORDER -->
                    <div class="bg-white/5 border border-white/10 rounded-3xl p-5">

                        <div class="text-3xl mb-3">
                            🚖
                        </div>

                        <h3 class="text-3xl font-bold">
                            {{ $totalOrders }}
                        </h3>

                        <p class="text-gray-300 mt-2 text-sm">
                            Total Pesanan
                        </p>

                    </div>

                    <!-- PENDAPATAN -->
                    <div class="bg-green-500/10 border border-green-500/20 rounded-3xl p-5">

                        <div class="text-3xl mb-3">
                            💰
                        </div>

                        <h3 class="text-2xl font-bold">
                            Rp{{ number_format($totalIncome) }}
                        </h3>

                        <p class="text-gray-300 mt-2 text-sm">
                            Pendapatan
                        </p>

                    </div>

                </div>

                <!-- ONLINE TIME -->
                <div class="mt-4 bg-white/5 border border-white/10 rounded-3xl p-5">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-gray-400 text-sm">
                                Waktu Online
                            </p>

                            <h3 class="text-3xl font-bold mt-2">
                                8 Jam
                            </h3>

                        </div>

                        <div class="text-4xl">
                            ⏱️
                        </div>

                    </div>

                </div>

            </div>

            <!-- BUTTON -->
            <div class="mt-10 pb-6">

                <button onclick="goOnline()" id="onlineButton"
                    class="w-full py-4 rounded-2xl
                    bg-green-500 hover:bg-green-600
                    text-white font-bold
                    transition-all duration-300">

                    Online Lagi

                </button>

            </div>

        </div>

    </div>

    <!-- SCRIPT -->
    <script>
        function goOnline() {

            let btn =
                document.getElementById("onlineButton");

            let switchBtn =
                document.getElementById("offlineBtn");

            let text =
                document.getElementById("btnText");

            btn.innerHTML =
                "Mengaktifkan...";

            btn.disabled = true;

            switchBtn.classList.remove("bg-white");

            switchBtn.classList.add("bg-green-400");

            text.innerHTML =
                "ONLINE";

            setTimeout(() => {

                window.location.href =
                    "/driver";

            }, 1200);

        }
    </script>

</x-app-layout>
