<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ICON -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* =========================
   ROOT VARIABLES
========================= */
        :root {
            --primary: #4e73df;
            --secondary: #858796;
            --success: #1cc88a;
            --warning: #f6c23e;
            --danger: #e74a3b;
            --dark: #1f2937;
            --light: #f8f9fc;
            --white: #ffffff;

            --sidebar-width: 250px;
            --radius: 12px;
            --transition: all 0.3s ease;
        }

        /* GLOBAL */
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: var(--light);
            margin: 0;
        }

        /* SIDEBAR */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            background: linear-gradient(180deg, var(--dark), #111827);
            color: var(--white);
            padding: 20px;
            transition: var(--transition);
        }

        .sidebar.hide {
            left: -250px;
        }

        .sidebar h4 {
            margin-bottom: 30px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--white);
            padding: 12px;
            border-radius: var(--radius);
            margin-bottom: 10px;
            transition: var(--transition);
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(5px);
        }

        .sidebar a.active {
            background: var(--primary);
        }

        /* MAIN */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 30px;
            transition: var(--transition);
        }

        .main-content.full {
            margin-left: 0;
        }

        /* NAVBAR */
        .navbar {
            background: var(--white);
            border-radius: var(--radius);
            padding: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }


        /* RESPONSIVE */
        @media(max-width:768px) {
            .sidebar {
                left: -250px;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar" id="sidebar">
        <h4>Admin Panel</h4>
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-house"></i> Dashboard
        </a>

        <a href="{{ route('admin.user') }}" class="{{ request()->routeIs('admin.user') ? 'active' : '' }}">
            <i class="bi bi-people"></i> User
        </a>

        <a href="{{ route('admin.driver') }}" class="{{ request()->routeIs('admin.driver') ? 'active' : '' }}">
            <i class="bi bi-people"></i> Driver
        </a>

        <a href="{{ route('admin.pesanan') }}" class="{{ request()->routeIs('admin.pesanan') ? 'active' : '' }}">
            <i class="bi bi-box"></i> Pesanan
        </a>

        <a href="{{ route('admin.pembayaran') }}" class="{{ request()->routeIs('admin.pembayaran') ? 'active' : '' }}">
            <i class="bi bi-cart"></i> Pembayaran
        </a>

        <a href="{{ route('admin.rating_feedback') }}" class="{{ request()->routeIs('admin.rating_feedback') ? 'active' : '' }}">
            <i class="bi bi-file-earmark"></i> Rating & Feedback
        </a>

        <a href="{{ route('admin.pengaturan') }}" class="{{ request()->routeIs('admin.pengaturan') ? 'active' : '' }}">
            <i class="bi bi-gear"></i> Pengaturan
        </a>
    </div>


    <!-- SCRIPT -->
    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("hide");
            document.getElementById("main").classList.toggle("full");
        }
    </script>

    <!-- CONTENT -->
    <div class="main-container id="main">
         @yield('content')
    </div>

    @include('admin.footer')
    <!-- SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>