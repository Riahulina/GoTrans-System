@extends('user.layout')

@section('content')
    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card shadow border-0 rounded-4 p-4">

                    <h3 class="mb-4">⭐ Rating Driver</h3>

                    <!-- DRIVER INFO -->
                    <div class="mb-3">
                        <h5 class="mb-1">
                            {{ $order->driver->user->nama }}
                        </h5>

                        <small class="text-muted">
                            Berikan penilaian untuk driver
                        </small>
                    </div>

                    <!-- FORM -->
                    <form method="POST" action="#">
                        @csrf

                        <!-- RATING -->
                        <label class="form-label mt-3">Rating</label>
                        <select class="form-control" name="rating" required>
                            <option value="5">⭐ 5 - Sangat Baik</option>
                            <option value="4">⭐ 4 - Baik</option>
                            <option value="3">⭐ 3 - Cukup</option>
                            <option value="2">⭐ 2 - Kurang</option>
                            <option value="1">⭐ 1 - Buruk</option>
                        </select>

                        <!-- COMMENT -->
                        <label class="form-label mt-3">Komentar</label>
                        <textarea name="comment" class="form-control" rows="4" placeholder="Tulis pengalaman kamu..."></textarea>

                        <!-- BUTTON -->
                        <button type="submit" class="btn btn-success w-100 mt-4 rounded-4 fw-bold">
                            Kirim Rating
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>
@endsection
