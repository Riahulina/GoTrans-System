<section class="custom-card danger-card">

    <header class="mb-3">
        <h5 class="fw-semibold mb-1">Hapus Akun</h5>
        <p class="text-muted small mb-0">
            Setelah akun dihapus, semua data tidak bisa dikembalikan.
        </p>
    </header>

    <!-- BUTTON OPEN MODAL -->
    <button
        class="btn btn-danger btn-sm"
        x-data
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        Hapus Akun
    </button>

    <!-- MODAL -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <div class="p-4">

            <h5 class="fw-semibold mb-2">
                Konfirmasi Hapus Akun
            </h5>

            <p class="text-muted small mb-3">
                Data akun akan dihapus permanen. Masukkan password untuk konfirmasi.
            </p>

            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <!-- PASSWORD -->
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Masukkan password">
                    @error('password', 'userDeletion')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- BUTTON -->
                <div class="d-flex justify-content-end gap-2">
                    <button type="button"
                        class="btn btn-secondary btn-sm"
                        x-on:click="$dispatch('close')">
                        Batal
                    </button>

                    <button type="submit" class="btn btn-danger btn-sm">
                        Hapus
                    </button>
                </div>

            </form>

        </div>
    </x-modal>

</section>

<style>
    .danger-card {
        border-left: 4px solid #dc3545;
        background: white;
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }
</style>