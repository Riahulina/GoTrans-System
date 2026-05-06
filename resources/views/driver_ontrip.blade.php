<x-app-layout>

<div class="min-h-screen bg-[#0b1220] flex items-center justify-center">

    <!-- FRAME HP -->
    <div class="w-full max-w-sm h-[90vh] bg-[#0b1220] text-white rounded-3xl shadow-2xl overflow-hidden flex flex-col border border-white/10">

        <!-- HEADER -->
        <div class="p-4 text-center font-semibold text-lg border-b border-white/10">
            Dalam Perjalanan
        </div>

        <!-- CONTENT -->
        <div class="flex-1 p-4">

            <!-- MAP -->
            <div class="relative h-56 rounded-2xl overflow-hidden mb-5 bg-gradient-to-br from-[#0f1c33] to-[#0a1629]">

                <!-- grid -->
                <div class="absolute inset-0 opacity-20 
                    bg-[radial-gradient(circle,white_1px,transparent_1px)] 
                    bg-[size:18px_18px]"></div>

                <!-- driver -->
                <div id="driver" class="absolute top-1/2 left-1/4 transition-all duration-1000">
                    <div class="w-4 h-4 bg-green-400 rounded-full animate-ping absolute"></div>
                    <div class="w-4 h-4 bg-green-400 rounded-full"></div>
                </div>

                <!-- tujuan -->
                <div class="absolute top-1/3 right-6">
                    <div class="w-4 h-4 bg-red-400 rounded-full animate-bounce"></div>
                </div>

                <!-- garis -->
                <div class="absolute top-1/2 left-1/4 w-40 h-[2px] bg-yellow-400 rotate-[-20deg] opacity-70"></div>

            </div>

            <!-- TUJUAN -->
            <div class="mb-4">
                <p class="text-gray-400 text-sm">TUJUAN</p>
                <h2 class="text-2xl font-bold mt-1">jln. i aja dulu</h2>
            </div>

            <!-- INFO BOX -->
            <div class="grid grid-cols-2 gap-4 mb-5">

                <div class="bg-white/10 rounded-2xl p-4 text-center backdrop-blur-md">
                    <p class="text-gray-300 text-sm">Estimasi Tiba</p>
                    <h3 id="time" class="text-xl font-bold mt-2">09.58</h3>
                </div>

                <div class="bg-white/10 rounded-2xl p-4 text-center backdrop-blur-md">
                    <p class="text-gray-300 text-sm">Sisa Jarak</p>
                    <h3 id="distance" class="text-xl font-bold mt-2">5.6 km</h3>
                </div>

            </div>

        </div>

        <!-- BUTTON -->
        <div class="p-4 border-t border-white/10">

            <button onclick="handleHelp(this)"
                class="w-full py-4 rounded-2xl bg-white/10 text-white font-medium backdrop-blur-md active:scale-95 transition">
                Chat, Telepon dan Bantuan
            </button>

        </div>

    </div>

</div>

<!-- SCRIPT -->
<script>

let distance = 5.6;
let minutes = 12;

function updateTrip(){
    if(distance > 0){
        distance -= 0.1;
        minutes -= 0.2;

        document.getElementById("distance").innerText = distance.toFixed(1) + " km";

        let now = new Date();
        now.setMinutes(now.getMinutes() + Math.floor(minutes));

        let jam = now.getHours().toString().padStart(2,'0');
        let menit = now.getMinutes().toString().padStart(2,'0');

        document.getElementById("time").innerText = jam + "." + menit;
    }
}

// animasi jalan driver
setInterval(() => {
    let driver = document.getElementById("driver");
    let left = driver.offsetLeft;

    if(left < 200){
        driver.style.left = (left + 5) + "px";
    }

    updateTrip();
}, 1500);


// tombol bantuan
function handleHelp(btn){
    btn.innerText = "Menghubungkan...";
    btn.disabled = true;

    setTimeout(()=>{
        btn.innerText = "Terhubung 📞";
        btn.classList.add("bg-green-600");
    },1500);
}

</script>

</x-app-layout>