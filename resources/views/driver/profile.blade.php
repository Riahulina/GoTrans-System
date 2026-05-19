@extends('driver.layout')

@section('content')
    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <!-- PROFILE CARD -->
                <div class="profile-card">

                    <div class="profile-top">

                        <!-- FOTO -->
                        <img src="" class="profile-img" alt="Profile">

                        <!-- INFO -->
                        <div class="profile-info">

                            <h4>
                                {{ Auth::user()->nama }}
                            </h4>

                            <p>
                                {{ Auth::user()->email }}
                            </p>

                            <span class="badge-user">
                                Driver Aktif
                            </span>

                        </div>

                    </div>

                    <!-- STATS -->
                    <div class="profile-stats">

                        <div>

                            <h5>24</h5>

                            <small>
                                Perjalanan
                            </small>

                        </div>

                        <div>

                            <h5>4.9 ⭐</h5>

                            <small>
                                Rating
                            </small>

                        </div>

                        <div>

                            <h5>2025</h5>

                            <small>
                                Bergabung
                            </small>

                        </div>

                    </div>

                </div>

                <!-- INFO DETAIL -->
                <div class="info-card mt-4">

                    <h6 class="mb-3 fw-bold">
                        Informasi Pribadi
                    </h6>

                    <div class="info-row">

                        <span>Nama</span>

                        <b>
                            {{ Auth::user()->nama }}
                        </b>

                    </div>

                    <div class="info-row">

                        <span>Email</span>

                        <b>
                            {{ Auth::user()->email }}
                        </b>

                    </div>

                    <div class="info-row">

                        <span>No HP</span>

                        <b>
                            0812xxxxxxx
                        </b>

                    </div>

                    <div class="info-row">

                        <span>Status</span>

                        <b class="text-success">
                            Aktif
                        </b>

                    </div>

                </div>

                <!-- MENU -->
                <div class="menu-card mt-4">

                    <!-- EDIT -->
                    <a href="{{ route('profile.edit') }}" class="menu-item">

                        <div>

                            <strong>
                                Edit Profil
                            </strong>

                            <small>
                                Ubah informasi akun
                            </small>

                        </div>

                        <span>›</span>

                    </a>

                    <!-- KEAMANAN -->
                    <a href="{{ route('profile.edit') }}" class="menu-item">

                        <div>

                            <strong>
                                Keamanan
                            </strong>

                            <small>
                                Password & keamanan akun
                            </small>

                        </div>

                        <span>›</span>

                    </a>



                    <!-- LOGOUT -->
                    <form method="POST" action="{{ route('logout') }}">

                        @csrf

                        <button type="submit" class="menu-item logout border-0 bg-white w-100">

                            <div class="text-start">

                                <strong>
                                    Logout
                                </strong>

                                <small>
                                    Keluar dari akun
                                </small>

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
            border-radius: 24px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .07);
        }

        /* TOP */
        .profile-top {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        /* IMAGE */
        .profile-img {
            width: 85px;
            height: 85px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* INFO */
        .profile-info h4 {
            margin: 0;
            font-weight: 700;
        }

        .profile-info p {
            margin: 0;
            color: #777;
            font-size: 14px;
        }

        /* BADGE */
        .badge-user {
            display: inline-block;
            margin-top: 6px;
            background: #e7f5ff;
            color: #1b263b;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }

        /* STATS */
        .profile-stats {
            display: flex;
            justify-content: space-around;
            margin-top: 25px;
            text-align: center;
        }

        .profile-stats h5 {
            margin: 0;
            font-weight: 700;
        }

        .profile-stats small {
            color: #777;
        }

        /* INFO CARD */
        .info-card {
            background: white;
            border-radius: 24px;
            padding: 22px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .05);
        }

        /* ROW */
        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 14px;
            font-size: 15px;
        }

        /* MENU CARD */
        .menu-card {
            background: white;
            border-radius: 24px;
            padding: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .05);
        }

        /* ITEM */
        .menu-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px;
            border-radius: 14px;
            text-decoration: none;
            color: black;
            transition: .3s;
        }

        .menu-item:hover {
            background: #f1f3f5;
        }

        .menu-item small {
            display: block;
            color: #777;
            font-size: 12px;
        }

        /* LOGOUT */
        .logout {
            color: #dc3545;
        }
    </style>
@endsection
