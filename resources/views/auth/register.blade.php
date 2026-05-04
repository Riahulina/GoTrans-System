@include('header')

<style>
.auth-section {
    min-height: 100vh;
    background: linear-gradient(rgba(27,38,59,0.85), rgba(27,38,59,0.9)),
                url('https://images.unsplash.com/photo-1493238792000-8113da705763');
    background-size: cover;
    background-position: center;
    color: white;
}

.auth-card {
    background: white;
    border-radius: 15px;
    padding: 35px;
    color: #1b263b;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
}

.btn-auth {
    background-color: #1b263b;
    color: white;
    border-radius: 8px;
    border: none;
}

.btn-auth:hover {
    background-color: #0d1b2a;
    color: white;
}
</style>

<section class="auth-section d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center">

            <!-- LEFT -->
            <div class="col-md-6 fade-up">
                <h1>Bergabung dengan GoTrans 🚀</h1>
                <p>
                    Daftar sekarang dan nikmati kemudahan perjalanan tanpa ribet,
                    cepat, dan aman.
                </p>
            </div>

            <!-- FORM -->
            <div class="col-md-5 offset-md-1 fade-up">
                <div class="auth-card">

                    <h3 class="text-center mb-3 fw-bold">Sign Up</h3>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label>Nama Lengkap</label>
                            <input
                                type="text"
                                name="nama"
                                class="form-control"
                                placeholder="Nama lengkap"
                                value="{{ old('nama') }}"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                placeholder="Email"
                                value="{{ old('email') }}"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Password"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label>Konfirmasi Password</label>
                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control"
                                placeholder="Ulangi password"
                                required
                            >
                        </div>

                        <button type="submit" class="btn btn-auth w-100 mb-3">
                            Daftar
                        </button>

                        <p class="text-center mb-0">
                            Sudah punya akun?
                            <a href="{{ route('login') }}">Sign In</a>
                        </p>
                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

@include('footer')