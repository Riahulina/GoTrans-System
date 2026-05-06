<x-app-layout>

<div class="min-h-screen bg-[#0b1220] flex items-center justify-center">

    <!-- FRAME -->
    <div class="w-full max-w-sm h-[90vh] bg-[#0b1220] text-white rounded-3xl shadow-2xl p-5 border border-white/10 flex flex-col">

        <!-- TITLE -->
        <h1 class="text-xl font-semibold mb-6">
            Detail Ulasan
        </h1>

        <!-- PROFILE -->
        <div class="flex items-center gap-3 mb-6">
            <div class="w-14 h-14 rounded-full bg-white/10 flex items-center justify-center text-sm text-center">
                Profile<br>Driver
            </div>

            <div>
                <h2 class="font-bold text-lg">Golap Mahmudin</h2>
                <p class="text-gray-400 text-sm">Hari ini, 09.58</p>
            </div>
        </div>

        <!-- STARS -->
        <div class="flex justify-center gap-2 text-yellow-300 text-2xl mb-6 animate-pulse">
            ⭐ ⭐ ⭐ ⭐ ⭐
        </div>

        <!-- CHAT BUBBLE -->
        <div class="relative bg-white/10 rounded-2xl p-4 text-center mb-8 backdrop-blur-md">

            <p class="text-gray-200 font-medium">
                “Driver sangat ramah dan perjalanan nyaman!”
            </p>

            <!-- triangle -->
            <div class="absolute left-6 -bottom-3 w-0 h-0 border-l-[10px] border-l-transparent border-r-[10px] border-r-transparent border-t-[12px] border-t-white/10"></div>
        </div>

        <!-- SIDE LABEL -->
        <div class="flex-1 flex items-end">
            <div class="relative bg-white/10 rounded-2xl px-3 py-6 text-center text-sm backdrop-blur-md">

                <p class="writing-mode-vertical-rl rotate-180 tracking-wide">
                    Deskripsi Nilai
                </p>

                <!-- segitiga bawah -->
                <div class="absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-full w-0 h-0 border-l-[10px] border-l-transparent border-r-[10px] border-r-transparent border-t-[14px] border-t-white/10"></div>

            </div>
        </div>

        <!-- BUTTON -->
        <button onclick="goBack()"
            class="mt-6 w-full py-3 rounded-xl bg-white/10 text-white active:scale-95 transition">
            Kembali
        </button>

    </div>

</div>

<!-- SCRIPT -->
<script>
function goBack(){
    window.history.back();
}
</script>

</x-app-layout>