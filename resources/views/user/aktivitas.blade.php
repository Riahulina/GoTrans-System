@extends('user.layout')

@section('content')

<div class="container py-4">

    <h4 class="fw-bold mb-4">Aktivitas Perjalanan </h4>

    <div id="historyList" class="history-list"></div>

</div>

<style>

/* LIST */
.history-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

/* ITEM */
.history-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px;
    border-radius: 15px;
    background: white;
    box-shadow: 0 8px 20px rgba(0,0,0,0.05);
    transition: 0.3s;
}

.history-item:hover {
    transform: translateY(-5px);
}

/* ROUTE */
.route small {
    display: block;
}

/* PRICE */
.price {
    font-weight: bold;
    color: #1b263b;
}

/* STATUS */
.status {
    font-size: 11px;
    padding: 4px 10px;
    border-radius: 10px;
    margin-top: 5px;
}

.done {
    background: #d4edda;
    color: #155724;
}

</style>

<script>

// AMBIL DATA
let data = JSON.parse(localStorage.getItem("riwayat")) || [];

let html = "";

// LOOP
data.reverse().forEach(item => {

    html += `
        <div class="history-item">

            <div class="route">
                <small>${item.pickup}</small>
                <small class="text-muted">${item.tujuan}</small>
            </div>

            <div class="text-end">
                <div class="price">${item.harga}</div>
                <small>${item.jarak} • ${item.waktu}</small>
                <div class="status done">${item.status}</div>
            </div>

        </div>
    `;
});

// TAMPILKAN
document.getElementById("historyList").innerHTML = html;

</script>

@endsection