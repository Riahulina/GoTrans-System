@extends('user.layout')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <!-- PROFILE CARD -->
            <div class="profile-card">
                <div class="profile-top">

                    <img src="{{ Auth::user()->foto ? asset('storage/' . Auth::user()->foto) : 'https://i.pravatar.cc/150' }}"
                        class="profile-img"
                        alt="Profile">

                    <div class="profile-info">
                        <h4>{{ Auth::user()->nama }}</h4>
                        <p>{{ Auth::user()->email }}</p>

                        <span class="badge-user">User Aktif</span>
                    </div>
                </div>

                <!-- STATS -->
                <div class="profile-stats">
                    <div>
                        <h5>24</h5>
                        <small>Perjalanan</small>
                    </div>

                    <div>
                        <h5>4.8</h5>
                        <small>Rating</small>
                    </div>

                    <div>
                        <h5>{{ Auth::user()->created_at->format('Y') }}</h5>
                        <small>Tahun Bergabung</small>
                    </div>
                </div>
            </div>

            <!-- INFO DETAIL -->
            <div class="info-card mt-4">
                <h6 class="mb-3 fw-bold">Informasi Pribadi</h6>

                <div class="info-row">
                    <span>No HP</span>
                    <b>{{ Auth::user()->no_hp ?? '-' }}</b>
                </div>

                <div class="info-row">
                    <span>Status</span>
                    <b>Aktif</b>
                </div>
            </div>

            <!-- MENU -->
            <div class="menu-card mt-4">

                <a href="{{ route('profile.edit') }}" class="menu-item">
                    <div>
                        <strong>Edit Profil</strong>
                        <small>Ubah informasi akun</small>
                    </div>
                    <span>›</span>
                </a>

                <a href="#" class="menu-item">
                    <div>
                        <strong>Keamanan</strong>
                        <small>Password & keamanan akun</small>
                    </div>
                    <span>›</span>
                </a>

                <a href="#" class="menu-item">
                    <div>
                        <strong>Metode Pembayaran</strong>
                        <small>Kelola pembayaran</small>
                    </div>
                    <span>›</span>
                </a>

                <!-- LOGOUT -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="menu-item logout border-0 bg-white w-100">
                        <div class="text-start">
                            <strong>Logout</strong>
                            <small>Keluar dari akun</small>
                        </div>
                        <span>›</span>
                    </button>
                </form>

            </div>

        </div>
    </div>
</div>

<style>
    body {
        background: #f8f9fa;
    }

    /* PROFILE CARD */
    .profile-card {
        background: white;
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
    }

    /* TOP */
    .profile-top {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    /* IMAGE */
    .profile-img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
    }

    /* INFO */
    .profile-info h4 {
        margin: 0;
        font-weight: 600;
    }

    .profile-info p {
        margin: 0;
        color: #777;
        font-size: 14px;
    }

    /* BADGE */
    .badge-user {
        display: inline-block;
        margin-top: 5px;
        background: #e7f5ff;
        color: #1b263b;
        padding: 3px 10px;
        border-radius: 10px;
        font-size: 12px;
    }

    /* STATS */
    .profile-stats {
        display: flex;
        justify-content: space-around;
        margin-top: 20px;
        text-align: center;
    }

    .profile-stats h5 {
        margin: 0;
    }

    .profile-stats small {
        color: #777;
    }

    /* INFO CARD */
    .info-card {
        background: white;
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    /* ROW */
    .info-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    /* MENU CARD */
    .menu-card {
        background: white;
        border-radius: 20px;
        padding: 10px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    /* ITEM */
    .menu-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
        border-radius: 12px;
        text-decoration: none;
        color: black;
        transition: 0.3s;
    }

    .menu-item small {
        display: block;
        color: #777;
        font-size: 12px;
    }

    .menu-item:hover {
        background: #f1f3f5;
    }

    /* LOGOUT */
    .logout {
        color: #dc3545;
    }
</style>

@endsection