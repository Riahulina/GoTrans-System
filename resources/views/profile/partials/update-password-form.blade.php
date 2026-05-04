<section class="custom-card">

    <header class="mb-3">
        <h5 class="fw-semibold mb-1">Ubah Password</h5>
        <p class="text-muted small mb-0">
            Gunakan password yang kuat untuk keamanan akun Anda.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <!-- CURRENT PASSWORD -->
        <div class="mb-3">
            <label class="form-label">Password Saat Ini</label>
            <input
                type="password"
                name="current_password"
                class="form-control"
                autocomplete="current-password">
            @error('current_password', 'updatePassword')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- NEW PASSWORD -->
        <div class="mb-3">
            <label class="form-label">Password Baru</label>
            <input
                type="password"
                name="password"
                class="form-control"
                autocomplete="new-password">
            @error('password', 'updatePassword')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- CONFIRM PASSWORD -->
        <div class="mb-3">
            <label class="form-label">Konfirmasi Password</label>
            <input
                type="password"
                name="password_confirmation"
                class="form-control"
                autocomplete="new-password">
            @error('password_confirmation', 'updatePassword')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- BUTTON -->
        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-success btn-sm px-4">
                Simpan
            </button>

            @if (session('status') === 'password-updated')
            <small class="text-success">
                Password berhasil diperbarui.
            </small>
            @endif
        </div>

    </form>

</section>

<style>
    .custom-card {
        background: white;
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }
</style>