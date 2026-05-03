@extends('user.layout')

@section('content')

<!-- WRAPPER CENTER -->
<div class="d-flex justify-content-center">
<div class="layanan-container">

    <!-- HEADER -->
    <div class="mb-4 fade-up text-center">
        <h4 class="fw-bold">Pilih Layanan</h4>
        <p class="text-muted">Pilih transportasi sesuai kebutuhan perjalananmu</p>
    </div>

    <div class="row g-4 justify-content-center">

    @foreach([
        ['Motor','Cepat & hemat','🏍️','10k - 20k','Populer'],
        ['Mobil','Nyaman & aman','🚗','30k - 60k',null],
        ['Bajai','Fleksibel & unik','🛺','15k - 25k',null],
        ['Bus','Kapasitas besar','🚌','5k - 15k','Hemat']
    ] as $item)

    <div class="col-md-6 fade-up">

        <div class="service-card p-4 position-relative">

            <!-- BADGE -->
            @if($item[4])
            <span class="badge-custom">{{ $item[4] }}</span>
            @endif

            <div class="d-flex align-items-center justify-content-between">

                <!-- LEFT -->
                <div>
                    <h5 class="fw-bold mb-1">{{ $item[0] }}</h5>
                    <p class="text-muted mb-2 small">{{ $item[1] }}</p>

                    <div class="price">
                        Estimasi: <b>{{ $item[3] }}</b>
                    </div>
                </div>

                <!-- ICON -->
                <div class="icon-box">
                    {{ $item[2] }}
                </div>

            </div>

            <!-- BUTTON -->
            <a href="{{ route('pemesanan') }}" class="btn btn-main w-100 mt-3">
                Pesan Sekarang
            </a>

        </div>

    </div>

    @endforeach

    </div>

</div>
</div>


<style>

/* 🔥 BATAS LEBAR BIAR CENTER & GA KELEBARAN */
.layanan-container {
    max-width: 900px;
    width: 100%;
}

/* CARD */
.service-card {
    background: linear-gradient(135deg, #ffffff, #f1f3f5);
    border-radius: 20px;
    transition: 0.4s;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
}

/* HOVER */
.service-card:hover {
    transform: translateY(-10px) scale(1.02);
    background: linear-gradient(135deg, #1b263b, #415a77);
    color: white;
}

/* TEXT FIX */
.service-card:hover .text-muted {
    color: #ddd !important;
}

/* ICON */
.icon-box {
    font-size: 36px;
    background: #e9ecef;
    width: 70px;
    height: 70px;
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
}

.btn-main:hover {
    background: #415a77;
}

/* BADGE */
.badge-custom {
    position: absolute;
    top: 15px;
    right: 15px;
    background: #ff9800;
    color: white;
    font-size: 12px;
    padding: 5px 10px;
    border-radius: 20px;
}

/* PRICE */
.price {
    font-size: 14px;
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