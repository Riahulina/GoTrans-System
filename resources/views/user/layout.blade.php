<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>GoTrans</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: #f8f9fa;
        }

        body {
            padding-top: 80px;
        }

        /* NAVBAR */
        .navbar {
            background-color: #0d1b2a;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1030;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }

        .navbar.scrolled {
            background-color: #08121c;
        }

        .navbar-brand {
            color: white !important;
            font-weight: 700;
        }

        .nav-link {
            color: #ddd !important;
            position: relative;
            transition: 0.3s;
        }

        .nav-link:hover {
            color: white !important;
        }

        .nav-link:not(.dropdown-toggle)::after {
            content: '';
            width: 0;
            height: 2px;
            background: white;
            position: absolute;
            left: 0;
            bottom: 0;
            transition: 0.3s;
        }

        .nav-link:not(.dropdown-toggle):hover::after {
            width: 100%;
        }

        .form-control,
        .btn-outline-light {
            border-radius: 20px;
        }

        .btn-outline-light:hover {
            background: white;
            color: #0d1b2a;
            transform: scale(1.05);
        }

        /* DROPDOWN */
        .navbar .dropdown-menu {
            border-radius: 12px;
            border: none;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            min-width: 180px;
            margin-top: 8px;
        }

        .profile-btn {
            background: transparent !important;
            border: none !important;
            color: #ddd !important;
            cursor: pointer;
            transition: color 0.3s;
            padding: 8px 12px;
        }

        .profile-btn:hover,
        .profile-btn:focus {
            color: white !important;
            box-shadow: none !important;
            outline: none !important;
        }

        /* CONTENT */
        .main-container {
            min-height: 100vh;
            padding: 0;
        }
    </style>

    @stack('styles')
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">

            <a class="navbar-brand" href="{{ route('home') }}">GoTrans</a>

            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navMain"
                aria-controls="navMain" aria-expanded="false" aria-label="Toggle navigation">
                ☰
            </button>

            <div class="collapse navbar-collapse" id="navMain">

                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.layanan') }}">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.aktivitas') }}">Aktivitas</a>
                    </li>
                </ul>

                <form class="d-flex me-3">
                    <input class="form-control me-2" type="search" placeholder="Cari...">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>

                <ul class="navbar-nav">
                    <li class="nav-item dropdown" id="profileDropdownWrapper">
                        <!-- HAPUS data-bs-toggle, pakai manual JS -->
                        <button class="profile-btn btn dropdown-toggle" type="button" id="profileDropdownBtn"
                            aria-expanded="false">
                            👤 Profile
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end" id="profileMenu">
                            <li>
                                <a class="dropdown-item" href="{{ route('user.profil') }}">
                                    👤 Profil
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item text-danger" href="#">
                                    🚪 Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <div class="main-container p-0">
        @yield('content')
    </div>

    @include('user.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var btn = document.getElementById('profileDropdownBtn');
            var menu = document.getElementById('profileMenu');

            // Toggle saat tombol diklik
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                var isOpen = menu.classList.contains('show');
                menu.classList.toggle('show', !isOpen);
                btn.setAttribute('aria-expanded', String(!isOpen));
            });

            // Tutup saat klik di luar
            document.addEventListener('click', function(e) {
                if (!btn.contains(e.target) && !menu.contains(e.target)) {
                    menu.classList.remove('show');
                    btn.setAttribute('aria-expanded', 'false');
                }
            });

            // Scroll navbar effect
            window.addEventListener('scroll', function() {
                var navbar = document.querySelector('.navbar');
                if (navbar) {
                    navbar.classList.toggle('scrolled', window.scrollY > 50);
                }
            });
        });
    </script>

    @stack('scripts')
</body>

</html>
