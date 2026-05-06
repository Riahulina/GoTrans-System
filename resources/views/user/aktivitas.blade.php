@extends('user.layout')

@section('content')

<!-- WRAPPER CENTER -->
<div class="d-flex justify-content-center">
<div class="layanan-container">

    <!-- HEADER -->
    <div class="mb-4 fade-up text-center">
        <h4 class="fw-bold">🚗 Aktivitas Perjalanan</h4>
        <p class="text-muted">Riwayat perjalanan yang telah kamu lakukan</p>
    </div>

    <div class="row g-4">

        <!-- ITEM 1 -->
        <div class="col-md-6 fade-up">
            <div class="service-card p-4 position-relative">

                <span class="badge-custom bg-success">Selesai</span>

                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <h5 class="fw-bold mb-1">Medan → Binjai</h5>
                        <p class="text-muted small mb-2">05 Mei 2026</p>

                        <div class="price">
                            Jarak: 12 KM • Durasi: 25 menit
                        </div>
                    </div>

                    <div class="icon-box">🚗</div>

                </div>

                <div class="mt-3 d-flex justify-content-between align-items-center">
                    <b class="text-primary">Rp 24.000</b>
                    <button class="btn btn-main btn-sm">Detail</button>
                </div>

            </div>
        </div>

        <!-- ITEM 2 -->
        <div class="col-md-6 fade-up">
            <div class="service-card p-4 position-relative">

                <span class="badge-custom bg-danger">Dibatalkan</span>

                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <h5 class="fw-bold mb-1">Medan → Deli Serdang</h5>
                        <p class="text-muted small mb-2">03 Mei 2026</p>

                        <div class="price">
                            Jarak: 8 KM • Durasi: -
                        </div>
                    </div>

                    <div class="icon-box">🛺</div>

                </div>

                <div class="mt-3 d-flex justify-content-between align-items-center">
                    <b class="text-secondary">-</b>
                    <button class="btn btn-main btn-sm">Detail</button>
                </div>

            </div>
        </div>

    </div>

</div>
</div>


<!-- STYLE -->
<style>

/* CONTAINER */
.layanan-container {
    max-width: 900px;
    width: 100%;
}

/* CARD */
.service-card {
    border-radius: 20px;
    transition: 0.4s;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
}

/* HOVER */
.service-card:hover {
    transform: translateY(-10px) scale(1.02);

}

/* TEXT */
.service-card:hover .text-muted {
    color: #747070 !important;
}

/* ICON */
.icon-box {
    font-size: 30px;
    background: #e9ecef;
    width: 60px;
    height: 60px;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* BUTTON */
.btn-main {
    background: #1b263b;
    color: white;
    border-radius: 10px;
    border: none;
}

.btn-main:hover {
    background: #415a77;
}

/* BADGE */
.badge-custom {
    position: absolute;
    top: 15px;
    right: 15px;
    color: white;
    font-size: 12px;
    padding: 5px 10px;
    border-radius: 20px;
}

/* PRICE */
.price {
    font-size: 13px;
}

/* ANIMATION */
.fade-up {
    opacity: 0;
    transform: translateY(30px);
    transition: 0.6s;
}

.fade-up.show {
    opacity: 1;
    transform: translateY(0);
}

</style>


<!-- SCRIPT -->
<script>
const elements = document.querySelectorAll('.fade-up');

function showOnScroll() {
    elements.forEach((el, i) => {
        const pos = el.getBoundingClientRect().top;
        const screen = window.innerHeight;

        if (pos < screen - 100) {
            setTimeout(() => {
                el.classList.add('show');
            }, i * 150);
        }
    });
}

window.addEventListener('scroll', showOnScroll);
window.addEventListener('load', showOnScroll);
</script>

@endsection