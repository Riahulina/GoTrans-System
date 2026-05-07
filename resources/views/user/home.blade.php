@extends('user.layout')

@section('content')

<!-- HERO FULL -->
<section class="hero-main">
    <div class="container-fluid px-0">
        <div class="row align-items-center h-100 px-5">

            <!-- TEXT -->
            <div class="col-md-6 fade-up">
                <h1 class="hero-title">
                    Mau ke mana hari ini?
                </h1>

                <p class="hero-text">
                    Nikmati pengalaman perjalanan yang aman, cepat, dan terpercaya
                    dengan layanan transportasi digital yang dirancang untuk Anda.
                </p>

                <div class="mt-4">
                    <a href="#layanan" class="btn btn-light me-2">Lihat Layanan</a>
                    <a href="{{ route('layanan') }}" class="btn btn-outline-light">Mulai Sekarang</a>
                </div>
            </div>

            <!-- IMAGE -->
            <div class="col-md-6 text-center fade-up">
                <img src="https://cdn-icons-png.flaticon.com/512/1995/1995470.png"
                     class="hero-img">
            </div>

        </div>
    </div>
</section>

<!-- LAYANAN -->
<section id="layanan" class="section-white">
    <div class="container">

        <div class="text-center mb-5 fade-up">
            <h2 class="section-title">Layanan Kami</h2>
            <p class="section-subtitle">Pilih layanan sesuai kebutuhan perjalanan Anda</p>
        </div>

        <div class="row g-4 text-center">

            @foreach([
                ['Motor','Cepat & hemat','🏍️'],
                ['Mobil','Nyaman & aman','🚗'],
                ['Bajai','Fleksibel','🛺'],
                ['Bus','Kapasitas besar','🚌']
            ] as $item)

            <div class="col-md-3 fade-up">
                <div class="service-card">
                    <div class="service-icon">
                        {{ $item[2] }}
                    </div>

                    <h5 class="mt-3">{{ $item[0] }}</h5>
                    <p>{{ $item[1] }}</p>

                    <a href="{{ route('layanan') }}" class="btn btn-dark btn-sm">
                        Pesan
                    </a>
                </div>
            </div>

            @endforeach

        </div>

    </div>
</section>

<!-- ABOUT -->
<section class="section-light">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-md-6 fade-up">
                <h3 class="section-title">Tentang GoTrans</h3>

                <p class="text-muted">
                    Platform transportasi modern yang menghubungkan Anda dengan perjalanan terbaik.
                </p>

                <ul class="about-list">
                    <li>Driver profesional</li>
                    <li>Harga transparan</li>
                    <li>Layanan cepat</li>
                </ul>
            </div>

            <div class="col-md-6 fade-up">
                <div class="about-shape"></div>
            </div>

        </div>
    </div>
</section>

<!-- CTA -->
<section class="section-white text-center">
    <div class="container fade-up">
        <h3>Siap untuk perjalanan Anda?</h3>
        <p class="text-muted">Pesan sekarang dan nikmati kemudahannya</p>

        <a href="{{ route('layanan') }}" class="btn btn-main mt-2">
            Pesan Sekarang
        </a>
    </div>
</section>

<!-- STYLE FIX NAVBAR + HERO -->
<style>

/* FIX NAVBAR BIAR TIDAK KETIMPA */
body {
    margin: 0;
    padding-top: 70px; /* penting untuk navbar fixed */
}

/* NAVBAR HARUS DI ATAS SEMUA */
.navbar {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 9999;
}

/* HERO */
.hero-main {
    height: 100vh;
    background: linear-gradient(135deg, #1b263b, #415a77);
    color: white;
    display: flex;
    align-items: center;
    border-bottom-left-radius: 80px;
    border-bottom-right-radius: 80px;
    position: relative;
    overflow: hidden;
    z-index: 1; /* penting biar tidak nutup navbar */
}

/* BACKGROUND EFFECT */
.hero-main::before {
    content: '';
    position: absolute;
    width: 500px;
    height: 500px;
    background: rgba(255,255,255,0.05);
    border-radius: 50%;
    top: -120px;
    right: -120px;
}

/* TEXT */
.hero-title {
    font-size: 56px;
    font-weight: 700;
}

.hero-text {
    color: #ddd;
    font-size: 18px;
}

/* IMAGE */
.hero-img {
    max-width: 420px;
    animation: float 4s ease-in-out infinite;
}

@keyframes float {
    0% { transform: translateY(0px);}
    50% { transform: translateY(-15px);}
    100% { transform: translateY(0px);}
}

/* SECTION */
.section-white {
    padding: 100px 0;
    background: #fff;
}

.section-light {
    padding: 100px 0;
    background: #f8f9fa;
}

/* CARD */
.service-card {
    background: white;
    border-radius: 20px;
    padding: 30px;
    transition: 0.4s;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
}

.service-card:hover {
    transform: translateY(-15px) scale(1.03);
    background: linear-gradient(135deg, #1b263b, #415a77);
    color: white;
}

.service-icon {
    font-size: 32px;
    background: #f1f3f5;
    width: 80px;
    height: 80px;
    line-height: 80px;
    border-radius: 50%;
    margin: auto;
}

/* ABOUT */
.about-list li {
    margin-bottom: 10px;
}

.about-list li::before {
    content: "✔ ";
    color: #1b263b;
    font-weight: bold;
}

/* SHAPE */
.about-shape {
    width: 100%;
    height: 260px;
    background: linear-gradient(135deg, #1b263b, #415a77),
    url('https://images.unsplash.com/photo-1689339834923-6c1bde0970a2') center/cover;
    border-radius: 20px;
}

/* BUTTON */
.btn-main {
    background: #1b263b;
    color: white;
    border-radius: 10px;
    padding: 10px 25px;
}

/* ANIMATION */
.fade-up {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.6s ease;
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