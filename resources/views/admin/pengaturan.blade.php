@extends('admin.header')
@section('content')

    <div class="main-content" id="main">

        <!-- NAVBAR -->
        <div class="navbar d-flex justify-content-between">
            <button class="btn btn-light" onclick="toggleSidebar()">
                <i class="bi bi-list"></i>
            </button>
            <h5 class="mb-0">Pengaturan (Setting)</h5>
        </div>

        <div class="card mt-3 shadow-lg border-0 rounded-4">
            <div class="card-body p-4">

                <form>

                    <div class="row g-4">

                        <!-- NAMA APLIKASI -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Nama Aplikasi</label>
                            <input type="text" class="form-control rounded-3" placeholder="Masukkan nama aplikasi">
                        </div>

                        <!-- TARIF PER KM -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Tarif per KM</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control rounded-end-3" placeholder="Contoh: 5000">
                            </div>
                        </div>

                        <!-- KONTAK ADMIN -->
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Kontak Admin</label>
                            <input type="text" class="form-control rounded-3" placeholder="Contoh: 08123456789">
                        </div>

                    </div>

                    <!-- BUTTON -->
                    <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-primary px-4 py-2 rounded-3">
                            Simpan Perubahan
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <style>
        body {
            background-color: #f4f6f9;
        }

        .card {
            background: linear-gradient(135deg, #ffffff, #f8f9fa);
        }

        .form-control {
            padding: 10px;
        }

        .form-control:focus {
            box-shadow: 0 0 8px rgba(13, 110, 253, 0.3);
            border-color: #0d6efd;
        }

        .input-group-text {
            background-color: #0d6efd;
            color: white;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #0d6efd, #4dabf7);
            border: none;
        }

        .btn-primary:hover {
            opacity: 0.9;
        }
    </style>
@endsection