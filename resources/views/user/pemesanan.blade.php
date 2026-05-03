@extends('user.layout')

@section('content')

<div class="container-fluid">
    <div class="row vh-100">

        <!-- LEFT MAP -->
        <div class="col-md-7 p-0">
            <div id="map"></div>
        </div>

        <!-- RIGHT PANEL -->
        <div class="col-md-5 p-4 panel">

            <h4 class="fw-bold mb-3">Pemesanan</h4>

            <!-- INPUT -->
            <div class="card-box mb-3">
                <input id="pickup" class="form-control mb-2" placeholder="Lokasi Penjemputan">
                <input id="destination" class="form-control mb-3" placeholder="Tujuan">

                <button onclick="hitungRute()" class="btn btn-main w-100">
                    Cari Rute
                </button>
            </div>

            <!-- RINGKASAN -->
            <div class="card-box mb-3">
                <h6 class="fw-bold">Ringkasan Perjalanan</h6>

                <div class="summary">
                    <p>Jarak: <span id="jarak">-</span></p>
                    <p>Estimasi: <span id="waktu">-</span></p>
                    <p>Harga: <span id="harga">-</span></p>
                </div>

                <button class="btn btn-success w-100 mt-2">
                    Pesan Sekarang
                </button>
            </div>

            <!-- STATUS -->
            <div class="card-box">
                <h6 class="fw-bold">Status</h6>
                <p class="text-muted">Belum ada driver ditemukan</p>
            </div>

        </div>

    </div>
</div>


<!-- LEAFLET MAP -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>


<style>

/* MAP FULL */
#map {
    height: 100vh;
    width: 100%;
}

/* PANEL */
.panel {
    background: #f8f9fa;
}

/* CARD */
.card-box {
    background: white;
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
}

/* BUTTON */
.btn-main {
    background: #1b263b;
    color: white;
    border-radius: 10px;
}

.btn-main:hover {
    background: #415a77;
}

/* SUMMARY */
.summary p {
    margin: 5px 0;
    font-size: 14px;
}

</style>


<script>

// INIT MAP
var map = L.map('map').setView([-6.200000, 106.816666], 13);

// TILE
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap'
}).addTo(map);

// MARKER
var marker;

// SIMULASI HITUNG
function tambahRiwayat() {

    let pickup = document.getElementById("pickup").value;
    let tujuan = document.getElementById("destination").value;
    let harga = document.getElementById("harga").innerText;
    let jarak = document.getElementById("jarak").innerText;
    let waktu = document.getElementById("waktu").innerText;

    if(harga == "-" || !pickup || !tujuan){
        alert("Cari rute dulu!");
        return;
    }

    document.getElementById("statusText").innerText = "Driver ditemukan 🚗";

    // ambil data lama
    let data = JSON.parse(localStorage.getItem("riwayat")) || [];

    // tambah data baru
    data.push({
        pickup: pickup,
        tujuan: tujuan,
        harga: harga,
        jarak: jarak,
        waktu: waktu,
        status: "Selesai"
    });

    // simpan
    localStorage.setItem("riwayat", JSON.stringify(data));

    alert("Pesanan berhasil!");
}

</script>

@endsection