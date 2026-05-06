<x-app-layout>

<div class="min-h-screen bg-[#0b1220] flex items-center justify-center">

    <!-- FRAME HP -->
    <div class="w-full max-w-sm h-[90vh] bg-[#0b1220] text-white rounded-3xl shadow-2xl overflow-hidden flex flex-col border border-white/10">

        <!-- HEADER -->
        <div class="p-4 text-center font-semibold text-lg border-b border-white/10">
            Sampai Tujuan
        </div>

        <!-- CONTENT -->
        <div class="flex-1 p-4">

            <!-- MAP -->
            <div class="relative h-56 rounded-2xl overflow-hidden mb-5 bg-gradient-to-br from-[#0f1c33] to-[#0a1629]">

                <!-- grid -->
                <div class="absolute inset-0 opacity-20 
                    bg-[radial-gradient(circle,white_1px,transparent_1px)] 
                    bg-[size:18px_18px]"></div>

                <!-- titik tujuan -->
                <div class="absolute top-1/3 right-6">
                    <div class="w-4 h-4 bg-red-400 rounded-full animate-bounce"></div>
                </div>

                <!-- titik driver (sudah sampai) -->
                <div class="absolute top-1/3 right-6">
                    <div class="w-4 h-4 bg-green-400 rounded-full"></div>
                </div>

                <!-- garis selesai -->
                <div class="absolute top-1/3 right-6 w-32 h-[2px] bg-green-400 opacity-70"></div>

            </div>

            <!-- TUJUAN -->
            <div class="mb-6">
                <p class="text-gray-400 text-sm">TUJUAN</p>
                <h2 class="text-2xl font-bold mt-1">jln. i aja dulu</h2>
            </div>

            <!-- PEMBAYARAN -->
            <div class="bg-white/5 rounded-2xl p-4 border border-white/10 mb-6">

                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-400 text-sm">Total Pembayaran</p>
                        <h3 class="text-2xl font-bold mt-1">Rp25.000</h3>
                    </div>

                    <div class="bg-white/10 px-4 py-2 rounded-xl text-sm">
                        Tunai, Avv
                    </div>
                </div>

            </div>

        </div>

        <!-- BUTTON -->
        <div class="p-4 border-t border-white/10">

           <button onclick="goToRating(this)"
    class="w-full py-4 rounded-2xl bg-white/10 text-white font-medium active:scale-95 transition">
    Selesaikan Pesanan
</button>

        </div>

    </div>

</div>

<!-- SCRIPT -->
<script>
function handleFinish(btn){
    btn.innerText = "Menyelesaikan...";
    btn.disabled = true;

    setTimeout(()=>{
        btn.innerText = "Selesai ✅";
        btn.classList.add("bg-green-600");

        // pindah halaman setelah animasi
        setTimeout(() => {
            window.location.href = "/driver/rating";
        }, 800);

    },1500);
}
</script>

</x-app-layout>