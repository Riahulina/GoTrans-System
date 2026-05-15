<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Driver Panel - GoTrans</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #f5f7fb;
        }

        .navbar {
            background: #1b263b;
            padding: 15px 0;
        }

        .navbar-brand {
            color: white !important;
            font-weight: 700;
            font-size: 22px;
        }

        .nav-link {
            color: #ddd !important;
            margin-left: 15px;
            transition: .3s;
            font-weight: 500;
        }

        .nav-link:hover {
            color: white !important;
        }

        .profile-btn {
            background: #415a77;
            padding: 8px 18px !important;
            border-radius: 12px;
            color: white !important;
        }

        .profile-btn:hover {
            background: #526d8f;
        }

        .main-content {
            min-height: 100vh;
            padding-top: 30px;
        }

        footer {
            background: #1b263b;
            color: white;
            text-align: center;
            padding: 18px;
            margin-top: 50px;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg">

        <div class="container">

            <a class="navbar-brand" href="{{ route('driver.home') }}">
                🚖 GoTrans Driver
            </a>

            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarDriver">

                ☰

            </button>

            <div class="collapse navbar-collapse" id="navbarDriver">

                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <li class="nav-item">
                        <a href="{{ route('driver.home') }}" class="nav-link">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('driver.history') }}" class="nav-link">
                            History
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('driver.rating') }}" class="nav-link">
                            Rating
                        </a>
                    </li>

                    <!-- PROFILE -->
                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0">

                        <a href="{{ route('driver.profile') }}" class="nav-link profile-btn">

                            👤 Profile

                        </a>

                    </li>

                </ul>

            </div>

        </div>

    </nav>

    <!-- CONTENT -->
    <div class="main-content">

        @yield('content')

    </div>

    <!-- FOOTER -->
    <footer>
        © {{ date('Y') }} GoTrans Driver Panel
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
