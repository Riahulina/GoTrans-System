<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GoTrans</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>

    body {
        font-family: 'Poppins', sans-serif !important;
        background: #f8f9fa;
    }

    /* ===== NAVBAR (SAMA SEPERTI LANDING) ===== */
    .navbar {
        background-color: #0d1b2a;
        transition: 0.4s;
    }

    .navbar.scrolled {
        background-color: #08121c;
        box-shadow: 0 5px 20px rgba(0,0,0,0.3);
    }

    .navbar-brand {
        color: white !important;
        font-weight: bold;
    }

    .nav-link {
        color: #ddd !important;
        position: relative;
        transition: 0.3s;
    }

    .nav-link:hover {
        color: white !important;
    }

    /* underline animasi */
    .nav-link::after {
        content: '';
        width: 0%;
        height: 2px;
        background: white;
        position: absolute;
        left: 0;
        bottom: 0;
        transition: 0.3s;
    }

    .nav-link:hover::after {
        width: 100%;
    }

    /* SEARCH */
    .form-control {
        border-radius: 20px;
    }

    /* BUTTON */
    .btn-outline-light {
        transition: 0.3s;
        border-radius: 20px;
    }

    .btn-outline-light:hover {
        background: white;
        color: #0d1b2a;
        transform: scale(1.05);
    }

    /* DROPDOWN */
    .dropdown-menu {
        border-radius: 12px;
        border: none;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    /* CONTENT */
    .main-container {
        padding: 40px 20px;
    }

    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">

        <a class="navbar-brand" href="{{ url('/user/home') }}">GoTrans</a>

        <button class="navbar-toggler bg-light" data-bs-toggle="collapse" data-bs-target="#nav">
            ☰
        </button>

        <div class="collapse navbar-collapse" id="nav">

            <!-- MENU -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/user/home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/user/layanan') }}">Layanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/user/aktivitas') }}">Aktivitas</a>
                </li>
            </ul>

            <!-- SEARCH -->
            <form class="d-flex me-3">
                <input class="form-control me-2" placeholder="Cari...">
                <button class="btn btn-outline-light">Search</button>
            </form>

            <!-- PROFILE -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        👤 Putri
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ url('/user/profil') }}">Profil</a></li>
                        <li><a class="dropdown-item text-danger" href="#">Logout</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>

<!-- CONTENT -->
<div class="main-container p-0" style="margin-top:80px;">
    @yield('content')
</div>

@include('user.footer')

<!-- SCRIPT -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // NAVBAR SCROLL EFFECT (SAMA KAYAK LANDING)
    window.addEventListener('scroll', function () {
        const navbar = document.querySelector('.navbar');
        navbar.classList.toggle('scrolled', window.scrollY > 50);
    });
</script>

</body>
</html>