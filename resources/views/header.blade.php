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
            overflow-x: hidden;
        }

        html {
            scroll-behavior: smooth;
        }

        /* NAVBAR */
        .navbar {
            background-color: #0d1b2a;
            transition: 0.4s;
        }

        .navbar.scrolled {
            background-color: #08121c;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
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

        /* BUTTON */
        .btn-outline-light {
            transition: 0.3s;
        }

        .btn-outline-light:hover {
            background: white;
            color: #0d1b2a;
            transform: scale(1.05);
        }

        .btn-primary {
            background: #1b263b;
            border: none;
            transition: 0.3s;
        }

        .btn-primary:hover {
            transform: scale(1.05);
            background: #415a77;
        }


        /* ===== TENTANG SECTION ===== */
        #tentang {
            background: #f8f9fa;
            
        }

        .tentang-title {
            font-weight: bold;
            color: #0d1b2a;
        }

        .tentang-subtitle {
            color: #6c757d;
        }

        /* CARD STYLE */
        .tentang-card {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: 0.3s;
            height: 100%;
        }

        .tentang-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        /* LIST STYLE */
        .tentang-list li {
            margin-bottom: 8px;
        }

        /* ICON BULLET */
        .tentang-list li::before {
            content: "✔ ";
            color: #1b263b;
            font-weight: bold;
        }

        /* SECTION SPACING */
        .tentang-section {
            margin-top: 20px;
        }

        /* ===== LAYANAN SECTION ===== */
        #layanan {
            background: #ffffff;
        }

        .layanan-title {
            font-weight: bold;
            color: #0d1b2a;
        }

        .layanan-subtitle {
            color: #6c757d;
        }

        /* CARD */
        .layanan-card {
            background: #fff;
            border-radius: 20px;
            padding: 25px;
            text-align: center;
            transition: 0.4s;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            height: 100%;
        }

        .layanan-card:hover {
            transform: translateY(-10px) scale(1.03);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        /* IMAGE */
        .layanan-img {
            width: 70px;
            height: 70px;
            margin-bottom: 15px;
            transition: 0.3s;
        }

        .layanan-card:hover .layanan-img {
            transform: scale(1.1) rotate(5deg);
        }

        /* TEXT */
        .layanan-card h5 {
            margin-top: 10px;
            font-weight: 600;
        }

        .layanan-card p {
            font-size: 14px;
            color: #6c757d;
        }

        .layanan-card:hover {
            background: linear-gradient(135deg, #1b263b, #415a77);
            color: white;
        }

        .layanan-card:hover p {
            color: #ddd;
        }

        /* ===== HERO / BERANDA ===== */
        .hero {
            background: linear-gradient(135deg, #1b263b, #415a77);
            color: white;
            padding: 120px 0;
            position: relative;
            overflow: hidden;

            border-bottom-left-radius: 80px;
            border-bottom-right-radius: 80px;
        }
    
        /* TEXT */
        .hero h1 {
            font-size: 48px;
            font-weight: bold;
        }

        .hero p {
            font-size: 18px;
            color: #ddd;
        }

        /* BUTTON */
        .hero .btn {
            margin-top: 20px;
            transition: 0.3s;
        }

        .hero .btn:hover {
            transform: scale(1.05);
        }

        /* IMAGE */
        .hero-img {
            width: 100%;
            max-width: 400px;
            animation: float 3s ease-in-out infinite;
        }

        /* FLOAT ANIMATION */
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-15px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        /* BACKGROUND SHAPE */
        .hero::before {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            top: -100px;
            right: -100px;
        }

        .hero h1 {
            text-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">

            <a class="navbar-brand" href="#">GoTrans</a>

            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                ☰
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#layanan">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang</a>
                    </li>
                </ul>

                <div class="d-flex gap-2">
                    <a href="{{ route('login') }}" class="btn btn-outline-light">Sign In</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Sign Up</a>
                </div>

            </div>
        </div>
    </nav>