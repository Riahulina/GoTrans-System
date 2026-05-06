<x-app-layout>

<div class="min-h-screen bg-[#0b1220] flex items-center justify-center">

    <!-- FRAME -->
    <div class="w-full max-w-sm h-[90vh] bg-[#0b1220] text-white rounded-3xl shadow-2xl flex flex-col items-center justify-between p-6 border border-white/10">

        <!-- TITLE -->
        <h1 class="text-xl font-semibold mt-2 text-center">
            Dapat Bintang & Ulasan
        </h1>

        <!-- STAR AREA -->
        <div class="flex flex-col items-center justify-center flex-1">

            <!-- bintang utama -->
            <div class="relative flex items-center justify-center">

                <!-- animasi glow -->
                <div class="absolute w-40 h-40 bg-yellow-300 opacity-20 rounded-full blur-2xl animate-pulse"></div>

                <!-- bintang besar -->
                <div class="text-[80px] text-yellow-300 animate-bounce">
                    ⭐
                </div>

                <!-- bintang kecil -->
                <div class="absolute -top-6 left-0 text-yellow-200 animate-ping">⭐</div>
                <div class="absolute top-0 right-0 text-yellow-200 animate-pulse">⭐</div>
                <div class="absolute bottom-0 left-0 text-yellow-200 animate-bounce">⭐</div>
                <div class="absolute bottom-0 right-0 text-yellow-200 animate-ping">⭐</div>

            </div>

            <!-- text -->
            <p class="text-gray-300 mt-6 text-center">
                Kamu mendapatkan bintang 
                <span class="text-yellow-300 font-bold">5</span>
            </p>

            <!-- ulasan -->
            <h2 class="text-2xl font-bold mt-8 text-center">
                “Ulasan Pelanggan”
            </h2>

        </div>

        <!-- BUTTON -->
        <button onclick="handleReview(this)"
            class="w-full py-4 rounded-2xl bg-white/10 text-white font-medium backdrop-blur-md active:scale-95 transition mb-2">
            Lihat Ulasan
        </button>

    </div>

</div>

<!-- SCRIPT -->
<script>
function handleReview(btn){
    btn.innerText = "Membuka...";
    btn.disabled = true;

    setTimeout(()=>{
        alert("⭐ 5/5\nPelayanan sangat baik, driver ramah!");
        btn.innerText = "Selesai";
        btn.classList.add("bg-green-600");
    },1000);
}
</script>

</x-app-layout>