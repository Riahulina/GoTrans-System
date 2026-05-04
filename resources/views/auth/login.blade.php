@include('header')

<style>
.auth-section {
    min-height: 100vh;
    background: linear-gradient(rgba(27,38,59,0.85), rgba(27,38,59,0.9)),
                url('https://images.unsplash.com/photo-1504384308090-c894fdcc538d');
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

.auth-title {
    font-weight: bold;
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

            <!-- LEFT CONTENT -->
            <div class="col-md-6 fade-up">
                <h1>Selamat Datang Kembali 👋</h1>
                <p>
                    Masuk ke akun GoTrans Anda dan nikmati kemudahan transportasi modern
                    dalam satu platform.
                </p>
            </div>

            <!-- FORM -->
            <div class="col-md-5 offset-md-1 fade-up">
                <div class="auth-card">

                    <h3 class="auth-title mb-3 text-center">Sign In</h3>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label>Email</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                placeholder="Masukkan email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                            >
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Masukkan password"
                                required
                            >
                        </div>

                        <button type="submit" class="btn btn-auth w-100 mb-3">
                            Masuk
                        </button>

                        <p class="text-center mb-0">
                            Belum punya akun?
                            <a href="{{ route('register') }}">Daftar</a>
                        </p>
                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

@include('footer')