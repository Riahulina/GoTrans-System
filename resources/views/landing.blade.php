@include('header')

<!-- BERANDA / HERO -->
<section id="beranda" class="hero">
    <div class="container">
        <div class="row align-items-center">

            <!-- TEXT -->
            <div class="col-md-6 fade-up">
                <h1>Solusi Transportasi Modern</h1>
                <p>
                    GoTrans hadir untuk memberikan kemudahan dalam perjalanan Anda.
                    Pesan motor, mobil, bajai, hingga bus dalam satu platform.
                </p>

                <a href="#layanan" class="btn btn-light">Lihat Layanan</a>
                <a href="#" class="btn btn-outline-light ms-2">Mulai Sekarang</a>
            </div>

            <!-- IMAGE -->
            <div class="col-md-6 text-center fade-up">
                <img src="https://cdn-icons-png.flaticon.com/512/1995/1995470.png" alt="GoTrans"
                     class="hero-img">
            </div>

        </div>
    </div>
</section>

<!-- LAYANAN -->
<section id="layanan" class="container mt-5">

    <!-- TITLE -->
    <div class="text-center mb-5 fade-up">
        <h2 class="layanan-title">Layanan Kami</h2>
        <p class="layanan-subtitle">
            Nikmati berbagai pilihan transportasi modern yang dirancang untuk kebutuhan mobilitas Anda
        </p>
    </div>

    <div class="row g-4">

        <!-- MOTOR -->
        <div class="col-md-3 fade-up">
            <div class="layanan-card">
                <img src="https://img.icons8.com/ios-filled/100/1b263b/motorcycle.png" class="layanan-img">
                <h5>Motor</h5>
                <p>Cepat, hemat, dan efisien untuk perjalanan sehari-hari di perkotaan.</p>
            </div>
        </div>

        <!-- MOBIL -->
        <div class="col-md-3 fade-up">
            <div class="layanan-card">
                <img src="https://img.icons8.com/ios-filled/100/1b263b/car.png" class="layanan-img">
                <h5>Mobil</h5>
                <p>Nyaman dan aman untuk perjalanan bersama keluarga atau bisnis.</p>
            </div>
        </div>

        <!-- BAJAI -->
        <div class="col-md-3 fade-up">
            <div class="layanan-card">
                <img src="https://img.icons8.com/fluency/96/auto-rickshaw.png" class="layanan-img">
                <h5>Bajai</h5>
                <p>Solusi unik untuk menjangkau area sempit dengan cepat.</p>
            </div>
        </div>

        <!-- BUS -->
        <div class="col-md-3 fade-up">
            <div class="layanan-card">
                <img src="https://img.icons8.com/ios-filled/100/1b263b/bus.png" class="layanan-img">
                <h5>Bus</h5>
                <p>Transportasi massal yang ekonomis dan cocok untuk perjalanan jauh.</p>
            </div>
        </div>

    </div>
</section>

<!-- TENTANG -->
<section id="tentang" class="mt-5 p-5 fade-up">
    <div class="container">

        <!-- TITLE -->
        <div class="text-center mb-5">
            <h2 class="tentang-title">Tentang GoTrans</h2>
            <p class="tentang-subtitle">Platform transportasi digital modern di Indonesia</p>
        </div>

        <div class="row g-4">

            <!-- PROFIL -->
            <div class="col-md-6">
                <div class="tentang-card">
                    <h5>Profil Perusahaan</h5>
                    <p>
                        GoTrans adalah perusahaan yang bergerak di bidang transportasi digital berbasis teknologi.
                        Kami menyediakan layanan mobilitas seperti motor, mobil, bajai, hingga bus dalam satu platform.
                    </p>
                    <p>
                        Dengan sistem modern, kami menghadirkan kemudahan, efisiensi, dan keamanan bagi pengguna.
                    </p>
                </div>
            </div>

            <!-- INFO -->
            <div class="col-md-6">
                <div class="tentang-card">
                    <h5>Informasi Perusahaan</h5>
                    <ul class="tentang-list">
                        <li>Bidang: Transportasi & Teknologi Digital</li>
                        <li>Alamat: Medan, Sumatera Utara</li>
                        <li>Layanan: Motor, Mobil, Bajai, Bus</li>
                    </ul>
                </div>
            </div>

            <!-- PEMBAYARAN -->
            <div class="col-md-6">
                <div class="tentang-card">
                    <h5>Metode Pembayaran</h5>
                    <ul class="tentang-list">
                        <li>QRIS (Scan QR)</li>
                        <li>Transfer Bank</li>
                        <li>E-Wallet (OVO, DANA, GoPay)</li>
                        <li>Cash (Tunai)</li>
                    </ul>
                </div>
            </div>

            <!-- SPONSOR -->
            <div class="col-md-6">
                <div class="tentang-card">
                    <h5>Didukung Oleh</h5>
                    <p>Kami bekerja sama dengan berbagai mitra:</p>
                    <ul class="tentang-list">
                        <li>Perusahaan Teknologi</li>
                        <li>Penyedia Pembayaran Digital</li>
                        <li>Mitra Transportasi Lokal</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

@include('footer')