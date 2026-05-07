<x-app-layout>

<div class="min-h-screen bg-[#050B18] text-white">

    <!-- CONTENT -->
    <div class="max-w-md mx-auto px-6 py-8">

        <!-- TITLE -->
        <div class="mb-10">

            <h1 class="text-5xl font-extrabold tracking-wide">
                Mode Offline
            </h1>

            <p class="text-gray-400 mt-3 text-lg">
                Driver sedang tidak menerima pesanan
            </p>

        </div>

        <!-- STATUS CARD -->
        <div class="bg-white/5 border border-white/10 rounded-[36px] p-8 backdrop-blur-xl shadow-2xl">

            <!-- TITLE -->
            <div class="text-center">

                <p class="text-3xl font-bold mb-8">
                    Mode Offline
                </p>

                <!-- SWITCH -->
                <div class="flex justify-center">

                    <button id="offlineBtn"
                        onclick="goOnline()"
                        class="relative w-[240px] h-[95px] rounded-full bg-white text-[#050B18] font-extrabold text-3xl shadow-2xl active:scale-95 transition-all duration-300 overflow-hidden">

                        <div class="absolute inset-0 bg-gradient-to-r from-gray-100 to-white opacity-90"></div>

                        <span id="btnText" class="relative z-10">
                            OFFLINE
                        </span>

                    </button>

                </div>

            </div>

        </div>

        <!-- RINGKASAN -->
        <div class="mt-12">

            <h2 class="text-4xl italic font-light text-white/90 mb-8">
                Ringkasan Hari Ini
            </h2>

            <!-- GRID -->
            <div class="grid grid-cols-2 gap-5">

                <!-- pesanan -->
                <div class="bg-white/5 border border-white/10 rounded-[30px] p-6 backdrop-blur-xl">

                    <div class="text-5xl mb-4">
                        🚖
                    </div>

                    <h3 class="text-5xl font-bold">
                        5
                    </h3>

                    <p class="text-2xl font-semibold mt-3 text-white/90">
                        Pesanan
                    </p>

                </div>

                <!-- pendapatan -->
                <div class="bg-gradient-to-br from-green-500/20 to-emerald-600/20 border border-green-400/20 rounded-[30px] p-6 backdrop-blur-xl">

                    <div class="text-5xl mb-4">
                        💰
                    </div>

                    <h3 class="text-3xl font-bold leading-tight">
                        Rp150K
                    </h3>

                    <p class="text-2xl font-semibold mt-3 text-white/90">
                        Pendapatan
                    </p>

                </div>

            </div>

            <!-- online time -->
            <div class="mt-5 bg-white/5 border border-white/10 rounded-[30px] p-6 backdrop-blur-xl">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-gray-400 text-lg">
                            Waktu Online
                        </p>

                        <h3 class="text-5xl font-bold mt-3">
                            8 jam
                        </h3>

                    </div>

                    <div class="text-6xl">
                        ⏱️
                    </div>

                </div>

            </div>

        </div>

        <!-- BUTTON -->
        <div class="mt-12 pb-10">

            <button
                onclick="goOnline()"
                id="onlineButton"
                class="w-full h-20 rounded-[30px] bg-white text-[#050B18] text-3xl font-extrabold shadow-2xl active:scale-95 transition-all duration-300">

                Online Lagi

            </button>

        </div>

    </div>

</div>

<!-- SCRIPT -->
<script>

function goOnline(){

    let btn = document.getElementById("onlineButton");
    let switchBtn = document.getElementById("offlineBtn");
    let text = document.getElementById("btnText");

    btn.innerHTML = "Mengaktifkan...";
    switchBtn.classList.remove("bg-white");
    switchBtn.classList.add("bg-green-400");

    text.innerHTML = "ONLINE";

    setTimeout(() => {

        window.location.href = "/driver";

    }, 1500);

}

</script>

</x-app-layout>