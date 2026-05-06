<x-app-layout>

<div class="min-h-screen bg-[#0b1220] flex items-center justify-center">

    <!-- FRAME HP -->
    <div class="w-full max-w-sm h-[90vh] bg-[#0b1220] text-white rounded-3xl shadow-2xl overflow-hidden flex flex-col border border-white/10">

        <!-- HEADER -->
        <div class="p-4 text-center font-semibold text-lg border-b border-white/10">
            Penumpang ditemukan
        </div>

        <!-- CONTENT -->
        <div class="flex-1 p-4 overflow-hidden">

            <!-- MAP -->
            <div class="relative h-56 rounded-2xl overflow-hidden mb-5 bg-gradient-to-br from-[#0f1c33] to-[#0a1629]">

                <!-- grid aesthetic -->
                <div class="absolute inset-0 opacity-20 
                    bg-[radial-gradient(circle,white_1px,transparent_1px)] 
                    bg-[size:18px_18px]"></div>

                <!-- driver marker -->
                <div class="absolute top-1/2 left-1/3">
                    <div class="w-4 h-4 bg-green-400 rounded-full animate-ping absolute"></div>
                    <div class="w-4 h-4 bg-green-400 rounded-full"></div>
                </div>

                <!-- penumpang marker -->
                <div class="absolute top-1/3 left-2/3">
                    <div class="w-4 h-4 bg-red-400 rounded-full animate-bounce"></div>
                </div>

                <!-- garis rute -->
                <div class="absolute top-1/2 left-1/3 w-32 h-[2px] bg-yellow-400 rotate-[-25deg] opacity-70"></div>

            </div>

            <!-- CARD INFO -->
            <div class="bg-white/5 backdrop-blur-md rounded-2xl p-4 border border-white/10 shadow-lg">

                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-lg font-bold">fencia wong jowo</h2>
                        <p class="text-gray-400 text-sm">⭐ 4.9</p>
                    </div>
                </div>

                <div class="mt-3">
                    <p class="text-gray-400 text-sm">catatan :</p>
                    <p class="text-base mt-1">jln. i aja dulu</p>
                </div>

                <div class="flex justify-between mt-4 text-sm text-gray-300">
                    <span>Status: menuju lokasi</span>
                    <div class="text-right">
                        <p>1.2 km</p>
                        <p>12 menit</p>
                    </div>
                </div>

            </div>

        </div>

        <!-- BUTTON AREA -->
        <div class="p-4 border-t border-white/10 space-y-3 bg-[#0b1220]">

            <button 
                onclick="handleNaik(this)"
                class="w-full py-3 rounded-xl bg-green-900 text-green-200 font-medium active:scale-95 transition">
                penumpang sudah naik
            </button>

            <button 
                onclick="handleCancel(this)"
                class="w-full py-3 rounded-xl bg-red-900 text-red-200 font-medium active:scale-95 transition">
                batalkan pesanan
            </button>

        </div>

    </div>

</div>

<!-- SCRIPT INTERAKSI -->
<script>
function handleNaik(btn){
    btn.innerText = "Menjemput...";
    btn.disabled = true;

    setTimeout(() => {
        btn.innerText = "Berhasil 🚗";
        btn.classList.remove("bg-green-900");
        btn.classList.add("bg-green-600");
    }, 1500);
}

function handleCancel(btn){
    btn.innerText = "Membatalkan...";
    btn.disabled = true;

    setTimeout(() => {
        btn.innerText = "Dibatalkan ❌";
        btn.classList.remove("bg-red-900");
        btn.classList.add("bg-red-600");
    }, 1500);
}
</script>

</x-app-layout>