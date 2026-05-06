<x-app-layout>

<div class="min-h-screen bg-[#0b1220] flex items-center justify-center">

    <!-- FRAME HP -->
    <div class="w-full max-w-sm h-[90vh] bg-[#0b1220] text-white rounded-3xl shadow-2xl flex flex-col border border-white/10 overflow-hidden">

        <!-- HEADER -->
        <div class="p-5 text-center border-b border-white/10">
            <h1 class="text-2xl font-bold tracking-wide">
                Riwayat Pengantaran
            </h1>
        </div>

        <!-- TAB -->
        <div class="grid grid-cols-3 text-center text-sm font-medium bg-white/5">
            <button onclick="setTab('harian')" id="tab-harian" class="py-3 bg-white/10">
                Harian
            </button>
            <button onclick="setTab('mingguan')" id="tab-mingguan" class="py-3">
                Mingguan
            </button>
            <button onclick="setTab('bulanan')" id="tab-bulanan" class="py-3">
                Bulanan
            </button>
        </div>

        <!-- TABLE HEADER -->
        <div class="grid grid-cols-3 px-4 py-3 text-gray-400 text-sm border-b border-white/10">
            <span>Waktu</span>
            <span class="text-center">Nama</span>
            <span class="text-right">Tarif</span>
        </div>

        <!-- LIST -->
        <div id="list" class="flex-1 overflow-y-auto px-3 py-2 space-y-2">

            <!-- ITEM -->
            <div class="history-item">
                <span>08:21</span>
                <span class="text-center">Budi</span>
                <span class="text-right text-green-400">Rp12k</span>
            </div>

            <div class="history-item">
                <span>09:10</span>
                <span class="text-center">Sari</span>
                <span class="text-right text-green-400">Rp15k</span>
            </div>

            <div class="history-item">
                <span>10:45</span>
                <span class="text-center">Andi</span>
                <span class="text-right text-green-400">Rp9k</span>
            </div>

        </div>

        <!-- FOOTER TOTAL -->
        <div class="p-4 border-t border-white/10 bg-white/5">
            <div class="flex justify-between items-center">
                <span class="text-gray-400">Total</span>
                <span id="total" class="text-lg font-bold text-green-400">Rp36k</span>
            </div>
        </div>

    </div>

</div>

<!-- SCRIPT -->
<script>
let data = {
    harian: [
        {time:'08:21', name:'Budi', price:12000},
        {time:'09:10', name:'Sari', price:15000},
        {time:'10:45', name:'Andi', price:9000},
    ],
    mingguan: [
        {time:'Senin', name:'Total', price:120000},
        {time:'Selasa', name:'Total', price:98000},
    ],
    bulanan: [
        {time:'Januari', name:'Total', price:1200000},
        {time:'Februari', name:'Total', price:980000},
    ]
}

function formatRp(num){
    return "Rp" + (num/1000).toFixed(0) + "k";
}

function render(tab){
    let list = document.getElementById("list");
    let total = 0;

    list.innerHTML = "";

    data[tab].forEach(item => {
        total += item.price;

        list.innerHTML += `
            <div class="history-item">
                <span>${item.time}</span>
                <span class="text-center">${item.name}</span>
                <span class="text-right text-green-400">${formatRp(item.price)}</span>
            </div>
        `;
    });

    document.getElementById("total").innerText = formatRp(total);
}

function setTab(tab){
    document.querySelectorAll("button").forEach(btn => {
        btn.classList.remove("bg-white/10");
    });

    document.getElementById("tab-"+tab).classList.add("bg-white/10");

    render(tab);
}

// default
render('harian');
</script>

</x-app-layout>